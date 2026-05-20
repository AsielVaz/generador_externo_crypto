<?php

namespace App\Http\Controllers;

use App\Support\CryptoEfectivoEncryptor;
use App\Support\GeneratedKeyStore;
use App\Support\MandrillMailer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

class GeneratedKeyController extends Controller
{
    public function index(Request $request, GeneratedKeyStore $store): View
    {
        return view('keys.index', [
            'keys' => $store->paginate($request->string('search')->toString(), $request->string('status')->toString())->withQueryString(),
            'totalKeys' => $store->count(),
            'activeKeys' => $store->countByStatus('active'),
            'revokedKeys' => $store->countByStatus('revoked'),
        ]);
    }

    public function create(): View
    {
        return view('keys.create');
    }

    public function store(
        Request $request,
        GeneratedKeyStore $store,
        CryptoEfectivoEncryptor $encryptor,
        MandrillMailer $mailer
    ): Response|RedirectResponse {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'amount' => ['required', 'numeric', 'min:0'],
            'paid_date' => ['required', 'date_format:Y-m-d'],
            'evidence' => ['required', 'file', 'max:4096'],
        ], [
            'amount.required' => 'El monto es obligatorio.',
            'paid_date.required' => 'La fecha del pago es obligatoria.',
            'evidence.required' => 'La evidencia en imagen es obligatoria.',
        ]);

        if (! config('services.mandrill.key')) {
            throw ValidationException::withMessages([
                'email' => 'No esta configurada la variable KEY_MANDRIL en el archivo .env.',
            ]);
        }

        $extension = strtolower($request->file('evidence')->getClientOriginalExtension());
        abort_if(! in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'], true), 422, 'La evidencia debe ser una imagen.');
        $filename = Str::uuid().'.'.$extension;
        File::ensureDirectoryExists(storage_path('app/public/evidences'));
        $request->file('evidence')->move(storage_path('app/public/evidences'), $filename);

        $paidAt = $validated['paid_date'].' 00:00:00';
        $generatedAt = now()->format('Y-m-d H:i:s');
        $paymentId = (int) now()->format('YmdHisv');
        $unica = hash('sha256', $validated['email'].'|'.$validated['amount'].'|'.$paymentId.'|'.Str::random(32));
        $reference = (string) random_int(10000, 99999);
        $downloadToken = Str::random(64);

        $payload = [
            'id' => $paymentId,
            'user_id' => 0,
            'course_id' => 0,
            'amount' => (float) $validated['amount'],
            'method' => 'Credito',
            'status' => 'paid',
            'reference' => $reference,
            'paid_at' => $paidAt,
            'created_at' => $generatedAt,
            'updated_at' => $generatedAt,
            'unica' => $unica,
        ];

        $keyFilename = 'crypto-efectivo-'.$paymentId.'.10hf';
        File::ensureDirectoryExists(storage_path('app/generated_files'));
        File::put(
            storage_path('app/generated_files/'.$keyFilename),
            $encryptor->encriptar(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES))
        );

        $key = $store->create(
            $validated['email'],
            (float) $validated['amount'],
            'evidences/'.$filename,
            $keyFilename,
            $paymentId,
            $reference,
            $unica,
            $downloadToken
        );

        try {
            $mailer->sendKeyFile(
                $validated['email'],
                storage_path('app/generated_files/'.$key->key_filename),
                $key->key_filename,
                (float) $validated['amount'],
                $paymentId,
                $generatedAt,
                route('keys.public-download', $downloadToken)
            );
        } catch (RuntimeException $exception) {
            throw ValidationException::withMessages([
                'email' => $exception->getMessage(),
            ]);
        }

        session()->flash('status', 'Key generada correctamente y enviada por correo.');

        return $this->downloadFile(storage_path('app/generated_files/'.$key->key_filename), $key->key_filename);
    }

    public function show(int $key, GeneratedKeyStore $store): View
    {
        $key = $store->find($key);
        abort_if(! $key, 404);

        return view('keys.show', ['key' => $key]);
    }

    public function updateStatus(Request $request, int $key, GeneratedKeyStore $store): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:active,revoked'],
        ]);

        abort_if(! $store->updateStatus($key, $validated['status']), 404);

        return back()->with('status', 'Estado actualizado.');
    }

    public function destroy(int $key, GeneratedKeyStore $store): RedirectResponse
    {
        $store->delete($key);

        return redirect()->route('keys.index')->with('status', 'Key eliminada.');
    }

    public function download(int $key, GeneratedKeyStore $store): Response
    {
        $key = $store->find($key);
        abort_if(! $key, 404);

        $path = storage_path('app/generated_files/'.$key->key_filename);
        abort_if(! File::exists($path), 404);

        return $this->downloadFile($path, $key->key_filename);
    }

    public function publicDownload(string $token, GeneratedKeyStore $store): Response
    {
        $key = $store->findByDownloadToken($token);
        abort_if(! $key, 404);

        $path = storage_path('app/generated_files/'.$key->key_filename);
        abort_if(! File::exists($path), 404);

        return $this->downloadFile($path, $key->key_filename);
    }

    private function downloadFile(string $path, string $filename): Response
    {
        return response(File::get($path), 200, [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
            'Content-Length' => (string) File::size($path),
        ]);
    }
}

<?php

namespace App\Support;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GeneratedKeyStore
{
    private string $path;

    public function __construct()
    {
        $this->path = storage_path('app/generated_keys.json');
    }

    public function paginate(?string $search, ?string $status, int $perPage = 10): LengthAwarePaginator
    {
        $records = collect($this->all())
            ->when($search, function ($records) use ($search) {
                $needle = Str::lower($search);

                return $records->filter(fn (array $record): bool => Str::contains(Str::lower($record['email']), $needle)
                    || Str::contains(Str::lower($record['key_code']), $needle)
                    || Str::contains(Str::lower($record['key_filename'] ?? ''), $needle));
            })
            ->when($status, fn ($records) => $records->where('status', $status))
            ->sortByDesc('created_at')
            ->values();

        $page = LengthAwarePaginator::resolveCurrentPage();
        $items = $records->forPage($page, $perPage)->map(fn (array $record): object => (object) $record)->values();

        return new LengthAwarePaginator($items, $records->count(), $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);
    }

    public function count(): int
    {
        return count($this->all());
    }

    public function countByStatus(string $status): int
    {
        return collect($this->all())->where('status', $status)->count();
    }

    public function create(
        string $email,
        float $amount,
        string $evidencePath,
        string $keyFilename,
        int $paymentId,
        string $reference,
        string $uniqueHash,
        string $downloadToken
    ): object
    {
        $records = $this->all();

        $record = [
            'id' => empty($records) ? 1 : max(array_column($records, 'id')) + 1,
            'key_code' => $this->makeUniqueKey($records),
            'email' => $email,
            'amount' => number_format($amount, 2, '.', ''),
            'evidence_path' => $evidencePath,
            'key_filename' => $keyFilename,
            'payment_id' => $paymentId,
            'method' => 'Credito',
            'reference' => $reference,
            'unique_hash' => $uniqueHash,
            'download_token' => $downloadToken,
            'status' => 'active',
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ];

        $records[] = $record;
        $this->write($records);

        return (object) $record;
    }

    public function find(int $id): ?object
    {
        $record = collect($this->all())->firstWhere('id', $id);

        return $record ? (object) $record : null;
    }

    public function updateStatus(int $id, string $status): ?object
    {
        $records = $this->all();

        foreach ($records as &$record) {
            if ((int) $record['id'] === $id) {
                $record['status'] = $status;
                $record['updated_at'] = now()->toDateTimeString();
                $this->write($records);

                return (object) $record;
            }
        }

        return null;
    }

    public function findByDownloadToken(string $token): ?object
    {
        $record = collect($this->all())->firstWhere('download_token', $token);

        return $record ? (object) $record : null;
    }

    public function delete(int $id): void
    {
        $records = $this->all();
        $record = collect($records)->firstWhere('id', $id);

        if ($record) {
            Storage::disk('public')->delete($record['evidence_path']);
            if (isset($record['key_filename'])) {
                File::delete(storage_path('app/generated_files/'.$record['key_filename']));
            }
        }

        $this->write(array_values(array_filter($records, fn (array $record): bool => (int) $record['id'] !== $id)));
    }

    private function all(): array
    {
        if (! File::exists($this->path)) {
            File::ensureDirectoryExists(dirname($this->path));
            File::put($this->path, json_encode([], JSON_PRETTY_PRINT));
        }

        return json_decode(File::get($this->path), true) ?: [];
    }

    private function write(array $records): void
    {
        File::ensureDirectoryExists(dirname($this->path));
        File::put($this->path, json_encode($records, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    private function makeUniqueKey(array $records): string
    {
        $existing = array_column($records, 'key_code');

        do {
            $key = 'CRYPTO-'.Str::upper(Str::random(8)).'-'.Str::upper(Str::random(8)).'-'.Str::upper(Str::random(8));
        } while (in_array($key, $existing, true));

        return $key;
    }
}

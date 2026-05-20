<?php

namespace App\Support;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class MandrillMailer
{
    public function sendKeyFile(
        string $toEmail,
        string $filePath,
        string $filename,
        float $amount,
        int $paymentId,
        string $generatedAt,
        string $downloadUrl
    ): void
    {
        $apiKey = config('services.mandrill.key');

        if (! $apiKey) {
            throw new RuntimeException('No esta configurada la variable KEY_MANDRIL en el archivo .env.');
        }

        $response = Http::timeout(20)->post('https://mandrillapp.com/api/1.0/messages/send.json', [
            'key' => $apiKey,
            'message' => [
                'html' => view('emails.crypto-key', [
                    'amount' => $amount,
                    'downloadUrl' => $downloadUrl,
                    'filename' => $filename,
                    'generatedAt' => $generatedAt,
                    'participantName' => $toEmail,
                    'paymentId' => $paymentId,
                    'toEmail' => $toEmail,
                ])->render(),
                'text' => "Adjuntamos tu archivo {$filename} por un monto de $".number_format($amount, 2).'.',
                'subject' => 'Archivo Crypto Efectivo',
                'from_email' => 'noreply@cryptoefectivo.com',
                'from_name' => 'Crypto Efectivo',
                'to' => [
                    [
                        'email' => $toEmail,
                        'type' => 'to',
                    ],
                ],
                'attachments' => [
                    [
                        'type' => 'application/octet-stream',
                        'name' => $filename,
                        'content' => base64_encode(File::get($filePath)),
                    ],
                ],
            ],
        ]);

        if (! $response->successful()) {
            throw new RuntimeException('Mandrill no acepto el correo: '.$response->body());
        }

        $result = $response->json('0');

        if (! is_array($result) || in_array($result['status'] ?? null, ['rejected', 'invalid'], true)) {
            throw new RuntimeException('Mandrill rechazo el correo: '.json_encode($result));
        }
    }
}

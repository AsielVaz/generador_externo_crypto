<?php

namespace App\Support;

class CryptoEfectivoEncryptor
{
    public function encriptar(string $cadena): string
    {
        $clave = 'Encr10h-.$=2023SecretoMuajaaja';

        if (function_exists('openssl_encrypt')) {
            $iv = \openssl_random_pseudo_bytes(\openssl_cipher_iv_length('aes-256-cbc'));
            $encriptado = \openssl_encrypt($cadena, 'aes-256-cbc', $clave, 0, $iv);

            return base64_encode($iv.$encriptado);
        }

        $iv = random_bytes(16);
        $aes = new \phpseclib3\Crypt\AES('cbc');
        $aes->setKey(str_pad($clave, 32, "\0"));
        $aes->setIV($iv);
        $encriptado = base64_encode($aes->encrypt($cadena));

        return base64_encode($iv.$encriptado);
    }
}

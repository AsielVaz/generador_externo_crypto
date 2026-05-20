<?php

namespace App\Support;

class AdminCredentials
{
    public static function all(): array
    {
        return [
            [
                'name' => 'Admin',
                'email' => 'admin@admin',
                'password' => 'admin',
            ],
            [
                'name' => 'Luis',
                'email' => 'luism.jmtz@gmail.com',
                'password' => 'Luis0311951705N',
            ],
        ];
    }

    public static function isValid(string $email, string $password): bool
    {
        foreach (self::all() as $admin) {
            if ($admin['email'] === $email && $admin['password'] === $password) {
                return true;
            }
        }

        return false;
    }
}

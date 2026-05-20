<?php

namespace Database\Seeders;

use App\Models\User;
use App\Support\AdminCredentials;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach (AdminCredentials::all() as $admin) {
            User::updateOrCreate([
                'email' => $admin['email'],
            ], [
                'name' => $admin['name'],
                'password' => Hash::make($admin['password']),
            ]);
        }
    }
}

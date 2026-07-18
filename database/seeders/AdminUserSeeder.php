<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Buat (atau update) 1 akun admin tetap untuk EDUXCHANGE.
     * Aman dijalankan berkali-kali: kalau email sudah ada, datanya di-update, bukan dobel.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'eduxchange2026@gmail.com'],
            [
                'name' => 'Admin EDUXCHANGE',
                'password' => 'admin123.', // otomatis di-hash karena di-cast 'hashed' di model User
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );
    }
}

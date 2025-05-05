<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat user admin (ini sudah ada di migrasi, tapi kita bisa duplikat atau modifikasi di sini)
        User::create([
            'name' => 'admin',
            'email' => 'admin@themesbrand.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'role' => 'admin',
            'nip' => '198001012010011001',
            'jabatan' => 'Admin Utama',
            'avatar' => 'admin.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Membuat beberapa user petugas
        User::create([
            'name' => 'Petugas Satu',
            'email' => 'petugas1@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'role' => 'petugas',
            'nip' => '198505052015052001',
            'jabatan' => 'Petugas Pelayanan',
            'avatar' => 'petugas1.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Petugas Dua',
            'email' => 'petugas2@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'role' => 'petugas',
            'nip' => '199010102020102002',
            'jabatan' => 'Staf Administrasi',
            'avatar' => 'petugas2.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Anda bisa menambahkan lebih banyak data user di sini sesuai kebutuhan
    }
}
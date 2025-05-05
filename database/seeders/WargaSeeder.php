<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wargas')->insert([
            [
                'nama' => 'rizal Arif',
                'nik' => '1234567890123456',
                'email' => 'rizallarif32@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'alamat' => 'Jalan Mawar No. 10, Makassar',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'arif rizal',
                'nik' => '9876543210987654',
                'email' => 'ariffrizal23@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'alamat' => 'Lorong Dahlia No. 5, Makassar',
                'remember_token' => Str::random(10), // Tambahkan remember_token di sini
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // ... data warga lainnya dengan 9 elemen
        ]);
    }
}
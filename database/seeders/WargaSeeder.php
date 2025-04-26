<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wargas')->insert([
            [
                'nama' => 'Budi Santoso',
                'nik' => '1234567890123456',
                'alamat' => 'Jalan Mawar No. 10, Makassar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Aminah',
                'nik' => '9876543210987654',
                'alamat' => 'Lorong Dahlia No. 5, Makassar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rudi Hartono',
                'nik' => '1122334455667788',
                'alamat' => 'Perumahan Melati Blok A No. 3, Makassar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Aisyah Putri',
                'nik' => '9988776655443322',
                'alamat' => 'Jalan Anggrek No. 123, Makassar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Fahri Pratama',
                'nik' => '1020304050607080',
                'alamat' => 'Komplek Cemara Indah No. 7, Makassar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data warga lainnya di sini jika perlu
        ]);
    }
}
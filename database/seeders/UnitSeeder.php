<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit::insert([
            [
                'nama' => 'Sekretariat',
                'kode' => 'SKR',
                'deskripsi' => 'Unit yang bertanggung jawab atas administrasi umum.',
                'kepala_unit_id' => 1, // Asumsi user dengan ID 1 adalah kepala unit (misalnya: 'Budi Sekretariat')
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Keuangan',
                'kode' => 'KEU',
                'deskripsi' => 'Unit yang mengelola keuangan organisasi.',
                'kepala_unit_id' => 1, // Asumsi user dengan ID 2 adalah kepala unit (misalnya: 'Siti Keuangan')
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Sumber Daya Manusia',
                'kode' => 'SDM',
                'deskripsi' => 'Unit yang mengelola sumber daya manusia.',
                'kepala_unit_id' => 1, // Asumsi user dengan ID 3 adalah kepala unit (misalnya: 'Andi SDM')
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pengembangan Bisnis',
                'kode' => 'PB',
                'deskripsi' => 'Unit yang fokus pada pengembangan bisnis.',
                'kepala_unit_id' => 1, // Asumsi user dengan ID 4 adalah kepala unit (misalnya: 'Rina Bisnis')
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Teknologi Informasi',
                'kode' => 'TI',
                'deskripsi' => 'Unit yang mengelola infrastruktur dan sistem TI.',
                'kepala_unit_id' => 1, // Asumsi user dengan ID 5 adalah kepala unit (misalnya: 'Faisal TI')
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
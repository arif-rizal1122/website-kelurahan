<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('configs')->insert([
            [
                'app_key' => 'desa_default_123',
                'nama_desa' => 'Desa Maju Jaya',
                'kode_desa' => '32.01.01.2001',
                'kode_pos' => 12345,
                'nama_kecamatan' => 'Kecamatan Ciputat',
                'kode_kecamatan' => '32.01.01',
                'nama_kepala_camat' => 'Dr. H. Ahmad Sanusi, M.Si',
                'nip_kepala_camat' => '196512311987031001',
                'nama_kabupaten' => 'Kabupaten Tangerang',
                'kode_kabupaten' => '32.01',
                'nama_propinsi' => 'Banten',
                'kode_propinsi' => '32',
                'logo' => 'logo-desa.png',
                'path' => null,
                'alamat_kantor' => 'Jl. Raya Serang KM. 15, Desa Maju Jaya, Kec. Ciputat',
                'email_desa' => 'desamajujaya@example.com',
                'telepon' => '(021) 1234567',
                'nomor_operator' => '081234567890',
                'kantor_desa' => 'Gedung Serba Guna Desa Maju Jaya',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
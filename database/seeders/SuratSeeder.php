<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SuratSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('surats')->insert([
            [
                'nomor_surat' => '001/ABC/2024',
                'kode_surat' => 'ABC123',
                'dari' => 'Kementerian A',
                'tujuan' => 'Dinas B',
                'tanggal_surat' => Carbon::parse('2024-04-10'),
                'tanggal_pengiriman' => Carbon::parse('2024-04-11'),
                'tanggal_diterima' => Carbon::parse('2024-04-12'),
                'isi_surat' => 'Ini adalah isi surat masuk mengenai koordinasi program.',
                'catatan' => 'Tindak lanjuti segera.',
                'ringkasan' => 'Koordinasi program 2024',
                'surat' => 'masuk',
                'ekspedisi' => false,
                'config_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_surat' => '002/DEF/2024',
                'kode_surat' => 'DEF456',
                'dari' => 'Dinas B',
                'tujuan' => 'Kementerian A',
                'tanggal_surat' => Carbon::parse('2024-04-13'),
                'tanggal_pengiriman' => Carbon::parse('2024-04-14'),
                'tanggal_diterima' => Carbon::parse('2024-04-15'),
                'isi_surat' => 'Ini adalah isi surat keluar terkait laporan bulanan.',
                'catatan' => 'Sudah dikirim via pos.',
                'ringkasan' => 'Laporan Bulanan',
                'surat' => 'keluar',
                'ekspedisi' => true,
                'config_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data dummy lainnya jika perlu...
        ]);
    }
}

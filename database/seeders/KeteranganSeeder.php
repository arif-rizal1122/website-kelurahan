<?php

namespace Database\Seeders;

use App\Models\Keterangan;
use Illuminate\Database\Seeder;

class KeteranganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Keterangan::insert([
            [
                'apa' => 'Pengajuan Surat Keterangan Tidak Mampu',
                'mengapa' => 'Untuk keperluan pengajuan beasiswa pendidikan anak.',
                'kapan' => null,
                'di_mana' => 'Diajukan di Kantor Desa Makmur Jaya.',
                'siapa' => 'Atas nama Bapak Budi Santoso.',
                'bagaimana' => 'Melengkapi persyaratan administrasi yang telah ditentukan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'apa' => 'Pengajuan Surat Keterangan Domisili',
                'mengapa' => 'Sebagai persyaratan pendaftaran sekolah.',
                'kapan' => null,
                'di_mana' => 'Alamat sesuai dengan Kartu Keluarga.',
                'siapa' => 'Untuk anak saya, Siti Aminah.',
                'bagaimana' => 'Mengikuti prosedur pengajuan surat domisili di desa.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'apa' => 'Pengajuan Surat Keterangan Usaha',
                'mengapa' => 'Untuk pengajuan pinjaman modal usaha ke bank.',
                'kapan' => 'Usaha berjalan sejak tahun 2022.',
                'di_mana' => 'Lokasi usaha di Jalan Dahlia No. 15.',
                'siapa' => 'Pemilik usaha adalah Bapak Joni Wijaya.',
                'bagaimana' => 'Menyertakan data diri dan informasi usaha yang diperlukan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'apa' => 'Pengajuan Surat Keterangan Kelakuan Baik',
                'mengapa' => 'Sebagai salah satu syarat melamar pekerjaan.',
                'kapan' => null,
                'di_mana' => 'Menerangkan kelakuan baik selama menjadi warga desa.',
                'siapa' => 'Atas nama Saudara Rina Putri.',
                'bagaimana' => 'Berdasarkan catatan dan pengamatan perangkat desa.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'apa' => 'Pengajuan Surat Undangan Rapat Warga',
                'mengapa' => 'Untuk membahas persiapan perayaan HUT Kemerdekaan.',
                'kapan' => 'Rapat akan dilaksanakan pada tanggal 17 Agustus 2025.',
                'di_mana' => 'Bertempat di Balai Desa.',
                'siapa' => 'Ditujukan kepada seluruh warga Desa Sukamaju.',
                'bagaimana' => 'Disampaikan melalui surat resmi dan pengumuman di papan informasi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
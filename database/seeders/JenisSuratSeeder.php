<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisSurat;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh data jenis surat
        $jenisSurats = [
            [
                'nama' => 'Surat Keterangan Domisili',
                'deskripsi' => 'Surat yang menerangkan alamat tempat tinggal seseorang.',
            ],
            [
                'nama' => 'Surat Keterangan Tidak Mampu',
                'deskripsi' => 'Surat yang menerangkan bahwa seseorang atau keluarga termasuk golongan tidak mampu.',
            ],
            [
                'nama' => 'Surat Keterangan Usaha',
                'deskripsi' => 'Surat yang menerangkan jenis dan lokasi usaha seseorang.',
            ],
            [
                'nama' => 'Surat Pengantar RT/RW',
                'deskripsi' => 'Surat pengantar dari ketua RT/RW untuk keperluan tertentu.',
            ],
            [
                'nama' => 'Surat Keterangan Kelahiran',
                'deskripsi' => 'Surat yang menerangkan kelahiran seseorang.',
            ],
            // Anda bisa menambahkan data jenis surat lainnya di sini
        ];

        // Loop melalui data dan buat record di database
        foreach ($jenisSurats as $jenisSuratData) {
            JenisSurat::create($jenisSuratData);
        }
    }
}
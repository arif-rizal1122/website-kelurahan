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
                'code' => 'KDM',
                'template_surat' => 'Surat ini menerangkan bahwa [Nama Lengkap] benar-benar berdomisili di [Alamat Lengkap], [RT/RW], [Kelurahan/Desa], [Kecamatan], [Kabupaten/Kota], sejak tanggal [Tanggal    Mulai Tinggal].',
                'deskripsi' => 'Surat yang menerangkan alamat tempat tinggal seseorang.',
            ],
            [
                'nama' => 'Surat Keterangan Tidak Mampu',
                'code' => 'KKT',
                'template_surat' => 'Surat ini menerangkan bahwa [Nama Lengkap] / Kepala Keluarga [Nama Kepala Keluarga] dengan alamat [Alamat Lengkap], termasuk dalam golongan keluarga tidak mampu dan layak mendapatkan bantuan.',
                'deskripsi' => 'Surat yang menerangkan bahwa seseorang atau keluarga termasuk golongan tidak mampu.',
            ],
            [
                'nama' => 'Surat Keterangan Usaha',
                'code' => 'KUM',
                'template_surat' => 'Surat ini menerangkan bahwa [Nama Lengkap] memiliki usaha [Jenis Usaha] yang berlokasi di [Alamat Usaha] dan telah berjalan sejak [Tahun Mulai Usaha].',
                'deskripsi' => 'Surat yang menerangkan jenis dan lokasi usaha seseorang.',
            ],
            [
                'nama' => 'Surat Pengantar RT/RW',
                'code' => 'KML',
                'template_surat' => 'Surat Pengantar dari Ketua RT [Nomor RT] / RW [Nomor RW] Kelurahan/Desa [Nama Kelurahan/Desa] Kecamatan [Nama Kecamatan] Kabupaten/Kota [Nama Kabupaten/Kota] ini diberikan kepada [Nama Lengkap] untuk keperluan [Tujuan Keperluan].',
                'deskripsi' => 'Surat pengantar dari ketua RT/RW untuk keperluan tertentu.',
            ],
            [
                'nama' => 'Surat Keterangan Kelahiran',
                'code' => 'KKK',
                'template_surat' => 'Surat ini menerangkan bahwa telah lahir seorang anak [Laki-laki/Perempuan] bernama [Nama Anak] pada tanggal [Tanggal Lahir] di [Tempat Lahir], dari ayah bernama [Nama Ayah] dan ibu bernama [Nama Ibu].',
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
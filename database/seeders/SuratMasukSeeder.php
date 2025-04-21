<?php

namespace Database\Seeders;

use App\Enums\Surat;
use App\Models\Attachment;
use App\Models\Surat as SuratModel;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class SuratMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 20; $i++) {
            $suratMasuk = SuratModel::create([
                'nomor_surat' => 'SM-' . $faker->unique()->randomNumber(5),
                'kode_surat' => $faker->optional()->lexify('???') . '-' . $faker->randomNumber(3),
                'dari' => $faker->company(),
                'tujuan' => $faker->name(),
                'tanggal_surat' => $faker->date(),
                'tanggal_pengiriman' => $faker->optional()->dateTimeBetween('-3 months', 'now'),
                'tanggal_diterima' => $faker->dateTimeBetween('-2 months', 'now'),
                'isi_surat' => $faker->paragraph(3),
                'catatan' => $faker->optional()->sentence(),
                'ringkasan' => $faker->sentence(),
                'tipe_surat' => Surat::MASUK,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Membuat data dummy untuk lampiran (wajib untuk surat masuk)
            for ($j = 0; $j < $faker->numberBetween(1, 2); $j++) {
                $filename = 'sm_lampiran_' . $faker->unique()->randomNumber(3) . '.pdf';
                $path = 'attachments/' . $filename;
                Storage::disk('public')->put($path, 'Ini adalah isi file PDF dummy untuk surat masuk.');

                Attachment::create([
                    'surat_id' => $suratMasuk->id,
                    'path' => $path,
                    'filename' => $filename,
                    'extension' => 'pdf',
                ]);
            }
        }
    }
}
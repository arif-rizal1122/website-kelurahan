<?php

namespace Database\Seeders;

use App\Enums\Surat;
use App\Models\Attachment;
use App\Models\Surat as SuratModel;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class SuratKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 20; $i++) {
            $suratKeluar = SuratModel::create([
                'nomor_surat' => 'SK-' . $faker->unique()->randomNumber(5),
                'dari' => $faker->name(),
                'tujuan' => $faker->company(),
                'tanggal_surat' => $faker->date(),
                'tanggal_pengiriman' => $faker->dateTimeBetween('-2 months', 'now'),
                'tanggal_diterima' => $faker->optional()->dateTimeBetween('-1 month', 'now'),
                'isi_surat' => $faker->paragraph(3),
                'catatan' => $faker->optional()->sentence(),
                'ringkasan' => $faker->sentence(),
                'tipe_surat' => Surat::KELUAR,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Membuat data dummy untuk lampiran secara opsional
            if ($faker->boolean(50)) { // Peluang 50% untuk membuat lampiran
                $jumlahLampiran = $faker->numberBetween(1, 2);
                for ($j = 0; $j < $jumlahLampiran; $j++) {
                    $filename = 'sk_lampiran_' . $faker->unique()->randomNumber(3) . '.pdf';
                    $path = 'attachments/' . $filename;
                    Storage::disk('public')->put($path, 'Ini adalah isi file PDF dummy untuk surat keluar.');

                    Attachment::create([
                        'surat_id' => $suratKeluar->id,
                        'path' => $path,
                        'filename' => $filename,
                        'extension' => 'pdf',
                    ]);
                }
            }
        }
    }
}
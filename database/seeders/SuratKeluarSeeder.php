<?php

namespace Database\Seeders;

use App\Enums\Surat;
use App\Models\Surat as SuratModel;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SuratKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            SuratModel::create([
                'nomor_surat' => 'SK-' . $faker->unique()->randomNumber(5),
                'kode_surat' => $faker->optional()->lexify('???') . '-' . $faker->randomNumber(3),
                'dari' => $faker->name(),
                'tujuan' => $faker->company(),
                'tanggal_surat' => $faker->date(),
                'tanggal_pengiriman' => $faker->dateTimeBetween('-2 months', 'now'),
                'tanggal_diterima' => $faker->optional()->dateTimeBetween('-1 month', 'now'),
                'isi_surat' => $faker->paragraph(3),
                'catatan' => $faker->optional()->sentence(),
                'ringkasan' => $faker->sentence(),
                'tipe_surat' => Surat::KELUAR, // Menggunakan enum Surat::KELUAR
                'config_id' => 1, // Ganti dengan config_id yang sesuai di database Anda
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
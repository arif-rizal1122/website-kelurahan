<?php

namespace Database\Seeders;

use App\Models\TwebPenduduk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class TwebPendudukSeeder extends Seeder
{
        public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        $configId = \App\Models\Config::first()->id;

        foreach (range(1, 50) as $i) {
            \App\Models\TwebPenduduk::create([
                'config_id' => $configId,
                'nama' => $faker->name,
                'nik' => $faker->unique()->numerify('################'),
                'sex' => $faker->randomElement([1, 2]),
                'tempatlahir' => $faker->city,
                'tanggallahir' => $faker->date('Y-m-d', '-18 years'),
                'foto' => null,

                'id_kk' => $faker->numberBetween(100000, 999999),
                'kk_level' => $faker->numberBetween(1, 3),
                'alamat_sekarang' => $faker->address,
                'alamat_sebelumnya' => $faker->address,
                'no_kk_sebelumnya' => $faker->numerify('##########'),

                'pendidikan_kk_id' => $faker->numberBetween(1, 9),
                'pendidikan_sedang_id' => $faker->numberBetween(1, 9),
                'pekerjaan_id' => $faker->numberBetween(1, 20),

                'status_kawin' => $faker->numberBetween(0, 3),
                'status_dasar' => 1,
                'tanggalperkawinan' => $faker->optional()->date(),
                'tanggalperceraian' => $faker->optional()->date(),

                'ayah_nik' => $faker->numerify('################'),
                'ibu_nik' => $faker->numerify('################'),
                'nama_ayah' => $faker->name('male'),
                'nama_ibu' => $faker->name('female'),

                'telepon' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,

                'golongan_darah_id' => $faker->numberBetween(1, 4),
                'cacat_id' => $faker->numberBetween(0, 3),
                'sakit_menahun_id' => $faker->numberBetween(0, 3),
                'hamil' => $faker->randomElement([0, 1]),

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}

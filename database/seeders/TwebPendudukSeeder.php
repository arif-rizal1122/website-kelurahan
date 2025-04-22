<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TwebPenduduk;
use App\Models\Config;
use Faker\Factory as Faker;

class TwebPendudukSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $configId = Config::first()->id ?? 1; // Asumsi ada minimal satu Config, jika tidak buat default

        foreach (range(1, 10) as $i) {
            $ayahNik = $faker->optional()->numerify('################');
            $ibuNik = $faker->optional()->numerify('################');
            $noKkSebelumnya = $faker->optional()->numerify('##########');

            TwebPenduduk::create([
                'nama' => $faker->name,
                'nik' => $faker->unique()->numerify('################'),
                'email' => $faker->unique()->safeEmail,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date('Y-m-d', '-18 years'),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'status_kawin' => $faker->randomElement(['Sudah', 'Belum', 'Cerai', 'Cerai_Mati']),
                'warga_negara' => 'Indonesia',
                'pendidikan_terakhir' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
                'pekerjaan' => $faker->jobTitle,
                'alamat_sekarang' => $faker->address,
                'alamat_sebelumnya' => $faker->optional()->address,
                'ayah_nik' => $ayahNik !== null ? $faker->unique()->numerify('################') : null,
                'ibu_nik' => $ibuNik !== null ? $faker->unique()->numerify('################') : null,
                'nama_ayah' => $faker->optional()->name('male'),
                'nama_ibu' => $faker->optional()->name('female'),
                'hubungan_warga' => $faker->randomElement(['Anak', 'Istri', 'Suami', 'Orangtua']),
                'no_kk_sebelumnya' => $noKkSebelumnya !== null ? $faker->unique()->numerify('##########') : null,
                'golongan_darah' => $faker->randomElement(['A', 'B', 'AB', 'O']),
                'suku' => $faker->randomElement(['Jawa', 'Sunda', 'Batak', 'Minang', 'Bugis', 'Makassar']), // Tambah beberapa suku khas Indonesia Timur
                'ktp_el' => $faker->boolean,
                'status_rekam' => $faker->randomElement(['Sudah', 'Belum']),
                'tempat_cetak_ktp' => $faker->optional()->city,
                'tanggal_cetak_ktp' => $faker->optional()->date(),
                'status_keadaan' => $faker->randomElement(['Hidup', 'Mati', 'Sehat', 'Sakit']),
                'note' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
<?php

namespace Database\Seeders;

use App\Models\JenisSurat;
use App\Models\Keterangan;
use App\Models\PengajuanSurat;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Database\Seeder;

class PengajuanSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan ada data warga dan jenis surat sebelum membuat pengajuan
        $wargas = Warga::all();
        $jenisSurats = JenisSurat::all();
        $users = User::where('role', 'petugas')->get(); // Ambil user dengan role petugas

        if ($wargas->isEmpty() || $jenisSurats->isEmpty()) {
            $this->command->warn('Pastikan tabel wargas dan jenis_surats sudah terisi sebelum menjalankan seeder ini.');
            return;
        }

        // Fungsi untuk membuat data keterangan acak
        $buatKeteranganAcak = function () {
            $faker = \Faker\Factory::create('id_ID');
            return [
                'apa' => $faker->sentence(rand(3, 7)),
                'mengapa' => $faker->paragraph(rand(1, 3)),
                'kapan' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
                'di_mana' => $faker->address(),
                'siapa' => $faker->name(),
                'bagaimana' => $faker->paragraph(rand(2, 4)),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        };

        for ($i = 0; $i < 15; $i++) {
            $keterangan = Keterangan::create($buatKeteranganAcak());
            PengajuanSurat::create([
                'warga_id' => $wargas->random()->id,
                'jenis_surat_id' => $jenisSurats->random()->id,
                'keterangan_id' => $keterangan->id,
                'tanggal_pengajuan' => now()->subDays(rand(1, 30)),
                'status' => 'diajukan', // Set status menjadi 'diajukan'
                'tanggal_diproses' => null, // Kosongkan tanggal diproses
                'user_id' => null, // Kosongkan user_id
                'tanggal_selesai' => null, // Kosongkan tanggal selesai
                'keterangan_penolakan' => null, // Kosongkan keterangan penolakan
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now(),
            ]);
        }
    }
}
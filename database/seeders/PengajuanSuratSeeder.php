<?php

namespace Database\Seeders;

use App\Models\JenisSurat;
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

        // Contoh Pengajuan Surat 1: Baru diajukan
        PengajuanSurat::create([
            'warga_id' => $wargas->random()->id,
            'jenis_surat_id' => $jenisSurats->random()->id,
            'tanggal_pengajuan' => now()->subDays(5),
            'keperluan' => 'Pengajuan surat keterangan domisili untuk keperluan pendaftaran sekolah anak.',
            'keterangan_penolakan' => null,
            'status' => 'diajukan',
            'created_at' => now()->subDays(5),
            'updated_at' => now()->subDays(5),
        ]);

        // Contoh Pengajuan Surat 2: Sedang diproses
        PengajuanSurat::create([
            'warga_id' => $wargas->random()->id,
            'jenis_surat_id' => $jenisSurats->random()->id,
            'tanggal_pengajuan' => now()->subDays(10),
            'keperluan' => 'Permohonan surat pengantar pembuatan KTP.',
            'status' => 'diajukan',
            'tanggal_diproses' => now()->subDays(2),
            'keterangan_penolakan' => null,
            'user_id' => null,
            'created_at' => now()->subDays(10),
            'updated_at' => now()->subDays(2),
        ]);

        // Contoh Pengajuan Surat 3: Sudah selesai
        PengajuanSurat::create([
            'warga_id' => $wargas->random()->id,
            'jenis_surat_id' => $jenisSurats->random()->id,
            'tanggal_pengajuan' => now()->subWeeks(2),
            'keperluan' => 'Pengajuan surat keterangan usaha untuk pengajuan pinjaman.',
            'status' => 'diajukan',
            'tanggal_diproses' => now()->subWeeks(1, 5),
            'tanggal_selesai' => now()->subWeeks(1),
            'keterangan_penolakan' => null,
            'user_id' => null,
            'created_at' => now()->subWeeks(2),
            'updated_at' => now()->subWeeks(1),
        ]);

        // Contoh Pengajuan Surat 4: Ditolak
        PengajuanSurat::create([
            'warga_id' => $wargas->random()->id,
            'jenis_surat_id' => $jenisSurats->random()->id,
            'tanggal_pengajuan' => now()->subWeeks(3),
            'keperluan' => 'Permintaan surat izin keramaian (tidak disetujui).',
            'status' => 'diajukan',
            'tanggal_diproses' => now()->subWeeks(2, 3),
            'keterangan_penolakan' => null,
            'user_id' => null,
            'created_at' => now()->subWeeks(3),
            'updated_at' => now()->subWeeks(2, 3),
        ]);

        // Anda bisa menambahkan lebih banyak contoh pengajuan surat di sini
    }
}
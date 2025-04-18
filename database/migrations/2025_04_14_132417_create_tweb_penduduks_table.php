<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    
  public function up()
{
    Schema::create('tweb_penduduks', function (Blueprint $table) {
        $table->id();

        // Identitas dasar
        $table->string('nama', 100);
        $table->string('nik', 16)->nullable(false)->unique();
        $table->string('email')->unique();
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable(false);
        $table->string('tempat_lahir', 100)->nullable();
        $table->date('tanggal_lahir')->nullable(false);
        $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'])->nullable(false);
        $table->enum('status_kawin', ['Sudah', 'Belum', 'Cerai', 'Cerai_Mati'])->nullable(false);
        $table->string('warga_negara', 50)->nullable(false);

        // Pendidikan & pekerjaan
        $table->enum('pendidikan_terakhir', ['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3'])->nullable(false);
        $table->string('pekerjaan')->nullable(false);

        // Alamat
        $table->string('alamat_sekarang', 200)->nullable(false);
        $table->string('alamat_sebelumnya', 200)->nullable();

        // Hubungan keluarga
        $table->string('ayah_nik', 16)->nullable()->unique();
        $table->string('ibu_nik', 16)->nullable()->unique();
        $table->string('nama_ayah', 100)->nullable();
        $table->string('nama_ibu', 100)->nullable();
        $table->enum('hubungan_warga', ['Anak', 'Istri', 'Suami', 'Orangtua'])->nullable(false);
        $table->string('no_kk_sebelumnya')->nullable()->unique();

        // Lainnya
        $table->enum('golongan_darah', ['A', 'B', 'AB', 'O'])->nullable(false);
        $table->string('suku')->nullable(false);
        $table->boolean('ktp_el')->nullable(false)->default(false);
        $table->enum('status_rekam', ['Sudah', 'Belum'])->nullable(false);
        $table->string('tempat_cetak_ktp', 100)->nullable();
        $table->date('tanggal_cetak_ktp')->nullable();

        $table->enum('status_keadaan', ['Hidup', 'Mati', 'Sehat', 'Sakit'])->nullable(false);
        $table->text('note');
        $table->timestamps();
    });
}

     
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tweb_penduduks');
    }
};

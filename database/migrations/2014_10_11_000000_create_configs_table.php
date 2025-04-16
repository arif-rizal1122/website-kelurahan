<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('configs', static function (Blueprint $table) {
            $table->id();
            $table->string('app_key', 100)->unique();
            $table->string('nama_desa', 100);
            $table->string('kode_desa')->nullable()->unique();
            $table->integer('kode_pos')->nullable();
            $table->string('nama_kecamatan', 100);
            $table->string('kode_kecamatan')->nullable();
            $table->string('nama_kepala_camat', 100);
            $table->string('nip_kepala_camat', 100);
            $table->string('nama_kabupaten', 100);
            $table->string('kode_kabupaten')->nullable();
            $table->string('nama_propinsi', 100);
            $table->string('kode_propinsi')->nullable();
            $table->string('logo', 100)->nullable();
            $table->longText('path')->nullable();
            $table->string('alamat_kantor', 200)->nullable();
            $table->string('email_desa', 50)->nullable();
            $table->string('telepon', 50)->nullable();
            $table->string('nomor_operator', 20)->nullable();
            $table->string('kantor_desa', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configs');
    }
};

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
        Schema::create('surat_keluars', static function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('config_id')->nullable()->index('surat_keluar_config_fk');
            $table->smallInteger('nomor_urut')->nullable();
            $table->string('nomor_surat', 35)->nullable();
            $table->string('kode_surat', 10)->nullable();
            $table->date('tanggal_surat');
            $table->timestamp('tanggal_catat')->useCurrent();
            $table->string('tujuan', 100)->nullable();
            $table->string('isi_singkat', 200)->nullable();
            $table->string('berkas_scan', 100)->nullable();
            $table->boolean('ekspedisi')->nullable()->default(false);
            $table->date('tanggal_pengiriman')->nullable();
            $table->string('tanda_terima', 200)->nullable();
            $table->string('keterangan', 500)->nullable();
            $table->string('lokasi_arsip', 150)->nullable()->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keluars');
    }
};

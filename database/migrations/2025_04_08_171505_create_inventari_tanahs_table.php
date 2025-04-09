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
        Schema::create('inventaris_tanahs', static function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('config_id')->nullable()->index('inventaris_tanah_config_fk');
            $table->string('nama_barang');
            $table->string('kode_barang', 64);
            $table->string('register', 64);
            $table->integer('luas');
            $table->year('tahun_pengadaan');
            $table->string('letak');
            $table->string('hak');
            $table->string('no_sertifikat')->nullable();
            $table->date('tanggal_sertifikat')->nullable();
            $table->string('penggunaan');
            $table->string('asal');
            $table->double('harga');
            $table->text('keterangan');
            $table->integer('status')->default(0);
            $table->integer('visible')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris_tanahs');
    }
};

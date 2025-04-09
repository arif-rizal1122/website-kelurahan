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
        Schema::create('inventaris_gedungs', static function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('config_id')->nullable()->index('inventaris_gedung_config_fk');
            $table->string('nama_barang');
            $table->string('kode_barang', 64);
            $table->string('register', 64);
            $table->string('kondisi_bangunan');
            $table->string('kontruksi_bertingkat')->nullable();
            $table->boolean('kontruksi_beton')->nullable()->default(false);
            $table->integer('luas_bangunan');
            $table->string('letak');
            $table->date('tanggal_dokument')->nullable();
            $table->string('no_dokument')->nullable();
            $table->integer('luas')->nullable();
            $table->string('status_tanah')->nullable();
            $table->string('kode_tanah')->nullable();
            $table->string('asal');
            $table->double('harga')->nullable();
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
        Schema::dropIfExists('inventari_gedungs');
    }
};

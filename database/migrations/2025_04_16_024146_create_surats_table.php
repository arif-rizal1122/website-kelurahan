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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat', 35)->nullable();
            $table->string('kode_surat', 10)->nullable();
            $table->string('dari')->nullable();
            $table->string('tujuan')->nullable();
            $table->date('tanggal_surat')->nullable();
            $table->date('tanggal_pengiriman')->nullable();
            $table->date('tanggal_diterima')->nullable();
            $table->text('isi_surat')->nullable();
            $table->text('catatan')->nullable();
            $table->string('ringkasan')->nullable();
            $table->enum('surat', ['masuk', 'keluar'])->nullable();
            $table->boolean('ekspedisi')->nullable()->default(false);
            $table->unsignedBigInteger('config_id')->nullable();
            $table->timestamps();

            $table->foreign('config_id')
                  ->references('id')
                  ->on('configs')
                  ->onDelete('set null');

        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};

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
            $table->foreignId('config_id')->nullable()->constrained('configs')->onDelete('cascade');
    
            // Identitas dasar
            $table->string('nama', 100);
            $table->string('nik', 16)->nullable()->unique();
            $table->unsignedTinyInteger('sex')->nullable();
            $table->string('tempatlahir', 100)->nullable();
            $table->date('tanggallahir')->nullable();
            $table->string('foto', 100)->nullable();
    
            // Keluarga dan domisili
            $table->integer('id_kk')->nullable();
            $table->tinyInteger('kk_level')->nullable();
            $table->string('alamat_sekarang', 200)->nullable();
            $table->string('alamat_sebelumnya', 200)->nullable();
            $table->string('no_kk_sebelumnya', 30)->nullable();
    
            // Pendidikan dan pekerjaan
            $table->integer('pendidikan_kk_id')->nullable();
            $table->integer('pendidikan_sedang_id')->nullable();
            $table->integer('pekerjaan_id')->nullable();
    
            // Status sipil
            $table->tinyInteger('status_kawin')->nullable();
            $table->tinyInteger('status_dasar')->default(1);
            $table->date('tanggalperkawinan')->nullable();
            $table->date('tanggalperceraian')->nullable();
    
            // Orang tua
            $table->string('ayah_nik', 16)->nullable();
            $table->string('ibu_nik', 16)->nullable();
            $table->string('nama_ayah', 100)->nullable();
            $table->string('nama_ibu', 100)->nullable();
    
            // Kontak
            $table->string('telepon', 20)->nullable();
            $table->string('email', 100)->nullable()->unique();
    
            // Kesehatan dan lainnya
            $table->integer('golongan_darah_id')->nullable();
            $table->tinyInteger('cacat_id')->nullable();
            $table->tinyInteger('sakit_menahun_id')->nullable();
            $table->tinyInteger('hamil')->nullable();
    
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

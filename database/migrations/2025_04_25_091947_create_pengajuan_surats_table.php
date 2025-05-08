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
        Schema::create('pengajuan_surats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('warga_id');
            $table->unsignedBigInteger('jenis_surat_id');
            $table->unsignedBigInteger('keterangan_id')->nullable()->unique();
            $table->timestamp('tanggal_pengajuan')->useCurrent()->useCurrentOnUpdate();
            $table->string('status', 50)->nullable();
            $table->timestamp('tanggal_diproses')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamp('tanggal_selesai')->nullable();
            $table->text('keterangan_penolakan')->nullable();
            $table->string('file_pendukung')->nullable();
            $table->boolean('cek')->nullable();
            $table->timestamps();

            $table->foreign('warga_id')->references('id')->on('wargas')->onDelete('CASCADE');
            $table->foreign('jenis_surat_id')->references('id')->on('jenis_surats');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('keterangan_id')->references('id')->on('keterangans')->onDelete('SET NULL'); 

            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_surats');
    }
};

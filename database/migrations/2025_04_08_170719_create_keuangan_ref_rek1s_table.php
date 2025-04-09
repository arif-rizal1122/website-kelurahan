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
        Schema::create('keuangan_ref_rek1s', static function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('config_id')->nullable()->index('keuangan_ref_rek1_config_fk');
            $table->integer('id_keuangan_master')->index('id_keuangan_ref_rek1_master_fk');
            $table->string('Akun', 100);
            $table->string('Nama_Akun', 100);
            $table->string('NoLap', 100);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangan_ref_rek1s');
    }
};

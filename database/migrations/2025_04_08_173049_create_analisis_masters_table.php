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
        Schema::create('analisis_masters', static function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('config_id')->nullable()->index('analisis_master_config_fk');
            $table->string('nama', 40);
            $table->tinyInteger('subjek_tipe');
            $table->boolean('lock')->default(true);
            $table->text('deskripsi');
            $table->string('kode_analisis', 5)->default('00000');
            $table->integer('id_kelompok')->nullable();
            $table->string('pembagi', 10)->default('100');
            $table->smallInteger('id_child')->nullable();
            $table->tinyInteger('format_impor')->nullable();
            $table->tinyInteger('jenis')->default(2);
            $table->text('gform_id')->nullable();
            $table->text('gform_nik_item_id')->nullable();
            $table->dateTime('gform_last_sync')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analisis_masters');
    }
};

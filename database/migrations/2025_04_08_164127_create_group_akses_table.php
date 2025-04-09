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
        Schema::create('group_akses', function (Blueprint $table) {
            $table->id();
            $table->integer('id_modul');
            $table->integer('id_grup');
            $table->integer('config_id');
            $table->timestamps();
        
            $table->foreign('id_modul')
                  ->references('id')->on('setting_moduls')
                  ->onDelete('cascade')->onUpdate('cascade');
        
            $table->foreign('id_grup')
                  ->references('id')->on('user_groups') 
                  ->onDelete('cascade')->onUpdate('cascade');
        
            $table->foreign('config_id')
                  ->references('id')->on('configs') 
                  ->onDelete('cascade')->onUpdate('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_akses');
    }
};

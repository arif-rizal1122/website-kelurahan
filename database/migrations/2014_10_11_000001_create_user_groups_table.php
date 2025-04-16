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
        Schema::create('user_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('config_id')->nullable()->constrained('configs')->onDelete('cascade');
            $table->string('nama', 20);
            $table->string('slug')->nullable();
            $table->tinyInteger('jenis')->default(1);
            $table->timestamps();
        
            $table->unique(['config_id', 'slug']);
            $table->unique(['config_id', 'nama']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_groups');
    }
};

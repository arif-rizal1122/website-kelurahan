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
    Schema::create('keterangans', function (Blueprint $table) {
        $table->id();
        $table->text('apa')->nullable();       
        $table->text('mengapa')->nullable();   
        $table->text('kapan')->nullable();    
        $table->text('di_mana')->nullable();  
        $table->text('siapa')->nullable();     
        $table->text('bagaimana')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keterangans');
    }
};

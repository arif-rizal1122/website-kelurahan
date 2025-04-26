<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', static function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->string('password', 100);
            $table->string('email', 100)->nullable()->unique();
            $table->dateTime('email_verified_at')->nullable();
            $table->boolean('active')->nullable()->default(false);
            $table->enum('role', ['admin', 'petugas'])->default('petugas');
            $table->string('nip')->nullable()->unique(); 
            $table->string('jabatan')->nullable(); 
            $table->unsignedBigInteger('config_id')->nullable();
            $table->text('avatar')->nullable();
            $table->string('foto', 100)->nullable()->default('kuser.png');
            $table->timestamps();
            $table->rememberToken();

            // Add foreign key constraints separately
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
        Schema::dropIfExists('users');
    }
};
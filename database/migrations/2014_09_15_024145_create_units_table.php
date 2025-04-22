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
        Schema::create('units', function (Blueprint $table) {
            $table->id(); // Kolom primary key, biasanya auto-increment integer
            $table->string('nama', 100)->unique(); // Nama unit, contoh: 'Sekretariat', 'Keuangan', 'SDM'
            $table->string('kode', 20)->nullable()->unique(); // Kode unik untuk unit (opsional)
            $table->text('deskripsi')->nullable(); // Deskripsi tambahan tentang unit (opsional)
            $table->timestamps(); // Kolom `created_at` dan `updated_at` untuk timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
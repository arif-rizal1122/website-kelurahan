<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kode',
        'deskripsi',
        'kepala_unit_id',
    ];

    /**
     * Mendapatkan semua surat yang dikirim oleh unit ini.
     */
    public function suratKeluar(): HasMany
    {
        return $this->hasMany(Surat::class, 'unit_pengirim_id');
    }

    /**
     * Mendapatkan semua surat yang diterima oleh unit ini.
     */
    public function suratMasuk(): HasMany
    {
        return $this->hasMany(Surat::class, 'unit_penerima_id');
    }

    /**
     * Mendapatkan kepala unit (jika ada field 'kepala_unit_id').
     */
    public function kepalaUnit(): BelongsTo
    {
        return $this->belongsTo(User::class, 'kepala_unit_id');
    }

    /**
     * Mendapatkan daftar user yang tergabung dalam unit ini (jika ada kolom 'unit_id' di model User).
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'unit_id');
    }


        /**
     * Aksesor untuk mendapatkan nama kepala unit, menangani kasus null.
     *
     * @return string|null
     */
    public function getNamaKepalaUnitAttribute()
    {
        return $this->kepalaUnit ? $this->kepalaUnit->name : '-';
    }
}
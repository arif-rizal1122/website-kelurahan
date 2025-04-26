<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisSurat extends Model
{
    use HasFactory;

    protected $table = 'jenis_surats';

    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    /**
     * Get all of the pengajuanSurats for the JenisSurat
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengajuanSurats(): HasMany
    {
        return $this->hasMany(PengajuanSurat::class, 'jenis_surat_id');
    }
}
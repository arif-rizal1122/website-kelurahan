<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Keterangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'apa',
        'mengapa',
        'kapan',
        'di_mana',
        'siapa',
        'bagaimana',
    ];

    /**
     * Get the pengajuanSurat that owns the 
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pengajuanSurat(): HasOne
    {
        return $this->hasOne(PengajuanSurat::class, 'keterangan_id');
    }
}
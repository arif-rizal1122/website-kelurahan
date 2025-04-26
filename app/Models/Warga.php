<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Warga extends Model
{
    use HasFactory;

    protected $table = 'wargas'; 

    protected $fillable = [
        'nama',
        'nik',
        'alamat',
    ];

    /**
     * Get all of the pengajuanSurats for the Warga
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengajuanSurats(): HasMany
    {
        return $this->hasMany(PengajuanSurat::class, 'warga_id');
    }
}
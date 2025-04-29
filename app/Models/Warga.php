<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Warga extends Authenticatable
{
    use HasFactory;

    protected $table = 'wargas'; 

    protected $fillable = [
        'nama',
        'nik',
        'email', 
        'password',
        'alamat',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
        'email_verified_at' => 'datetime',
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
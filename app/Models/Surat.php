<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_surat',
        'kode_surat',
        'dari',
        'tujuan',
        'tanggal_surat',
        'tanggal_pengiriman',
        'tanggal_diterima',
        'isi_surat',
        'catatan',
        'ringkasan',
        'surat',
        'ekspedisi',
        'config_id',
    ];

    // Relasi ke tabel configs
    public function config()
    {
        return $this->belongsTo(Config::class);
    }

    public function scopeMasuk($query)
    {
        return $query->where('surat', 'masuk');
    }

    public function scopeKeluar($query)
    {
        return $query->where('surat', 'keluar');
    }
}

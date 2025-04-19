<?php

namespace App\Models;

use App\Enums\Surat as SuratEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'tipe_surat',
        'config_id',
    ];

    protected $casts = [
        'tipe_surat' => SuratEnum::class,
        'tanggal_surat' => 'date',
        'tanggal_pengiriman' => 'date',
        'tanggal_diterima' => 'date',
    ];

    // Relasi ke tabel configs
    public function config(): BelongsTo
    {
        return $this->belongsTo(Config::class);
    }

    /**
     * Mendefinisikan relasi dengan model Attachment.
     */
    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }

    public function scopeMasuk($query)
    {
        return $query->where('tipe_surat', SuratEnum::MASUK)->latest();
    }

    public function scopeKeluar($query)
    {
        return $query->where('tipe_surat', SuratEnum::KELUAR)->latest();
    }


}
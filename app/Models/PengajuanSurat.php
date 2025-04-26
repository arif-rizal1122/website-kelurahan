<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanSurat extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_surats'; 

    protected $fillable = [
        'warga_id',
        'jenis_surat_id',
        'tanggal_pengajuan',
        'keperluan',
        'status',
        'tanggal_diproses',
        'user_id',
        'tanggal_selesai',
        'keterangan_penolakan',
        'file_pendukung',
    ];

    protected $casts = [
        'tanggal_pengajuan' => 'datetime',
        'tanggal_diproses' => 'datetime',
        'tanggal_selesai' => 'datetime',
        'status' => \App\Enums\Status::class, 
    ];

    /**
     * Get the warga that owns the PengajuanSurat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function warga(): BelongsTo
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    /**
     * Get the jenisSurat that owns the PengajuanSurat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jenisSurat(): BelongsTo
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }

    /**
     * Get the petugas that owns the PengajuanSurat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
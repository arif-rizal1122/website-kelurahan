<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PengajuanSurat extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_surats'; 

    protected $fillable = [
        'warga_id',
        'jenis_surat_id',
        'keterangan_id',
        'tanggal_pengajuan',
        'status',
        'tanggal_diproses',
        'user_id',
        'tanggal_selesai',
        'keterangan_penolakan',
        'file_pendukung',
        'cek',
    ];


    protected $casts = [
        'tanggal_pengajuan' => 'datetime',
        'tanggal_diproses' => 'datetime',
        'tanggal_selesai' => 'datetime',
        'status' => \App\Enums\Status::class, 
        'cek' => 'boolean'
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

     /**
     * Get the fiveW1h associated with the PengajuanSurat
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function keterangan(): BelongsTo
    {
        return $this->belongsTo(Keterangan::class, 'keterangan_id');
    }
}
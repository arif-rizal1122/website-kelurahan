<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $table = 'configs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_desa', 'kode_desa', 'kode_pos', 'nama_kecamatan', 'kode_kecamatan',
        'nama_kepala_camat', 'nip_kepala_camat', 'nama_kabupaten', 'kode_kabupaten',
        'nama_propinsi', 'kode_propinsi', 'path', 'alamat_kantor', 'email_desa',
        'telepon', 'nomor_operator', 'logo', 'app_key'
    ];

    protected $casts = [
        'kode_pos' => 'integer'
    ];


}
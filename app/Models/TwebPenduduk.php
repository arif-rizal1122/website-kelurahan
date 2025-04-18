<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwebPenduduk extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'nik', 'nama', 'email', 'tempat_lahir', 'tanggal_lahir', 'agama', 'status_kawin',
        'jenis_kelamin', 'status_keadaan', 'warga_negara', 'pendidikan_terakhir', 'pekerjaan',
        'alamat_sekarang', 'alamat_sebelumnya', 'ayah_nik', 'ibu_nik', 'nama_ayah', 'nama_ibu',
        'hubungan_warga', 'no_kk_sebelumnya', 'golongan_darah', 'suku', 'ktp_el', 'status_rekam',
        'tempat_cetak_ktp', 'tanggal_cetak_ktp', 'note',
    ];
    
    


    
}

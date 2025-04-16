<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwebPenduduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'config_id', 'nama', 'nik', 'id_kk', 'kk_level', 'id_rtm', 'rtm_level',
        'sex', 'tempatlahir', 'tanggallahir', 'agama_id', 'pendidikan_kk_id',
        'pendidikan_sedang_id', 'pekerjaan_id', 'status_kawin', 'warganegara_id',
        'dokumen_pasport', 'dokumen_kitas', 'ayah_nik', 'ibu_nik', 'nama_ayah',
        'nama_ibu', 'foto', 'golongan_darah_id', 'id_cluster', 'status',
        'alamat_sebelumnya', 'alamat_sekarang', 'status_dasar', 'hamil',
        'cacat_id', 'sakit_menahun_id', 'akta_lahir', 'akta_perkawinan',
        'tanggalperkawinan', 'akta_perceraian', 'tanggalperceraian', 'cara_kb_id',
        'telepon', 'tanggal_akhir_paspor', 'no_kk_sebelumnya', 'ktp_el',
        'status_rekam', 'waktu_lahir', 'tempat_dilahirkan', 'jenis_kelahiran',
        'kelahiran_anak_ke', 'penolong_kelahiran', 'berat_lahir', 'panjang_lahir',
        'tag_id_card', 'id_asuransi', 'no_asuransi', 'email', 'email_token',
        'email_tgl_kadaluarsa', 'email_tgl_verifikasi', 'telegram',
        'telegram_token', 'telegram_tgl_kadaluarsa', 'telegram_tgl_verifikasi',
        'bahasa_id', 'ket', 'negara_asal', 'tempat_cetak_ktp', 'tanggal_cetak_ktp',
        'suku', 'bpjs_ketenagakerjaan', 'hubung_warga'
    ];


    
}

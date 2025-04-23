<?php

namespace App\Http\Requests\Common;

use App\Enums\Suku;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdatePendudukRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $pendudukId = $this->input('penduduk');
        return [
            'nik' => [
                'required',
                'string',
                'max:16',
                'unique:tweb_penduduks,nik,' . $pendudukId, 
            ],
            'no_kk_sebelumnya' => [
                'nullable',
                'string',
                'max:20',
                'unique:tweb_penduduks,no_kk_sebelumnya,' . $pendudukId,
            ],
            'nama' => 'required|string|max:100',
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:tweb_penduduks,email,' . $pendudukId,
            ],
            'jenis_kelamin' => ['required', new Enum(\App\Enums\JenisKelamin::class)], 
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'required|date',
            'agama' => ['required', new Enum(\App\Enums\Agama::class)], 
            'status_kawin' => ['required', new Enum(\App\Enums\StatusKawin::class)], 
            'warga_negara' => 'required|string|max:50',
            'pendidikan_terakhir' => ['required', new Enum(\App\Enums\Pendidikan::class)], 
            'pekerjaan' => 'required|string|max:255',
            'alamat_sekarang' => 'required|string|max:255',
            'alamat_sebelumnya' => 'nullable|string|max:255',
            'ayah_nik' => [
                'nullable',
                'string',
                'max:16',
                'unique:tweb_penduduks,ayah_nik,' . $pendudukId,
            ],
            'ibu_nik' => [
                'nullable',
                'string',
                'max:16',
                'unique:tweb_penduduks,ibu_nik,' . $pendudukId,
            ],
            'nama_ayah' => 'nullable|string|max:100',
            'nama_ibu' => 'nullable|string|max:100',
            'hubungan_warga' => ['required', new Enum(\App\Enums\HubunganWarga::class)], 
            'golongan_darah' => ['required', new Enum(\App\Enums\GolonganDarah::class)], 
            'suku' => ['required', 'string', 'max:50', new Enum(Suku::class)],
            'ktp_el' => 'required|boolean',
            'status_rekam' => ['required', new Enum(\App\Enums\StatusRekam::class)], 
            'tempat_cetak_ktp' => 'nullable|string|max:100',
            'tanggal_cetak_ktp' => 'nullable|date',
            'status_keadaan' => ['required', new Enum(\App\Enums\StatusKeadaan::class)], 
            'note' => 'nullable|string',
        ];
    }
}
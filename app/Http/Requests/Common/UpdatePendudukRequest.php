<?php

namespace App\Http\Requests\Common;

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
        $pendudukId = $this->input('id');
        return [
            'nik' => [
                'required',
                'string',
                'max:16',
                'unique:tweb_penduduks,nik,' . $pendudukId, // Abaikan NIK dari record yang sedang di-update
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
            'jenis_kelamin' => ['required', new Enum(\App\Enums\JenisKelamin::class)], // Asumsi Anda punya Enum
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'required|date',
            'agama' => ['required', new Enum(\App\Enums\Agama::class)], // Asumsi Anda punya Enum
            'status_kawin' => ['required', new Enum(\App\Enums\StatusKawin::class)], // Asumsi Anda punya Enum
            'warga_negara' => 'required|string|max:50',
            'pendidikan_terakhir' => ['required', new Enum(\App\Enums\Pendidikan::class)], // Asumsi Anda punya Enum
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
            'hubungan_warga' => ['required', new Enum(\App\Enums\HubunganWarga::class)], // Asumsi Anda punya Enum
            'golongan_darah' => ['required', new Enum(\App\Enums\GolonganDarah::class)], // Asumsi Anda punya Enum
            'suku' => 'required|string|max:50',
            'ktp_el' => 'required|boolean',
            'status_rekam' => ['required', new Enum(\App\Enums\StatusRekam::class)], // Asumsi Anda punya Enum
            'tempat_cetak_ktp' => 'nullable|string|max:100',
            'tanggal_cetak_ktp' => 'nullable|date',
            'status_keadaan' => ['required', new Enum(\App\Enums\StatusKeadaan::class)], // Asumsi Anda punya Enum
            'note' => 'nullable|string',
        ];
    }
}
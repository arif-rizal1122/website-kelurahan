<?php

namespace App\Http\Requests\Common;

use App\Enums\Agama;
use App\Enums\GolonganDarah;
use App\Enums\HubunganWarga;
use App\Enums\JenisKelamin;
use App\Enums\Pendidikan;
use App\Enums\StatusKeadaan;
use App\Enums\StatusKawin;
use App\Enums\StatusRekam;
use App\Enums\Suku;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StorePendudukRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:100',
            'nik' => 'required|string|max:16|unique:tweb_penduduks,nik',
            'email' => 'required|email|unique:tweb_penduduks,email',
            'jenis_kelamin' => ['required', new Enum(JenisKelamin::class)],
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:100',
            'agama' => ['required', new Enum(Agama::class)],
            'status_kawin' => ['required', new Enum(StatusKawin::class)],
            'warga_negara' => 'required|string|max:50',

            'pendidikan_terakhir' => ['required', new Enum(Pendidikan::class)],
            'pekerjaan' => 'required|string|max:100',

            'alamat_sekarang' => 'required|string|max:200',
            'alamat_sebelumnya' => 'nullable|string|max:200',

            'ayah_nik' => 'nullable|string|max:16',
            'ibu_nik' => 'nullable|string|max:16',
            'nama_ayah' => 'required|string|max:100',
            'nama_ibu' => 'required|string|max:100',

            'hubungan_warga' => ['required', new Enum(HubunganWarga::class)],
            'no_kk_sebelumnya' => 'nullable|string|max:30',

            'golongan_darah' => ['required', new Enum(GolonganDarah::class)],
            'suku' => ['required', 'string', 'max:50', new Enum(Suku::class)],

            'ktp_el' => 'boolean|required',
            'status_rekam' => ['required', new Enum(StatusRekam::class)],
            'tempat_cetak_ktp' => 'nullable|string|max:100',
            'tanggal_cetak_ktp' => 'nullable|date',
            'status_keadaan' => ['required', new Enum(StatusKeadaan::class)],
            'note' => 'nullable|string',
        ];
    }
}
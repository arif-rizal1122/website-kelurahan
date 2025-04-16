<?php

namespace App\Http\Requests\Common;

use Illuminate\Foundation\Http\FormRequest;

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
            'nik' => 'nullable|string|max:16|unique:tweb_penduduks,nik',
            'sex' => 'nullable|in:1,2',
            'tanggallahir' => 'nullable|date',
            'alamat_sekarang' => 'nullable|string|max:200',
            'email' => 'nullable|email|max:100|unique:tweb_penduduks,email',
            // tambahkan field lain sesuai kebutuhan
        ];
    }


}

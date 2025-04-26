<?php

namespace App\Http\Requests\PengajuanSurat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; // Pastikan baris ini ada

class UpdateJenisSuratRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Atau logika otorisasi Anda
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
        public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:255', Rule::unique('jenis_surats', 'nama')->ignore($this->route('jenisSurat'))],
            'deskripsi' => 'nullable|string',
        ];
    }
}
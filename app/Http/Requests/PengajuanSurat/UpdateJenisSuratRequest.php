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
        return true; 
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
            'code' => ['required', 'string', 'max:25', Rule::unique('jenis_surats', 'code')->ignore($this->route('jenisSurat'))],
            'template_surat' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ];
    }
}
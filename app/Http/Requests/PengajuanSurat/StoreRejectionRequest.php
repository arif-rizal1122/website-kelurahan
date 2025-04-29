<?php

namespace App\Http\Requests\PengajuanSurat;

use Illuminate\Foundation\Http\FormRequest;

class StoreRejectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Sesuaikan dengan logika otorisasi Anda
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'keterangan_penolakan' => 'required|string|max:255',
        ];
    }
}
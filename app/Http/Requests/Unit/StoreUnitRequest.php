<?php

namespace App\Http\Requests\Unit;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnitRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:100', 'unique:units,nama'],
            'kode' => ['nullable', 'string', 'max:20', 'unique:units,kode'],
            'deskripsi' => ['nullable', 'string'],
            'kepala_unit_id' => ['required', 'exists:users,id'], // Validasi keberadaan kepala unit di tabel users
        ];
    }
}

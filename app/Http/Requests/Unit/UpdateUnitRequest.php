<?php

namespace App\Http\Requests\Unit;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUnitRequest extends FormRequest
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
            'nama' => ['required', 'string', 'max:100', Rule::unique('units')->ignore($this->route('unit'))],
            'kode' => ['nullable', 'string', 'max:20', Rule::unique('units')->ignore($this->route('unit'))],
            'deskripsi' => ['nullable', 'string'],
            'kepala_unit_id' => ['nullable', 'exists:users,id'], // Validasi keberadaan kepala unit di tabel users
        ];
    }
}


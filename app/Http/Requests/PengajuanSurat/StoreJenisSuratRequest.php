<?php

namespace App\Http\Requests\PengajuanSurat;

use Illuminate\Foundation\Http\FormRequest;

class StoreJenisSuratRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
     {
         return true; // You might want to implement authorization logic here
     }

     /**
      * Get the validation rules that apply to the request.
      *
      * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
      */
     public function rules(): array
     {
         return [
             'nama' => ['required', 'string', 'max:255', 'unique:jenis_surats,nama'],
             'code' => ['required', 'string', 'max:25', 'unique:jenis_surats,code'],
             'template_surat' => 'nullable|string',
             'deskripsi' => 'nullable|string',
         ];
     }
}

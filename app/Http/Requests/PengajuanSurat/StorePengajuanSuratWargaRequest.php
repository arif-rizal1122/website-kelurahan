<?php

namespace App\Http\Requests\PengajuanSurat;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class StorePengajuanSuratWargaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
        public function authorize(): bool
    {
        return Auth::guard('warga')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'jenis_surat_id' => 'required|exists:jenis_surats,id',
            'tanggal_pengajuan' => 'nullable|date',
            'keperluan' => 'required|string', 
            
            'file_pendukung' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ];
    }
    
}

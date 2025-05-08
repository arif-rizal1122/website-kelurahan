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
            'tanggal_pengajuan' => 'nullable|date_format:d-m-Y H:i',
            'file_pendukung' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
            'apa' => 'required|string|max:150',
            'mengapa' => 'required|string|max:150',
            'kapan' => 'required|string|max:150',
            'di_mana' => 'required|string|max:150',
            'siapa' => 'required|string|max:150',
            'bagaimana' => 'required|string|max:150',
        ];
    }
    
}

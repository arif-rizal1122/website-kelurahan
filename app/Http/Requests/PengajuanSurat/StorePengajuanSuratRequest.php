<?php

namespace App\Http\Requests\PengajuanSurat;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StorePengajuanSuratRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Or base authorization logic on your needs
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'warga_id' => 'required|exists:wargas,id',
            'jenis_surat_id' => 'required|exists:jenis_surats,id',
            'tanggal_pengajuan' => 'nullable|date', 
            'keperluan' => 'nullable|string',
            'status' => ['required', new Enum(Status::class)],
            'tanggal_diproses' => 'nullable|date',
            'user_id' => 'nullable|exists:users,id', 
            'tanggal_selesai' => 'nullable|date',
            'keterangan_penolakan' => 'nullable|string',
            'file_pendukung' => 'nullable|file|mimes:pdf,doc,docx|max:2048', 
        ];
    }
}

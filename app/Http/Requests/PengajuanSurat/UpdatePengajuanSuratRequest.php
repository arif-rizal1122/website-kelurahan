<?php

namespace App\Http\Requests\PengajuanSurat;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdatePengajuanSuratRequest extends FormRequest
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
            'warga_id' => 'sometimes|required|exists:wargas,id',
            'jenis_surat_id' => 'sometimes|required|exists:jenis_surats,id',
            'tanggal_pengajuan' => 'nullable|date',
            'keperluan' => 'nullable|string',
            'status' => ['sometimes', 'required', new Enum(Status::class)],
            'tanggal_diproses' => 'nullable|date',
            'user_id' => 'nullable|exists:users,id',  
            'tanggal_selesai' => 'nullable|date',
            'keterangan_penolakan' => 'nullable|string',
            'file_pendukung' => 'nullable|file|mimes:pdf,doc,docx,jpg,png,jpeg|max:2048',
            'apa' => 'nullable|string|max:250',
            'mengapa' => 'nullable|string|max:250',
            'kapan' => 'nullable|string|max:250',
            'di_mana' => 'nullable|string|max:250',
            'siapa' => 'nullable|string|max:250',
            'bagaimana' => 'nullable|string|max:250',
        ];
    }
}

<?php

namespace App\Http\Requests\Surat;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSuratKeluarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nomor_surat' => 'sometimes|required|string|max:35',
            'dari' => 'sometimes|required|string',
            'tujuan' => 'sometimes|required|string',
            'tanggal_surat' => 'sometimes|required|date',
            'tanggal_pengiriman' => 'sometimes|required|date',
            'catatan' => 'nullable|string',
            'isi_surat' => 'sometimes|required|string',
            'removed_attachments' => 'nullable|array', 
            'attachments' => 'nullable|array',
            'attachments.*' => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
        ];
    }

}
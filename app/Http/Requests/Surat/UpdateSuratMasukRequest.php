<?php

namespace App\Http\Requests\Surat;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSuratMasukRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nomor_surat' => 'nullable|string|max:35',
            'dari' => 'nullable|string',
            'tujuan' => 'nullable|string',
            'tanggal_surat' => 'nullable|date',
            'tanggal_pengiriman' => 'nullable|date',
            'tanggal_diterima' => 'nullable|date',
            'isi_surat' => 'nullable|string',
            'catatan' => 'nullable|string',
            'ringkasan' => 'nullable|string',
            'attachments.*' => 'nullable|file|mimes:pdf|max:2048', 
            'attachments' => 'nullable|array', 
        ];
    }
}
<?php

namespace App\Http\Requests\Surat;

use App\Enums\Surat;
use Illuminate\Foundation\Http\FormRequest;

class StoreSuratKeluarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nomor_surat' => 'required|string|max:35',
            'dari' => 'required|string',
            'tujuan' => 'required|string',
            'tanggal_surat' => 'required|date',
            'tanggal_pengiriman' => 'required|date',
            'catatan' => 'required|string',
            'isi_surat' => 'required|string',
            'attachments' => 'nullable|array', 
            'attachments.*' => ['nullable', 'file', 'mimes:pdf', 'max:2048'], 
        ];
    }
}
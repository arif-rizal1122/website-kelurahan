<?php

namespace App\Http\Requests\Surat;

use App\Enums\Surat;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSuratMasukRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nomor_surat' => 'required|string|max:35',
            'dari' => ['required_if:surat,' . Surat::MASUK->value],
            'tujuan' => 'required|string',
            'tanggal_surat' => 'required|date',
            'tanggal_diterima' => ['required_if:tipe_surat,' . Surat::MASUK->value],
            'catatan' => 'nullable|string',
            'ringkasan' => 'required|string',
            'attachments.*' => 'required|file|mimes:pdf|max:2048',
        ];
    }
}
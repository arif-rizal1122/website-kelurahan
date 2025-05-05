<?php

namespace App\Http\Controllers;

use App\Mail\PasswordChanged;
use App\Models\Config;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\StreamedResponse;
use League\Csv\Writer;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

class ConfigController extends Controller
{
    public function index()
    {
        $config = Config::first();
        $users = User::all();
        return view('pages-profile-settings', compact('config', 'users'));
    }

        public function update(Request $request)
    {
        $config = Config::first();
        $request->validate([
            'nama_desa' => 'required|string|max:100',
            'kode_desa' => [
                'nullable',
                'string',
                'max:10',
                Rule::unique('configs', 'kode_desa')->ignore($config?->id),
            ],
            'kode_pos' => 'nullable|integer',
            'nama_kecamatan' => 'required|string|max:100',
            'kode_kecamatan' => 'nullable|string',
            'nama_kepala_camat' => 'required|string|max:100',
            'nip_kepala_camat' => 'required|string|max:100',
            'nama_kabupaten' => 'required|string|max:100',
            'kode_kabupaten' => 'nullable|string',
            'nama_propinsi' => 'required|string|max:100',
            'kode_propinsi' => 'nullable|string',
            'path' => 'nullable|string',
            'alamat_kantor' => 'nullable|string|max:200',
            'email_desa' => 'nullable|string|max:50|email',
            'telepon' => 'nullable|string|max:50',
            'nomor_operator' => 'nullable|string|max:20',
        ]);
        $data = $request->except(['_token', '_method']);
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('config', 'public');
        }
        if (empty($data['app_key'])) {
            $data['app_key'] = Str::random(32);
        }
        if ($config) {
            $config->update($data);
            session()->flash('success', 'Konfigurasi berhasil diperbarui!');
        } else {
            Config::create($data);
            session()->flash('success', 'Konfigurasi berhasil disimpan!');
        }
        return redirect()->route('config.index');
    }


    public function download()
    {
        try {
            $user = Auth::user();

            $phpWord = new PhpWord();
            $section = $phpWord->addSection();

            // Tambahkan teks dengan gaya
            $phpWord->addFontStyle('headerStyle', ['bold' => true, 'size' => 16]);
            $section->addText('Data Profil Pengguna', 'headerStyle');

            $phpWord->addFontStyle('labelStyle', ['bold' => true]);

            $section->addText('Nama Lengkap:', 'labelStyle');
            $section->addText($user->name);

            $section->addText('Email:', 'labelStyle');
            $section->addText($user->email);

            $section->addText('Jabatan:', 'labelStyle');
            $section->addText($user->jabatan);

            $section->addText('Role:', 'labelStyle');
            $section->addText($user->role);

            $section->addText('NIP:', 'labelStyle');
            $section->addText($user->nip);

            $filename = 'profil_' . Str::slug($user->name) . '.docx';

            $writer = new Word2007($phpWord);

            $response = new StreamedResponse(
                function () use ($writer) {
                    $writer->save('php://output');
                },
                200,
                [
                    'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'Content-Disposition' => 'attachment;filename="' . $filename . '"',
                    'Cache-Control' => 'max-age=0',
                ]
            );

            return $response;
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengunduh profil: ' . $e->getMessage());
        }
    }
}
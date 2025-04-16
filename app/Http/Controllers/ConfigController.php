<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
        // Handle logo upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = Str::slug($request->nama_desa) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/config', $filename);
            $data['logo'] = $filename;
        }
        // Generate app_key if not exists
        if (empty($data['app_key'])) {
            $data['app_key'] = Str::random(32);
        }
        // Ambil config pertama dan update
        $config = Config::first();
        // dd($request->all());
        if ($config) {
            $config->update($data);
        } else {
            $config = Config::create($data);
        }
        return redirect()->route('config.index')->with('success', 'Konfigurasi berhasil disimpan');
    }





    
}
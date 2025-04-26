<?php

namespace App\Http\Controllers\Pengajuan;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSurat;
use App\Http\Requests\PengajuanSurat\StorePengajuanSuratRequest;
use App\Http\Requests\PengajuanSurat\UpdatePengajuanSuratRequest;
use App\Models\Warga;
use App\Models\JenisSurat;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;

class PengajuanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuanSurats = PengajuanSurat::with('warga', 'jenisSurat', 'user')->get();
        return view('pengajuan.pengajuanSurat.index', compact('pengajuanSurats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  Fetch necessary data (warga, jenis_surat, petugas) to populate dropdowns in the form
        $wargas = \App\Models\Warga::all();
        $jenisSurats = \App\Models\JenisSurat::all();
        $users = \App\Models\User::all();
        return view('pengajuan.pengajuanSurat.create', compact('wargas', 'jenisSurats', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengajuanSuratRequest $request)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('file_pendukung')) {
                $data['file_pendukung'] = $request->file('file_pendukung')->store('surat_pendukung', 'public');
            }

            PengajuanSurat::create($data);

            session()->flash('success', 'Pengajuan surat berhasil dibuat.');
            return redirect()->route('pengajuan-surat.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat membuat pengajuan surat: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PengajuanSurat $pengajuanSurat)
    {
        return view('pengajuan.pengajuanSurat.show', compact('pengajuanSurat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengajuanSurat $pengajuanSurat)
    {
        $wargas = \App\Models\Warga::all();
        $jenisSurats = \App\Models\JenisSurat::all();
        $users = \App\Models\User::all();
        return view('pengajuan.pengajuanSurat.edit', compact('pengajuanSurat', 'wargas', 'jenisSurats', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengajuanSuratRequest $request, PengajuanSurat $pengajuanSurat)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('file_pendukung')) {
                // Delete the old file if it exists
                if ($pengajuanSurat->file_pendukung) {
                    Storage::disk('public')->delete($pengajuanSurat->file_pendukung);
                }
                $data['file_pendukung'] = $request->file('file_pendukung')->store('surat_pendukung', 'public');
            }

            $pengajuanSurat->update($data);

            session()->flash('success', 'Pengajuan surat berhasil diperbarui.');
            return redirect()->route('pengajuan-surat.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat memperbarui pengajuan surat: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengajuanSurat $pengajuanSurat)
    {
        try {
            // Delete the file if it exists
            if ($pengajuanSurat->file_pendukung) {
                Storage::disk('public')->delete($pengajuanSurat->file_pendukung);
            }

            $pengajuanSurat->delete();

            session()->flash('success', 'Pengajuan surat berhasil dihapus.');
            return redirect()->route('pengajuan-surat.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat menghapus pengajuan surat: ' . $e->getMessage());
            return back();
        }
    }
}

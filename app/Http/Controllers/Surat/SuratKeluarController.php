<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Surat\StoreSuratKeluarRequest;
use App\Http\Requests\Surat\UpdateSuratKeluarRequest;
use App\Models\Config;
use App\Models\Surat;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $surats = Surat::keluar()->with('config')->latest()->get();
        return view('surat.keluar.index', compact('surats'));
    }

    public function create()
    {
        $configs = Config::all();
        return view('surat.keluar.create', compact('configs'));
    }

    public function store(StoreSuratKeluarRequest $request)
    {
        Surat::create($request->validated() + ['surat' => 'keluar']);
        return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar berhasil ditambahkan.');
    }

    public function show(Surat $surat)
    {
        return view('surat.keluar.show', compact('surat'));
    }

    public function edit(Surat $surat)
    {
        $configs = Config::all();
        return view('surat.keluar.edit', compact('surat', 'configs'));
    }

    public function update(UpdateSuratKeluarRequest $request, Surat $surat)
    {
        $surat->update($request->validated());
        return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar berhasil diperbarui.');
    }

    public function destroy(Surat $surat)
    {
        $surat->delete();
        return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar berhasil dihapus.');
    }
}

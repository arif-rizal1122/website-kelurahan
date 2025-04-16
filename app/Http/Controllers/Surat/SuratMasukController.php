<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Surat\StoreSuratMasukRequest;
use App\Http\Requests\Surat\UpdateSuratMasukRequest;
use App\Models\Config;
use App\Models\Surat;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index()
    {
        $surats = Surat::masuk()->with('config')->latest()->get();
        return view('surats.masuk.index', compact('surats'));
    }

    public function create()
    {
        $configs = Config::all();
        return view('surats.masuk.create', compact('configs'));
    }

    public function store(StoreSuratMasukRequest $request)
    {
        Surat::create($request->validated() + ['surat' => 'masuk']);
        return redirect()->route('surat-masuk.index')->with('success', 'Surat Masuk berhasil ditambahkan.');
    }

    public function show(Surat $surat)
    {
        return view('surats.masuk.show', compact('surat'));
    }

    public function edit(Surat $surat)
    {
        $configs = Config::all();
        return view('surats.masuk.edit', compact('surat', 'configs'));
    }

    public function update(UpdateSuratMasukRequest $request, Surat $surat)
    {
        $surat->update($request->validated());
        return redirect()->route('surat-masuk.index')->with('success', 'Surat Masuk berhasil diperbarui.');
    }

    public function destroy(Surat $surat)
    {
        $surat->delete();
        return redirect()->route('surat-masuk.index')->with('success', 'Surat Masuk berhasil dihapus.');
    }
}


<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\TwebPenduduk;
use Illuminate\Http\Request;
use App\Http\Requests\Common\StorePendudukRequest;
use App\Http\Requests\Common\UpdatePendudukRequest;

class PendudukController extends Controller
{
    public function index()
    {
        $penduduks = TwebPenduduk::all();

        return view('penduduk.index', compact('penduduks'));
    }
    
    public function create()
    {
        return view('penduduk.create');
    }

    public function store(StorePendudukRequest $request)
    {
       
        TwebPenduduk::create($request->validated());
        return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil ditambahkan.');
    }
    
    
    public function edit(TwebPenduduk $penduduk)
    {
        return view('penduduk.edit', compact('penduduk'));
    }

    public function update(UpdatePendudukRequest $request, TwebPenduduk $penduduk)
    {
        $penduduk->update($request->validated());
        return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil diperbarui.');
    }

    public function destroy(TwebPenduduk $penduduk)
    {
        $penduduk->delete();
        return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil dihapus.');
    }


}

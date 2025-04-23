<?php

namespace App\Http\Controllers\Common;

use App\Enums\Suku;
use App\Http\Controllers\Controller;
use App\Models\TwebPenduduk;
use App\Http\Requests\Common\StorePendudukRequest;
use App\Http\Requests\Common\UpdatePendudukRequest;
use Illuminate\Contracts\View\View;


class PendudukController extends Controller
{
    public function index()
    {
        $suku = Suku::cases();
        $penduduks = TwebPenduduk::all();
        return view('penduduk.index', compact('penduduks', 'suku'));
    }



    public function create()
    {
        return view('penduduk.create');
    }

    public function store(StorePendudukRequest $request)
    {
        try {
            TwebPenduduk::create($request->validated());
            return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('penduduk.index')->with('error', 'Gagal menambahkan data penduduk: ' . $e->getMessage());
        }
    }


    public function edit(TwebPenduduk $penduduk)
    {
        return view('penduduk.edit', compact('penduduk'));
    }


    public function update(UpdatePendudukRequest $request, TwebPenduduk $penduduk)
    {
        try {
            $validatedData = $request->validated();
            $updated = $penduduk->update($validatedData);

            if ($updated) {
                return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil diperbarui.');
            } else {
                return redirect()->route('penduduk.index')->with('error', 'Gagal memperbarui data penduduk.');
            }
        } catch (\Exception $e) {
            return redirect()->route('penduduk.index')->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }


    public function destroy(TwebPenduduk $penduduk) // Type hint sudah benar
    {
        try {
            $penduduk->delete();
            return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('penduduk.index')->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }

    public function show(TwebPenduduk $penduduk): View
    {
        return view('penduduk.show', compact('penduduk'));
    }
}
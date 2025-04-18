<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\TwebPenduduk;
use Illuminate\Http\Request;
use App\Http\Requests\Common\StorePendudukRequest;
use App\Http\Requests\Common\UpdatePendudukRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;


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


    public function update(UpdatePendudukRequest $request, $id)
    {
        // Cari penduduk berdasarkan ID
        $penduduk = TwebPenduduk::findOrFail($id);
        
        try {
            $validatedData = $request->validated();
            
            // Update data penduduk
            $updated = $penduduk->update($validatedData);
            
            if ($updated) {
                return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil diperbarui.');
            } else {
                return redirect()->route('penduduk.index')->with('error', 'Gagal memperbarui data penduduk.');
            }
        } catch (\Exception $e) {
            return redirect()->route('penduduk.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }



    public function destroy(TwebPenduduk $penduduk, $id) // Pastikan type hint benar
    {
        try {
            $penduduk = TwebPenduduk::findOrFail($id);
            $penduduk->delete();
            return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil dihapus.');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Untuk debugging, tampilkan pesan error
            // Atau log error: \Log::error('Gagal menghapus penduduk dengan ID ' . $penduduk->id . ': ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menghapus data.']);
        }
    }



}

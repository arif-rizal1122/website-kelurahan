<?php

namespace App\Http\Controllers\Pengajuan;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use App\Http\Requests\PengajuanSurat\StoreJenisSuratRequest;
use App\Http\Requests\PengajuanSurat\UpdateJenisSuratRequest;
use Illuminate\Http\Request;
use Exception;

class JenisSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisSurats = JenisSurat::all();
        return view('pengajuan.jenisSurat.index', compact('jenisSurats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengajuan.jenisSurat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJenisSuratRequest $request)
    {
        try {
            $data = $request->validated();
            $data['template_surat'] = strip_tags($data['template_surat']);
    
            JenisSurat::create($data);
    
            return redirect()->route('jenis-surat.index')->with('success', 'Jenis Surat created successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to create Jenis Surat.')->withInput();
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(JenisSurat $jenisSurat)
    {
        return view('pengajuan.jenisSurat.show', compact('jenisSurat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisSurat $jenisSurat)
    {
        return view('pengajuan.jenisSurat.edit', compact('jenisSurat'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(UpdateJenisSuratRequest $request, JenisSurat $jenisSurat)
    {
        try {
            $data = $request->validated();
            // Hapus tag HTML dari template_surat jika ada
            if (!empty($data['template_surat'])) {
                $data['template_surat'] = strip_tags($data['template_surat']);
            }
            $jenisSurat->update($data);
            return redirect()->route('jenis-surat.index')->with('success', 'Jenis Surat updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to update Jenis Surat.')->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisSurat $jenisSurat)
    {
        try {
            $jenisSurat->delete();
            return redirect()->route('jenis-surat.index')->with('success', 'Jenis Surat deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('jenis-surat.index')->with('error', 'Failed to delete Jenis Surat.');
        }
    }
}
<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Surat\StoreSuratKeluarRequest;
use App\Http\Requests\Surat\UpdateSuratKeluarRequest;
use App\Models\Attachment;
use App\Models\Surat;
use Illuminate\Support\Facades\Storage;

/**
 * Controller untuk mengelola data Surat Keluar.
 * Menyediakan fungsi untuk menampilkan, menambah, melihat detail,
 * mengedit, menghapus surat keluar beserta lampirannya.
 */
class SuratKeluarController extends Controller
{
    /**
     * Menampilkan daftar Surat Keluar.
     * Hanya menampilkan surat dengan tipe 'Keluar'.
     */
    public function index()
    {
        $surats = Surat::where('tipe_surat', 'Keluar')->get();
        return view('surat.keluar.index', compact('surats'));
    }

    /**
     * Menampilkan form untuk membuat Surat Keluar baru.
     */
    public function create()
    {
        return view('surat.keluar.create');
    }

    /**
     * Menyimpan data Surat Keluar baru ke database.
     * Menerima data yang telah divalidasi dari StoreSuratKeluarRequest.
     * Juga menangani penyimpanan file lampiran jika ada.
     */
    public function store(StoreSuratKeluarRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $suratData = $validatedData + ['tipe_surat' => 'Keluar'];

            $surat = Surat::create($suratData);

            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $path = $file->store('attachments', 'public');

                    $surat->attachments()->create([
                        'path' => $path,
                        'filename' => $file->getClientOriginalName(),
                        'extension' => $file->getClientOriginalExtension(),
                    ]);
                }
            }

            return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar berhasil ditambahkan beserta lampirannya.');
        } catch (\Exception $e) {
            return redirect()->route('surat-keluar.index')->with('error', 'Gagal menambahkan Surat Keluar: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan detail spesifik dari satu Surat Keluar.
     * Memuat juga relasi 'attachments' untuk menampilkan lampiran terkait.
     */
    public function show(Surat $surat)
    {
        $surat->load('attachments'); // Eager load relasi attachments
        return view('surat.keluar.show', compact('surat'));
    }

    /**
     * Menampilkan form untuk mengedit data Surat Keluar.
     * Memuat data surat dan lampiran terkait.
     * Hanya menampilkan data surat yang memiliki tipe 'Keluar'.
     */
    public function edit(Surat $surat)
    {
        if ($surat->tipe_surat !== 'Keluar') {
            abort(404); // Surat tidak ditemukan jika bukan tipe 'Keluar'
        }

        $attachments = $surat->attachments; // Ambil semua lampiran terkait
        return view('surat.keluar.edit', compact('surat', 'attachments'));
    }

    /**
     * Mengupdate data Surat Keluar di database.
     * Menerima data yang telah divalidasi dari UpdateSuratKeluarRequest.
     * Menangani penghapusan lampiran yang dipilih dan penambahan lampiran baru.
     */
    public function update(UpdateSuratKeluarRequest $request, Surat $surat)
    {
        try {
            $validatedData = $request->validated();
            $surat->update($validatedData);

            // Hapus lampiran yang ditandai untuk dihapus
            if ($request->has('removed_attachments')) {
                foreach ($request->input('removed_attachments') as $attachmentId) {
                    $attachment = Attachment::find($attachmentId);
                    if ($attachment && $attachment->surat_id == $surat->id) {
                        Storage::disk('public')->delete($attachment->path);
                        $attachment->delete();
                    }
                }
            }

            // Tambah lampiran baru jika ada
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $path = $file->store('attachments', 'public');
                    $surat->attachments()->create([
                        'path' => $path,
                        'filename' => $file->getClientOriginalName(),
                        'extension' => $file->getClientOriginalExtension(),
                    ]);
                }
            }

            return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar berhasil diperbarui beserta lampirannya.');
        } catch (\Throwable $exception) {
            return redirect()->route('surat-keluar.index')->with('error', 'Gagal memperbarui Surat Keluar: ' . $exception->getMessage());
        }
    }

    /**
     * Menghapus data Surat Keluar dari database.
     * Juga menghapus semua file lampiran yang terkait dengan surat tersebut dari storage.
     */
    public function destroy(Surat $surat)
    {
        foreach ($surat->attachments as $attachment) {
            Storage::disk('public')->delete($attachment->path);
            $attachment->delete();
        }

        $surat->delete();
        return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar berhasil dihapus beserta lampirannya.');
    }

    /**
     * Menghapus satu file lampiran spesifik.
     * Menghapus file dari storage dan record dari database.
     */
    public function destroyAttachment(Attachment $attachment)
    {
        try {
            Storage::disk('public')->delete($attachment->path);
            $attachment->delete();
            return back()->with('success', 'Lampiran berhasil dihapus.');
        } catch (\Throwable $exception) {
            return back()->with('error', 'Gagal menghapus lampiran: ' . $exception->getMessage());
        }
    }
}
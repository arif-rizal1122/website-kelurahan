<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Surat\StoreSuratMasukRequest;
use App\Http\Requests\Surat\UpdateSuratMasukRequest;
use App\Models\Attachment;
use App\Models\Config;
use App\Models\Surat;
use Illuminate\Support\Facades\Storage;

/**
 * Controller untuk mengelola data Surat Masuk.
 * Menyediakan fungsi untuk menampilkan, menambah, melihat detail,
 * mengedit, menghapus surat masuk beserta lampirannya.
 */
class SuratMasukController extends Controller
{
    /**
     * Menampilkan daftar Surat Masuk.
     * Hanya menampilkan surat dengan tipe 'Masuk' dan memuat relasi 'config'.
     */
    public function index()
    {
        $surats = Surat::masuk()->get();
        return view('surat.masuk.index', compact('surats'));
    }
    
    /**
     * Menampilkan form untuk membuat Surat Masuk baru.
     * Memuat data konfigurasi yang mungkin diperlukan.
     */
    public function create()
    {
        return view('surat.masuk.create');
    }

    /**
     * Menyimpan data Surat Masuk baru ke database.
     * Menerima data yang telah divalidasi dari StoreSuratMasukRequest.
     * Juga menangani penyimpanan file lampiran jika ada.
     */
    public function store(StoreSuratMasukRequest $request)
    {
        $config = Config::first();
        $configId = $config ? $config->id : null;
        $validatedData = $request->validated();
        $suratData = $validatedData + [
            'tipe_surat' => 'Masuk',
            'config_id' => $configId,
        ];
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
        return redirect()->route('surat-masuk.index')->with('success', 'Surat Masuk berhasil ditambahkan beserta lampirannya.');
    }

    /**
     * Menampilkan detail spesifik dari satu Surat Masuk.
     * Memuat juga relasi 'attachments' untuk menampilkan lampiran terkait.
     */
    public function show(Surat $surat)
    {
        $surat->load('attachments'); // Eager load relasi attachments
        return view('surat.masuk.show', compact('surat'));
    }

    /**
     * Menampilkan form untuk mengedit data Surat Masuk.
     * Memuat data surat yang akan diedit, data konfigurasi, dan lampiran terkait.
     * Hanya menampilkan data surat yang memiliki tipe 'Masuk'.
     */
    public function edit(Surat $surat)
    {
        if ($surat->tipe_surat !== 'Masuk') {
            abort(404); // Atau redirect dengan pesan error jika surat bukan tipe 'Masuk'
        }
        $configs = Config::all();
        $attachments = $surat->attachments()->get(); // Ambil semua attachment terkait surat
        return view('surat.masuk.edit', compact('surat', 'configs', 'attachments'));
    }

    /**
     * Mengupdate data Surat Masuk ke database.
     * Menerima data yang telah divalidasi dari UpdateSuratMasukRequest.
     * Menangani penghapusan lampiran yang dipilih dan penambahan lampiran baru.
     */
    public function update(UpdateSuratMasukRequest $request, Surat $surat)
    {
        try {
            $validatedData = $request->validated();
            $surat->update($validatedData);
            // Proses penghapusan attachment yang dipilih
            if ($request->has('removed_attachments')) {
                $removedAttachments = $request->input('removed_attachments');
                if (is_array($removedAttachments)) {
                    foreach ($removedAttachments as $attachmentId) {
                        $attachment = Attachment::find($attachmentId);
                        if ($attachment && $attachment->surat_id == $surat->id) {
                            Storage::disk('public')->delete($attachment->path);
                            $attachment->delete();
                        }
                    }
                }
            }
            // Proses penambahan attachment baru
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
            return redirect()->route('surat-masuk.index')->with('success', 'Surat Masuk berhasil diperbarui beserta lampirannya.');
        } catch (\Throwable $exception) {
            return redirect()->route('surat-masuk.index')->with('error', 'Gagal memperbarui Surat Masuk: ' . $exception->getMessage());
        }
    }

    /**
     * Menghapus data Surat Masuk dari database.
     * Juga menghapus semua file lampiran yang terkait dengan surat tersebut dari storage.
     */
    public function destroy(Surat $surat)
    {
        // Hapus semua attachment terkait sebelum menghapus surat
        foreach ($surat->attachments as $attachment) {
            Storage::disk('public')->delete($attachment->path);
            $attachment->delete();
        }
        $surat->delete();
        return redirect()->route('surat-masuk.index')->with('success', 'Surat Masuk berhasil dihapus beserta lampirannya.');
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
<?php

namespace App\Http\Controllers\Pengajuan;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\PengajuanSurat\StoreRejectionRequest;
use App\Models\PengajuanSurat;
use App\Http\Requests\PengajuanSurat\UpdatePengajuanSuratRequest;
use App\Mail\PengajuanDiproses;
use App\Mail\PengajuanDitolak;
use App\Mail\PengajuanSelesai;
use App\Models\Config;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class PengajuanSuratController extends Controller
{

    public function index()
    {
        $pengajuanSurats = PengajuanSurat::with('warga', 'jenisSurat', 'user')->get();
        return view('pengajuan.pengajuanSurat.index', compact('pengajuanSurats'));
    }

   
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













 /**
     * Proses pengajuan surat (ubah status menjadi DIPROSES).
     */
    public function process(PengajuanSurat $pengajuanSurat): RedirectResponse
    {
        try {
            $this->authorizeStatusChange($pengajuanSurat, Status::DIAJUKAN);
    
            $pengajuanSurat->status = Status::DIPROSES;
            $pengajuanSurat->tanggal_diproses = now();
            $pengajuanSurat->user_id = auth()->id();
            $pengajuanSurat->save();
            $this->loadRelations($pengajuanSurat, ['warga', 'jenisSurat']);
            if (!$pengajuanSurat->warga || !$pengajuanSurat->warga->email) {
                session()->flash('warning', 'Pengajuan surat berhasil diproses, namun tidak ada alamat email warga untuk mengirim pemberitahuan.');
                return redirect()->route('pengajuan-surat.index');
            }
            $this->sendEmailPemberitahuan($pengajuanSurat, new PengajuanDiproses([
                'nama_warga' => $pengajuanSurat->warga->nama,
                'jenis_surat' => $pengajuanSurat->jenisSurat->nama,
                'nomor_pengajuan' => $pengajuanSurat->id,
                'tanggal_pengajuan' => $pengajuanSurat->tanggal_pengajuan->format('d-m-Y'),
            ]));
            session()->flash('success', 'Pengajuan surat berhasil diproses dan email pemberitahuan dikirim.');
            return redirect()->route('pengajuan-surat.index');
    
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
    }

    /**
     * Selesaikan pengajuan surat (ubah status menjadi SELESAI).
     */
        public function complete(PengajuanSurat $pengajuanSurat): RedirectResponse
    {
        try {
            $this->authorizeStatusChange($pengajuanSurat, Status::DIPROSES);

            $pengajuanSurat->status = Status::SELESAI;
            $pengajuanSurat->tanggal_selesai = now();
            $pengajuanSurat->save();

            $this->loadRelations($pengajuanSurat, ['warga', 'jenisSurat']);
            $this->sendEmailPemberitahuan($pengajuanSurat, new PengajuanSelesai([
                'nama_warga' => $pengajuanSurat->warga->nama,
                'jenis_surat' => $pengajuanSurat->jenisSurat->nama ?? 'Surat',
                'nomor_pengajuan' => $pengajuanSurat->id,
                'tanggal_pengajuan' => $pengajuanSurat->tanggal_pengajuan->format('d-m-Y'), 
            ]));

            session()->flash('success', 'Pengajuan surat berhasil diselesaikan dan pemberitahuan telah dikirim ke warga.');
            return redirect()->route('pengajuan-surat.index');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
    }

    /**
     * Tampilkan form untuk menolak pengajuan surat.
     */
    public function reject(PengajuanSurat $pengajuanSurat)
    {
        try {
            $this->authorizeStatusChange($pengajuanSurat, [Status::DIAJUKAN, Status::DIPROSES]);
            return view('pengajuan.pengajuanSurat.reject', compact('pengajuanSurat'));
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->route('pengajuan-surat.index');
        }
    }

    /**
     * Simpan penolakan dengan alasan.
     */
    public function storeRejection(StoreRejectionRequest $request, PengajuanSurat $pengajuanSurat): RedirectResponse
    {
        try {
            $this->authorizeStatusChange($pengajuanSurat, [Status::DIAJUKAN, Status::DIPROSES]);

            $pengajuanSurat->status = Status::DITOLAK;
            $pengajuanSurat->keterangan_penolakan = $request->validated('keterangan_penolakan');
            if (!$pengajuanSurat->user_id) {
                $pengajuanSurat->user_id = auth()->id();
            }
            $pengajuanSurat->save();

            $this->loadRelations($pengajuanSurat, ['warga', 'jenisSurat']);
            $this->sendEmailPemberitahuan($pengajuanSurat, new PengajuanDitolak([
                'nama_warga' => $pengajuanSurat->warga->nama,
                'jenis_surat' => $pengajuanSurat->jenisSurat->nama,
                'nomor_pengajuan' => $pengajuanSurat->id,
                'keterangan_penolakan' => $pengajuanSurat->keterangan_penolakan,
                'tanggal_pengajuan' => $pengajuanSurat->tanggal_pengajuan->format('d-m-Y'),
            ]));

            session()->flash('success', 'Pengajuan surat telah ditolak dan email pemberitahuan dikirim.');
            return redirect()->route('pengajuan-surat.index');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Helper function untuk memeriksa apakah status pengajuan saat ini sesuai dengan yang diharapkan.
     *
     * @param PengajuanSurat $pengajuanSurat
     * @param Status|array<Status> $expectedStatus
     * @return void
     * @throws \Exception Jika status tidak sesuai.
     */
    protected function authorizeStatusChange(PengajuanSurat $pengajuanSurat, $expectedStatus): void
    {
        $currentStatus = $pengajuanSurat->status;
        $expectedStatusArray = is_array($expectedStatus) ? $expectedStatus : [$expectedStatus];

        if (!in_array($currentStatus, $expectedStatusArray, true)) {
            $expectedStatusString = implode(', ', array_map(fn (Status $status) => $status->value, $expectedStatusArray));
            throw new \Exception("Pengajuan surat tidak dapat diproses karena status saat ini adalah {$currentStatus->value}. Diharapkan: {$expectedStatusString}.");
        }
    }

    /**
     * Helper function untuk memuat relasi model jika belum dimuat.
     *
     * @param PengajuanSurat $pengajuanSurat
     * @param array<string> $relations
     * @return void
     */
    protected function loadRelations(PengajuanSurat $pengajuanSurat, array $relations): void
    {
        foreach ($relations as $relation) {
            if (!$pengajuanSurat->relationLoaded($relation)) {
                $pengajuanSurat->load($relation);
            }
        }
    }

    /**
     * Helper function untuk mengirim email pemberitahuan.
     *
     * @param PengajuanSurat $pengajuanSurat
     * @param object $mailableInstance Instance dari class Mailable.
     * @return void
     */
    protected function sendEmailPemberitahuan(PengajuanSurat $pengajuanSurat, object $mailableInstance): void
    {
        if ($pengajuanSurat->warga && $pengajuanSurat->warga->email) {
            Mail::to($pengajuanSurat->warga->email)->send($mailableInstance);
        }
    }




/**
 * Print the completed letter in Word document format
 */
public function print(PengajuanSurat $pengajuanSurat)
{
    if ($pengajuanSurat->status != Status::SELESAI) {
        session()->flash('error', 'Surat tidak dapat dicetak karena status saat ini adalah ' . $pengajuanSurat->status);
        return back();
    }
    $pengajuanSurat->load(['warga', 'jenisSurat', 'user']);

    $config = Config::first();
    $currentUser = Auth::user();

    $phpWord = new \PhpOffice\PhpWord\PhpWord();

    $phpWord->setDefaultFontName('Times New Roman');
    $phpWord->setDefaultFontSize(12);

    $section = $phpWord->addSection();

    // Create header
    $header = $section->addHeader();

    // Logo
    if (file_exists(public_path('images/logo.png'))) {
        $header->addImage(
            public_path('images/logo.png'),
            ['width' => 80, 'height' => 80, 'alignment' => 'left']
        );
    }

    // Header text
    $header->addText('PEMERINTAH ' . strtoupper($config->nama_kabupaten ?? 'KABUPATEN'),
        ['bold' => true, 'size' => 14],
        ['alignment' => 'center']);
    $header->addText('KECAMATAN ' . strtoupper($config->nama_kecamatan ?? 'KECAMATAN'),
        ['bold' => true, 'size' => 14],
        ['alignment' => 'center']);
    $header->addText('DESA ' . strtoupper($config->nama_kelurahan ?? 'DESA'),
        ['bold' => true, 'size' => 16],
        ['alignment' => 'center']);
    $header->addText('Jl. Raya ' . ($config->nama_kelurahan ?? 'Desa') . ' Km ' .
        ($config->km_jalan ?? '10') . ' ' . ($config->nama_dusun ?? 'Kerandangan') .
        ' Kode Pos : ' . ($config->kode_pos ?? '83355'),
        ['size' => 11],
        ['alignment' => 'center']);

    // Add horizontal line
    $header->addLine(['weight' => 3, 'width' => 450, 'height' => 0]);

    // Add document title
    $section->addTextBreak(1);
    $section->addText(strtoupper($pengajuanSurat->jenisSurat->nama ?? 'SURAT'),
        ['bold' => true, 'size' => 14],
        ['alignment' => 'center']);
    $section->addText('Nomor: ' . $pengajuanSurat->id . '/' . now()->format('Y') . '/' .
        ($pengajuanSurat->jenisSurat->kode ?? 'XXX'),
        null,
        ['alignment' => 'center']);
    $section->addTextBreak(1);

    // First section - Official signing
    $section->addText('Yang bertanda tangan di bawah ini:');
    $section->addText('Nama', null, ['indentation' => ['left' => 0, 'firstLine' => 85], 'spaceAfter' => 0]);
    $section->addText(': ' . $currentUser->name, null, ['indentation' => ['left' => 3000], 'spaceAfter' => 0]);
    $section->addText('Jabatan', null, ['indentation' => ['left' => 0, 'firstLine' => 85], 'spaceAfter' => 0]);
    $section->addText(': ' . ($pengajuanSurat->user->jabatan ?? $currentUser->jabatan ?? 'Petugas Kelurahan'), null, ['indentation' => ['left' => 3000], 'spaceAfter' => 0]);
    $section->addText('Alamat', null, ['indentation' => ['left' => 0, 'firstLine' => 85], 'spaceAfter' => 0]);
    $section->addText(': ' . ($config->alamat_kantor ?? '-'), null, ['indentation' => ['left' => 3000], 'spaceAfter' => 0]);

    $section->addTextBreak(1);

    // Second section - Citizen info
    $section->addText('Dengan ini menerangkan bahwa:');
    $section->addText('Nama', null, ['indentation' => ['left' => 0, 'firstLine' => 85], 'spaceAfter' => 0]);
    $section->addText(': ' . ($pengajuanSurat->warga->nama ?? '-'), null, ['indentation' => ['left' => 3000], 'spaceAfter' => 0]);
    $section->addText('NIK', null, ['indentation' => ['left' => 0, 'firstLine' => 85], 'spaceAfter' => 0]);
    $section->addText(': ' . ($pengajuanSurat->warga->nik ?? '-'), null, ['indentation' => ['left' => 3000], 'spaceAfter' => 0]);
    $section->addText('Tempat/Tanggal Lahir', null, ['indentation' => ['left' => 0, 'firstLine' => 85], 'spaceAfter' => 0]);
    $section->addText(': ' . (($pengajuanSurat->warga->tempat_lahir ?? '-') . ', ' .
        ($pengajuanSurat->warga->tanggal_lahir ? date('d F Y', strtotime($pengajuanSurat->warga->tanggal_lahir)) : '-')),
        null, ['indentation' => ['left' => 3000], 'spaceAfter' => 0]);
    $section->addText('Jenis Kelamin', null, ['indentation' => ['left' => 0, 'firstLine' => 85], 'spaceAfter' => 0]);
    $section->addText(': ' . ($pengajuanSurat->warga->jenis_kelamin ?? '-'), null, ['indentation' => ['left' => 3000], 'spaceAfter' => 0]);
    $section->addText('Agama', null, ['indentation' => ['left' => 0, 'firstLine' => 85], 'spaceAfter' => 0]);
    $section->addText(': ' . ($pengajuanSurat->warga->agama ?? '-'), null, ['indentation' => ['left' => 3000], 'spaceAfter' => 0]);
    $section->addText('Alamat', null, ['indentation' => ['left' => 0, 'firstLine' => 85], 'spaceAfter' => 0]);
    $section->addText(': ' . ($pengajuanSurat->warga->alamat ?? '-'), null, ['indentation' => ['left' => 3000], 'spaceAfter' => 0]);

    // Additional info from template
    if ($pengajuanSurat->jenisSurat->has_template && $pengajuanSurat->jenisSurat->template_fields) {
        $templateFields = json_decode($pengajuanSurat->jenisSurat->template_fields, true);

        if (is_array($templateFields)) {
            foreach ($templateFields as $field => $label) {
                $section->addText($label, null, ['indentation' => ['left' => 0, 'firstLine' => 85], 'spaceAfter' => 0]);
                $section->addText(': ' . ($pengajuanSurat->data[$field] ?? '-'), null, ['indentation' => ['left' => 3000], 'spaceAfter' => 0]);
            }
        }
    }

    $section->addTextBreak(1);

    // Purpose and content section
    if (!empty($pengajuanSurat->keperluan)) {
        $section->addText($pengajuanSurat->keperluan);
        $section->addTextBreak(1);
    }

    // Template text or default
    $section->addText($pengajuanSurat->jenisSurat->template_surat ?? 'Demikian surat ini dibuat dengan sebenarnya dan untuk dipergunakan sebagaimana mestinya.');

    // Signature section
    $section->addTextBreak(1);
    $section->addText(($config->nama_kelurahan ?? 'Kelurahan') . ', ' . now()->format('d F Y'), null, ['alignment' => 'right']);
    $section->addText(($config->jabatan_penandatangan ?? 'Petugas') . ',', null, ['alignment' => 'right']);
    $section->addTextBreak(3);
    $section->addText($pengajuanSurat->user->name ?? $currentUser->name, ['bold' => true, 'underline' => true], ['alignment' => 'right']);

    // Add NIP if available
    if (!empty($pengajuanSurat->user->nip) || !empty($currentUser->nip)) {
        $section->addText('NIP. ' . ($pengajuanSurat->user->nip ?? $currentUser->nip), null, ['alignment' => 'right']);
    }

    // Save file
    $fileName = 'Surat_' . $pengajuanSurat->jenisSurat->kode . '_' . $pengajuanSurat->id . '.docx';
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

    // Save to temp file
    $tempFile = tempnam(sys_get_temp_dir(), 'word');
    $objWriter->save($tempFile);

    // Return file as download
    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
}


}
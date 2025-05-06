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
        $pengajuanSurats = PengajuanSurat::with('warga', 'jenisSurat', 'user')
            ->orderByRaw(
                "CASE status
                    WHEN '" . \App\Enums\Status::DIAJUKAN->value . "' THEN 1
                    WHEN '" . \App\Enums\Status::DIPROSES->value . "' THEN 2
                    WHEN '" . \App\Enums\Status::SELESAI->value . "' THEN 3
                    WHEN '" . \App\Enums\Status::DITOLAK->value . "' THEN 4
                    ELSE 5
                END"
            )
            ->get();
    
        return view('pengajuan.pengajuanSurat.index', compact('pengajuanSurats'));
    }

    /**
     * Menampilkan semua pengajuan surat berdasarkan status tertentu.
     *
     * @param  string  $statusValue
     * @return \Illuminate\View\View
     */
    public function showByStatus(string $statusValue)
    {
        // Validasi status yang diterima
        $validStatuses = [Status::DIAJUKAN->value, Status::DIPROSES->value, Status::SELESAI->value, Status::DITOLAK->value];
        if (!in_array($statusValue, $validStatuses)) {
            abort(404, 'Status pengajuan tidak valid.');
        }

        $pengajuan = PengajuanSurat::where('status', $statusValue)
            ->with(['warga', 'jenisSurat', 'user'])
            ->latest()
            ->get();

        // Mengirimkan nama status yang sesuai untuk ditampilkan di view
        $statusName = '';
        switch ($statusValue) {
            case Status::DIAJUKAN->value:
                $statusName = 'Diajukan';
                break;
            case Status::DIPROSES->value:
                $statusName = 'Diproses';
                break;
            case Status::SELESAI->value:
                $statusName = 'Selesai';
                break;
            case Status::DITOLAK->value:
                $statusName = 'Ditolak';
                break;
        }

        return view('pengajuan.pengajuanSurat.show_by_status', [
            'pengajuan' => $pengajuan,
            'statusName' => $statusName,
        ]);
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
            return redirect()->back();
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
                return redirect()->back();
            }
            $this->sendEmailPemberitahuan($pengajuanSurat, new PengajuanDiproses([
                'nama_warga' => $pengajuanSurat->warga->nama,
                'jenis_surat' => $pengajuanSurat->jenisSurat->nama,
                'nomor_pengajuan' => $pengajuanSurat->id,
                'tanggal_pengajuan' => $pengajuanSurat->tanggal_pengajuan->format('d-m-Y'),
            ]));
            session()->flash('success', 'Pengajuan surat berhasil diproses dan email pemberitahuan dikirim.');
            return redirect()->back();
    
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
            return redirect()->back();
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
            return redirect()->route('pengajuan-surat.index')->with('success', 'Pengajuan surat telah ditolak dan email pemberitahuan dikirim.');
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

            return redirect()->route('pengajuan-surat.index')->with('success', 'Pengajuan surat telah ditolak dan email pemberitahuan dikirim.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
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
    
    $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 16], ['alignment' => 'center', 'spaceAfter' => 100]);
    $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 14], ['alignment' => 'center', 'spaceAfter' => 100]);
    
    $normalStyle = ['alignment' => 'both', 'spaceAfter' => 100];
    $centerStyle = ['alignment' => 'center', 'spaceAfter' => 100];
    $rightStyle = ['alignment' => 'right', 'spaceAfter' => 100];
    
    $labelStyle = [
        'indentation' => ['left' => 0, 'firstLine' => 0],
        'tabs' => [new \PhpOffice\PhpWord\Style\Tab('left', 1500)]
    ];
    
    $boldFontStyle = ['bold' => true];
    
    $section = $phpWord->addSection([
        'marginLeft' => 1133,
        'marginRight' => 1133,
        'marginTop' => 1133,
        'marginBottom' => 1133,
    ]);
    
    $header = $section->addHeader();
    
    $headerTable = $header->addTable([
        'width' => 100 * 50,
        'alignment' => 'center',
        'cellMargin' => 80,
    ]);
    
    $headerTable->addRow();
    
    $logoCell = $headerTable->addCell(1500, ['valign' => 'center']);
    if (file_exists(public_path('images/logo.png'))) {
        $logoCell->addImage(
            public_path('images/logo.png'),
            ['width' => 80, 'height' => 80, 'alignment' => 'left']
        );
    }
    
    $textCell = $headerTable->addCell(8500, ['valign' => 'center']);
    $textCell->addText('PEMERINTAH ' . strtoupper($config->nama_kabupaten ?? 'KABUPATEN'), 
        ['bold' => true, 'size' => 14, 'allCaps' => true], 
        ['alignment' => 'center']);
    $textCell->addText('KECAMATAN ' . strtoupper($config->nama_kecamatan ?? 'KECAMATAN'), 
        ['bold' => true, 'size' => 14, 'allCaps' => true], 
        ['alignment' => 'center']);
    $textCell->addText('DESA ' . strtoupper($config->nama_kelurahan ?? 'DESA'), 
        ['bold' => true, 'size' => 16, 'allCaps' => true], 
        ['alignment' => 'center']);
    $textCell->addText('Jl. Raya ' . ($config->nama_kelurahan ?? 'Desa') . ' Km ' . 
        ($config->km_jalan ?? '10') . ' ' . ($config->nama_dusun ?? 'Kerandangan') . 
        ' Kode Pos : ' . ($config->kode_pos ?? '83355'), 
        ['size' => 11],
        ['alignment' => 'center']);
    
    $header->addLine([
        'weight' => 3, 
        'width' => '100%', 
        'height' => 0,
        'color' => '000000'
    ]);
    
    $header->addLine([
        'weight' => 1, 
        'width' => '100%', 
        'height' => 0,
        'color' => '000000'
    ]);
    
    $section->addTextBreak(2);
    $section->addText(strtoupper($pengajuanSurat->jenisSurat->nama ?? 'SURAT'),
        ['bold' => true, 'size' => 14, 'underline' => 'single', 'allCaps' => true],
        ['alignment' => 'center']);
    $section->addText('Nomor: ' . $pengajuanSurat->id . '/' . now()->format('Y') . '/' . 
        ($pengajuanSurat->jenisSurat->code ?? 'XXX'),
        ['size' => 12],
        ['alignment' => 'center']);
    $section->addTextBreak(1);
    
    $section->addText('Yang bertanda tangan di bawah ini:', null, $normalStyle);
    
    $tableStyle = [
        'width' => 100 * 50,
        'borderSize' => 0,
        'cellMargin' => 0,
    ];
    
    $firstTable = $section->addTable($tableStyle);
    
    $this->addTableRow($firstTable, 'Nama', $currentUser->name);
    $this->addTableRow($firstTable, 'Jabatan', $pengajuanSurat->user->jabatan ?? $currentUser->jabatan ?? 'Petugas Kelurahan');
    $this->addTableRow($firstTable, 'Alamat', $config->alamat_kantor ?? '-');
    
    $section->addTextBreak(1);
    
    $section->addText('Dengan ini menerangkan bahwa:', null, $normalStyle);
    
    $secondTable = $section->addTable($tableStyle);
    
    $this->addTableRow($secondTable, 'Nama', $pengajuanSurat->warga->nama ?? '-');
    $this->addTableRow($secondTable, 'NIK', $pengajuanSurat->warga->nik ?? '-');
    $this->addTableRow($secondTable, 'Tempat/Tanggal Lahir', 
        ($pengajuanSurat->warga->tempat_lahir ?? '-') . ', ' . 
        ($pengajuanSurat->warga->tanggal_lahir ? date('d F Y', strtotime($pengajuanSurat->warga->tanggal_lahir)) : '-'));
    $this->addTableRow($secondTable, 'Jenis Kelamin', $pengajuanSurat->warga->jenis_kelamin ?? '-');
    $this->addTableRow($secondTable, 'Agama', $pengajuanSurat->warga->agama ?? '-');
    $this->addTableRow($secondTable, 'Alamat', $pengajuanSurat->warga->alamat ?? '-');
    
    if ($pengajuanSurat->jenisSurat->has_template && $pengajuanSurat->jenisSurat->template_fields) {
        $templateFields = json_decode($pengajuanSurat->jenisSurat->template_fields, true);
        
        if (is_array($templateFields)) {
            foreach ($templateFields as $field => $label) {
                $this->addTableRow($secondTable, $label, $pengajuanSurat->data[$field] ?? '-');
            }
        }
    }
    
    $section->addTextBreak(1);
    
    if (!empty($pengajuanSurat->keperluan)) {
        $section->addText($pengajuanSurat->keperluan, null, $normalStyle);
        $section->addTextBreak(1);
    }
    
    $templateText = $pengajuanSurat->jenisSurat->template_surat ?? 'Demikian surat ini dibuat dengan sebenarnya dan untuk dipergunakan sebagaimana mestinya.';
    
    $paragraphs = explode("\n", $templateText);
    foreach ($paragraphs as $paragraph) {
        if (!empty(trim($paragraph))) {
            $section->addText(trim($paragraph), null, $normalStyle);
            $section->addTextBreak(0.5);
        }
    }
    
    $section->addTextBreak(1);
    
    setlocale(LC_TIME, 'id_ID');
    $date = now()->format('d F Y');
    
    $section->addText(($config->nama_kelurahan ?? 'Kelurahan') . ', ' . $date, null, $rightStyle);
    $section->addText(($config->jabatan_penandatangan ?? 'Petugas') . ',', null, $rightStyle);
    $section->addTextBreak(3);
    $section->addText($pengajuanSurat->user->name ?? $currentUser->name, 
        ['bold' => true, 'underline' => 'single'], 
        $rightStyle);
    
    if (!empty($pengajuanSurat->user->nip) || !empty($currentUser->nip)) {
        $section->addText('NIP. ' . ($pengajuanSurat->user->nip ?? $currentUser->nip), null, $rightStyle);
    }
    
    $footer = $section->addFooter();
    $footer->addPreserveText('Halaman {PAGE} dari {NUMPAGES}', null, ['alignment' => 'right']);
    
    $fileName = 'Surat_' . $pengajuanSurat->jenisSurat->kode . '_' . $pengajuanSurat->id . '.docx';
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    
    $tempFile = tempnam(sys_get_temp_dir(), 'word');
    $objWriter->save($tempFile);
    
    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
}

private function addTableRow($table, $label, $value)
{
    $row = $table->addRow();
    $row->addCell(2500)->addText($label, null, ['alignment' => 'left']);
    $row->addCell(500)->addText(':', null, ['alignment' => 'center']);
    $row->addCell(7000)->addText($value, null, ['alignment' => 'left']);
}


}
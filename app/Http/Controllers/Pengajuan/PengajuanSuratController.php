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
            $allPengajuan = PengajuanSurat::select('id', 'status')->get(); 
        return view('pengajuan.pengajuanSurat.index', compact('pengajuanSurats', 'allPengajuan'));
    }

    /**
     * Menampilkan semua pengajuan surat berdasarkan status tertentu.
     *
     * @param  string  $statusValue
     * @return \Illuminate\View\View
     */
        public function showByStatus(string $statusValue)
    {
        $validStatuses = [Status::DIAJUKAN->value, Status::DIPROSES->value, Status::SELESAI->value, Status::DITOLAK->value];
        if (!in_array($statusValue, $validStatuses)) {
            abort(404, 'Status pengajuan tidak valid.');
        }
        
        $pengajuan = PengajuanSurat::where('status', $statusValue)
            ->with(['warga', 'jenisSurat', 'user'])
            ->latest()
            ->get();
        
        $allPengajuan = PengajuanSurat::select('id', 'status')->get();
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
            'allPengajuan' => $allPengajuan,
        ]);
    }

   
    public function show(PengajuanSurat $pengajuanSurat)
    {
        $pengajuanSurat->load('keterangan');
        return view('pengajuan.pengajuanSurat.show', compact('pengajuanSurat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengajuanSurat $pengajuanSurat)
    {
        $pengajuanSurat->load('keterangan'); 
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
            $dataPengajuan = $request->validated();
            $dataKeterangan = $request->only(['apa', 'mengapa', 'kapan', 'di_mana', 'siapa', 'bagaimana']);

            if ($request->hasFile('file_pendukung')) {
                if ($pengajuanSurat->file_pendukung) {
                    Storage::disk('public')->delete($pengajuanSurat->file_pendukung);
                }
                $dataPengajuan['file_pendukung'] = $request->file('file_pendukung')->store('surat_pendukung', 'public');
            }

            $pengajuanSurat->update($dataPengajuan);
            // Update data keterangan jika ada relasi
            if ($pengajuanSurat->keterangan) {
                $pengajuanSurat->keterangan->update($dataKeterangan);
            } else {
                $pengajuanSurat->keterangan()->create($dataKeterangan);
            }
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
        $leftStyle = ['alignment' => 'left', 'spaceAfter' => 100];

        $section = $phpWord->addSection([
            'marginLeft' => 1133,
            'marginRight' => 1133,
            'marginTop' => 1133,
            'marginBottom' => 1133,
        ]);

        // ----- HEADER SECTION -----
        $header = $section->addHeader();

        $headerTable = $header->addTable([
            'width' => 100 * 50,
            'alignment' => 'center',
            'cellMargin' => 80,
            'borderSize' => 0, // Ditambahkan untuk menghilangkan garis pada tabel header
        ]);

        $headerTable->addRow();

        // Logo cell
        $logoCell = $headerTable->addCell(1500, ['valign' => 'center']);
        if (file_exists(public_path('images/logo.png'))) {
            $logoCell->addImage(
                public_path('images/logo.png'),
                ['width' => 80, 'height' => 80, 'alignment' => 'left']
            );
        }

        // Header text cell
        $textCell = $headerTable->addCell(8500, ['valign' => 'center']);
        $textCell->addText('PEMERINTAH ' . strtoupper($config->nama_kabupaten ?? 'KABUPATEN'),
            ['bold' => true, 'size' => 12, 'allCaps' => true],
            ['alignment' => 'center']);
        $textCell->addText('KANTOR KEPALA DESA ' . strtoupper($config->nama_kelurahan ?? 'DESA'),
            ['bold' => true, 'size' => 14, 'allCaps' => true],
            ['alignment' => 'center']);
        $textCell->addText('KECAMATAN ' . strtoupper($config->nama_kecamatan ?? 'KECAMATAN'),
            ['bold' => true, 'size' => 12, 'allCaps' => true],
            ['alignment' => 'center']);
        $textCell->addText('Alamat: Jalan ' . ($config->nama_jalan ?? 'Desa') . ' No. ' .
            ($config->no_jalan ?? '-') . ' ' . ($config->nama_kelurahan ?? 'Desa') . ' Telp: ' .
            ($config->telp ?? '-'),
            ['size' => 11],
            ['alignment' => 'center']);

        // Add horizontal lines
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

        // ----- DOCUMENT TITLE AND REFERENCE -----
        $section->addTextBreak(1);

        // Different layout styles based on letter type
        $suratCode = $pengajuanSurat->jenisSurat->code ?? '';

        if (in_array($suratCode, ['KRK', 'SKCK'])) {
            // Two-column layout for reference and recipient (e.g., SKCK style)
            $referenceTable = $section->addTable([
                'width' => 100 * 50,
                'borderSize' => 0
            ]);

            $row = $referenceTable->addRow();
            $leftCell = $row->addCell(5000);
            $leftCell->addText('Nomor   : ' . $pengajuanSurat->id . '/' . $suratCode . '/' . now()->format('m') . '/' . now()->format('Y'), null, $leftStyle);
            $leftCell->addText('Lamp    : -', null, $leftStyle);
            $leftCell->addText('Hal     : ' . ($pengajuanSurat->jenisSurat->nama ?? 'Surat Keterangan'), null, $leftStyle);

            $rightCell = $row->addCell(5000);
            $rightCell->addText('Kepada Yth:', null, $leftStyle);
            $rightCell->addText('BAPAK/IBU PIMPINAN', ['bold' => true], $leftStyle);
            $rightCell->addText('INSTANSI TERKAIT', ['bold' => true], $leftStyle);
            $rightCell->addText('Di-', null, $leftStyle);
            $rightCell->addText('    Tempat', null, $leftStyle);
        } else {
            // Standard centered title for most letter types
            $section->addText(strtoupper($pengajuanSurat->jenisSurat->nama ?? 'SURAT KETERANGAN'),
                ['bold' => true, 'size' => 14, 'underline' => 'single', 'allCaps' => true],
                ['alignment' => 'center']);
            $section->addText('Nomor: ' . $pengajuanSurat->id . '/' . $suratCode . '/' . now()->format('m') . '/' . now()->format('Y'),
                ['size' => 12],
                ['alignment' => 'center']);
        }

        $section->addTextBreak(1);

        // ----- LETTER BODY CONTENT -----

        // Opening paragraph - varies by letter type
        switch ($suratCode) {
            case 'KRK':
            case 'SKCK':
                $section->addText('Dengan hormat,', null, $leftStyle);
                $section->addText('KEPALA DESA ' . strtoupper($config->nama_kelurahan ?? 'DESA') . ' KECAMATAN ' .
                    strtoupper($config->nama_kecamatan ?? 'KECAMATAN') . ' KABUPATEN ' .
                    strtoupper($config->nama_kabupaten ?? 'KABUPATEN') . ', dengan ini memberikan Rekomendasi kepada :',
                    null, $leftStyle);
                break;

            case 'KDM':
                $section->addText('Yang bertanda tangan di bawah ini:', null, $normalStyle);
                break;

            default:
                $section->addText('Yang bertanda tangan di bawah ini Kepala Desa ' .
                    ($config->nama_kelurahan ?? 'Desa') . ' Kecamatan ' .
                    ($config->nama_kecamatan ?? 'Kecamatan') . ' dengan ini menerangkan bahwa:',
                    null, $normalStyle);
                break;
        }

        $section->addTextBreak(1);

        // Signatory (official) information if needed for this letter type
        if (in_array($suratCode, ['KDM', 'KKK', 'KKT', 'KUM'])) {
            $officialTable = $section->addTable([
                'width' => 100 * 50,
                'borderSize' => 0,
                'cellMargin' => 0,
            ]);

            $this->addTableRow($officialTable, 'Nama', $currentUser->name ?? '-');
            $this->addTableRow($officialTable, 'Jabatan', $pengajuanSurat->user->jabatan ?? $currentUser->jabatan ?? 'Kepala Desa');
            $this->addTableRow($officialTable, 'Alamat', $config->alamat_kantor ?? '-');

            $section->addTextBreak(1);

            if ($suratCode !== 'KDM') {
                $section->addText('Dengan ini menerangkan bahwa:', null, $normalStyle);
                $section->addTextBreak(1);
            }
        }

        // Person/citizen information
        $citizenTable = $section->addTable([
            'width' => 100 * 50,
            'borderSize' => 0,
            'cellMargin' => 0,
        ]);

        // Populate person data from the database
        $this->addTableRow($citizenTable, 'Nama Lengkap', $pengajuanSurat->warga->nama ?? '-');
        $this->addTableRow($citizenTable, 'NIK', $pengajuanSurat->warga->nik ?? '-');
        $this->addTableRow($citizenTable, 'Tempat/Tanggal Lahir',
            ($pengajuanSurat->warga->tempat_lahir ?? '-') . ', ' .
            ($pengajuanSurat->warga->tanggal_lahir ? date('d F Y', strtotime($pengajuanSurat->warga->tanggal_lahir)) : '-'));
        $this->addTableRow($citizenTable, 'Jenis Kelamin', $pengajuanSurat->warga->jenis_kelamin ?? '-');
        $this->addTableRow($citizenTable, 'Agama', $pengajuanSurat->warga->agama ?? '-');
        $this->addTableRow($citizenTable, 'Pekerjaan', $pengajuanSurat->warga->pekerjaan ?? '-');
        $this->addTableRow($citizenTable, 'Alamat', $pengajuanSurat->warga->alamat ?? '-');

        // Add custom fields if available in template
        if (!empty($pengajuanSurat->jenisSurat->template_fields)) {
            $templateFields = json_decode($pengajuanSurat->jenisSurat->template_fields, true);

            if (is_array($templateFields) && isset($pengajuanSurat->data) && is_array($pengajuanSurat->data)) {
                foreach ($templateFields as $field => $label) {
                    $this->addTableRow($citizenTable, $label, $pengajuanSurat->data[$field] ?? '-');
                }
            }
        }

        $section->addTextBreak(1);

        // Letter purpose/content based on letter type
        if (!empty($pengajuanSurat->keperluan)) {
            $section->addText($pengajuanSurat->keperluan, null, $normalStyle);
            $section->addTextBreak(1);
        }

        // Add template text if available, or use default text
        if (!empty($pengajuanSurat->jenisSurat->template_surat)) {
            $templateText = $pengajuanSurat->jenisSurat->template_surat;
            $paragraphs = explode("\n", $templateText);
            foreach ($paragraphs as $paragraph) {
                if (!empty(trim($paragraph))) {
                    $section->addText(trim($paragraph), null, $normalStyle);
                    $section->addTextBreak(0.5);
                }
            }
        } else {
            // Default closing text
            $section->addText('Demikian surat ini dibuat dengan sebenarnya dan untuk dipergunakan sebagaimana mestinya.',
                null, $normalStyle);
        }

        $section->addTextBreak(1);

        // ----- SIGNATURE SECTION -----
        setlocale(LC_TIME, 'id_ID');
        $date = now()->format('d F Y');

        // Standard signature layout
        $signatureTable = $section->addTable([
            'width' => 100 * 50,
            'borderSize' => 0
        ]);

        $row = $signatureTable->addRow();
        $leftSignCell = $row->addCell(5000);
        // Left cell empty for most letter types

        $rightSignCell = $row->addCell(5000);
        $rightSignCell->addText(($config->nama_kelurahan ?? 'Desa') . ', ' . $date, null, $leftStyle);
        $rightSignCell->addText(($pengajuanSurat->user->jabatan ?? $currentUser->jabatan ?? 'Kepala Desa'), null, $leftStyle);
        $rightSignCell->addTextBreak(3);
        $rightSignCell->addText(strtoupper($pengajuanSurat->user->name ?? $currentUser->name),
            ['bold' => true, 'underline' => 'single'],
            $leftStyle);

        if (!empty($pengajuanSurat->user->nip) || !empty($currentUser->nip)) {
            $rightSignCell->addText('NIP. ' . ($pengajuanSurat->user->nip ?? $currentUser->nip), null, $leftStyle);
        }

        // ----- FOOTER SECTION -----
        $footer = $section->addFooter();
        $footer->addPreserveText('Halaman {PAGE} dari {NUMPAGES}', null, ['alignment' => 'right']);

        // Generate filename and save document
        $fileName = 'Surat_' . $pengajuanSurat->jenisSurat->code . '_' . $pengajuanSurat->id . '.docx';
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

        $tempFile = tempnam(sys_get_temp_dir(), 'word');
        $objWriter->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    private function addTableRow($table, $label, $value)
    {
        $row = $table->addRow();
        $row->addCell(3500)->addText($label, null, ['alignment' => 'left']);
        $row->addCell(500)->addText(':', null, ['alignment' => 'center']);
        $row->addCell(6000)->addText($value, null, ['alignment' => 'left']);
    }

}
<?php

namespace App\Http\Controllers\DashboardWarga;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\PengajuanSurat\StorePengajuanSuratWargaRequest;
use App\Models\Config;
use App\Models\JenisSurat;
use App\Models\Keterangan;
use App\Models\PengajuanSurat;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class WargaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:warga'])->except(['showLoginForm', 'loginWarga']);
        $this->middleware(['verified:warga'])->only(['showMenuWarga', 'showFormulirWarga', 'storePengajuanWarga']);
    }

    /**
     * Show the application's login form for warga.
     */
    public function showLoginForm(): View
    {
        return view('auth.guest');
    }

    /**
     * Show the form for creating a new pengajuan surat (for warga).
     */
    public function showFormulirWarga(): View
    {
        $warga = Auth::guard('warga')->user();
        $jenisSurats = JenisSurat::all();
        return view('dashboardwarga.formulir', compact('warga', 'jenisSurats'));
    }

    /**
     * Store a newly created pengajuan surat (from warga).
     */
    public function storePengajuanWarga(StorePengajuanSuratWargaRequest $request)
    {
        try {
            $dataPengajuan = $request->validated();
            $dataPengajuan['warga_id'] = Auth::guard('warga')->id();
            $dataPengajuan['status'] = Status::DIAJUKAN;

            // Buat record di tabel keterangans
            $keterangan = Keterangan::create([
                'apa' => $dataPengajuan['apa'] ?? null,
                'mengapa' => $dataPengajuan['mengapa'] ?? null,
                'kapan' => $dataPengajuan['kapan'] ?? null,
                'di_mana' => $dataPengajuan['di_mana'] ?? null,
                'siapa' => $dataPengajuan['siapa'] ?? null,
                'bagaimana' => $dataPengajuan['bagaimana'] ?? null,
            ]);
            $dataPengajuan['keterangan_id'] = $keterangan->id;
            unset($dataPengajuan['apa'], $dataPengajuan['mengapa'], $dataPengajuan['kapan'], $dataPengajuan['di_mana'], $dataPengajuan['siapa'], $dataPengajuan['bagaimana']);
            if ($request->hasFile('file_pendukung')) {
                $file = $request->file('file_pendukung');

                if ($file->isValid()) {
                    $dataPengajuan['file_pendukung'] = $file->store('surat_pendukung', 'public');
                } else {
                    throw new \Exception('File tidak valid: ' . $file->getErrorMessage());
                }
            }
            PengajuanSurat::create($dataPengajuan);
            session()->flash('success', 'Pengajuan surat berhasil dikirim.');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat membuat pengajuan surat: ' . $e->getMessage());
            return back()->withInput();
        }
    }


    /**
     * Show menu warga.
     */
    public function showMenuWarga(): View
    {
        return view('dashboardwarga.menu');
    }

    /**
     * Handle a login request for warga.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function loginWarga(Request $request)
    {
        $request->validate([
            'nik' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('nik', 'password');

        if (Auth::guard('warga')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            if (Auth::guard('warga')->user()->hasVerifiedEmail()) {
                return Redirect::intended(route('warga.menu'));
            } else {
                return redirect()->route('verification.notice')
                    ->with('warning', 'Anda harus memverifikasi email sebelum dapat mengakses layanan.');
            }
        }
        return back()->withErrors([
            'nik' => 'NIK atau kata sandi salah.',
        ])->onlyInput('nik');
    }

    /**
     * Log the user out of the application (warga guard).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function logoutWarga(Request $request)
    {
        Auth::guard('warga')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }



    public function profile(): View
    {
        $user = Auth::guard('warga')->user();
        $latestActivities = $user->pengajuanSurats()
            ->orderBy('tanggal_pengajuan', 'desc')
            ->take(5)
            ->get();

        return view('dashboardwarga.profile', compact('latestActivities'));
    }


    public function riwayat(Request $request): View
    {
        $wargaId = Auth::guard('warga')->id();
        $query = PengajuanSurat::where('warga_id', $wargaId)
            ->orderBy('created_at', 'desc');
    
        $statusFilter = $request->input('status');
        $waktuFilter = $request->input('waktu');
    
        if ($statusFilter) {
            $query->where('status', $statusFilter);
        }
    
        if ($waktuFilter) {
            switch ($waktuFilter) {
                case 'Hari Ini':
                    $query->whereDate('created_at', today());
                    break;
                case 'Minggu Ini':
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'Bulan Ini':
                    $query->whereMonth('created_at', now()->month);
                    break;
            }
        }
        $pengajuans = $query->paginate(10)
            ->appends(['status' => $statusFilter, 'waktu' => $waktuFilter]);
    
        $jumlahDiajukan = PengajuanSurat::where('warga_id', $wargaId)
            ->where('status', Status::DIAJUKAN)
            ->count();
        $jumlahDiproses = PengajuanSurat::where('warga_id', $wargaId)
            ->where('status', Status::DIPROSES)
            ->count();
        $jumlahSelesai = PengajuanSurat::where('warga_id', $wargaId)
            ->where('status', Status::SELESAI)
            ->count();
        $jumlahDitolak = PengajuanSurat::where('warga_id', $wargaId)
            ->where('status', Status::DITOLAK)
            ->count();
        $jumlahSemua = PengajuanSurat::where('warga_id', $wargaId)->count();
    
        return view('dashboardwarga.riwayat_pengajuan', compact('pengajuans', 'statusFilter', 'waktuFilter', 'jumlahDiajukan', 'jumlahDiproses', 'jumlahSelesai', 'jumlahDitolak', 'jumlahSemua'));
    }



    
    // public function updateChecked(Request $request)
    // {
    //     $request->validate([
    //         'checked_ids' => 'required',
    //     ]);
    //     $checkedIds = json_decode($request->checked_ids);
    //     $wargaId = Auth::guard('warga')->id();
    //     $pengajuans = PengajuanSurat::where('warga_id', $wargaId)->get();
        
    //     foreach ($pengajuans as $pengajuan) {
    //         $pengajuan->cek = in_array($pengajuan->id, $checkedIds);
    //         $pengajuan->save();
    //     }
        
    //     return redirect()->back()->with('success', 'Checklist berhasil diperbarui');
    // }

    



    public function showPengajuanWarga(PengajuanSurat $pengajuanSurat): View
    {
        // Pastikan pengajuan ini milik warga yang sedang login
        if ($pengajuanSurat->warga_id !== Auth::guard('warga')->id()) {
            abort(403, 'Anda tidak memiliki izin untuk melihat detail pengajuan ini.');
        }

        return view('dashboardwarga.detail_pengajuan', compact('pengajuanSurat'));
    }


    // public function printWarga(PengajuanSurat $pengajuanSurat)
    // {
    //     if ($pengajuanSurat->warga_id !== Auth::guard('warga')->id()) {
    //         abort(403, 'Anda tidak memiliki izin untuk mencetak pengajuan ini.');
    //     }
    //     if ($pengajuanSurat->status != Status::SELESAI) {
    //         session()->flash('error', 'Surat tidak dapat dicetak karena status saat ini adalah ' . $pengajuanSurat->status->value);
    //         return back();
    //     }

    //     // Eager load relasi 'warga', 'jenisSurat', dan 'user'
    //     $pengajuanSurat->load(['warga', 'jenisSurat', 'user']);

    //     $config = Config::first(); // Ambil konfigurasi aplikasi Anda

    //     $data = [
    //         'pengajuan' => $pengajuanSurat,
    //         'config' => $config,
    //     ];

    //     $pdf = Pdf::loadView('dashboardwarga.pdf', $data);

    //     return $pdf->stream('pengajuan-surat-' . $pengajuanSurat->id . '.pdf');
    // }
}
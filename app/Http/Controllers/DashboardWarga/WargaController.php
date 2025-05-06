<?php

namespace App\Http\Controllers\DashboardWarga;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\PengajuanSurat\StorePengajuanSuratWargaRequest;
use App\Models\Config;
use App\Models\JenisSurat;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf; 

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
            $data = $request->validated();
            $data['warga_id'] = Auth::guard('warga')->id();
            $data['status'] = \App\Enums\Status::DIAJUKAN;
    
            if ($request->hasFile('file_pendukung')) {
                $data['file_pendukung'] = $request->file('file_pendukung')->store('surat_pendukung', 'public');
            }
            PengajuanSurat::create($data);
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


/**
     * Menampilkan halaman notifikasi warga (berdasarkan riwayat pengajuan surat).
     */
    public function notifikasi(Request $request): View
{
    $wargaId = Auth::guard('warga')->id();

    $query = PengajuanSurat::where('warga_id', $wargaId)
        ->orderBy('created_at', 'desc');

    // Opsi Filter (berdasarkan request)
    $jenisFilter = $request->input('jenis');
    $waktuFilter = $request->input('waktu');

    // Perbaiki logika filter status
    if ($jenisFilter) {
        $query->where('status', $jenisFilter);
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
        ->appends(['jenis' => $jenisFilter, 'waktu' => $waktuFilter]);

    return view('dashboardwarga.notifikasi', compact('pengajuans', 'jenisFilter', 'waktuFilter'));
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



    public function riwayat(): View
    {
        $wargaId = Auth::guard('warga')->id();
        $pengajuans = PengajuanSurat::where('warga_id', $wargaId)->latest()->get();
        return view('dashboardwarga.riwayat_pengajuan', compact('pengajuans'));
    }

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
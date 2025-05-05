<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PengajuanSurat\StorePengajuanSuratWargaRequest;
use App\Models\JenisSurat;
use App\Models\PengajuanSurat;
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
        return view('formulir', compact('warga', 'jenisSurats'));
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
        return view('menu');
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

            // Cek apakah email sudah diverifikasi
            if (Auth::guard('warga')->user()->hasVerifiedEmail()) {
                return Redirect::intended(route('menu.warga'));
            } else {
                // Redirect ke halaman verifikasi email jika belum diverifikasi
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
}
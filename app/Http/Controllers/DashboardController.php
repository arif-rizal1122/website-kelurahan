<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\PengajuanSurat;
use App\Models\TwebPenduduk;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
        public function index(Request $request)
    {
        if ($request->path() === 'dashboard') {
            $totalDiajukan = PengajuanSurat::where('status', Status::DIAJUKAN)->count();
            $totalDiproses = PengajuanSurat::where('status', Status::DIPROSES)->count();
            $totalSelesai = PengajuanSurat::where('status', Status::SELESAI)->count();
            $totalDitolak = PengajuanSurat::where('status', Status::DITOLAK)->count();
            $jumlahPenduduk = TwebPenduduk::count();

            // Ambil data untuk 6 bulan terakhir
            $monthlyStats = [];
            $currentMonth = now();
            
            for ($i = 5; $i >= 0; $i--) {
                $month = clone $currentMonth;
                $month->subMonths($i);
                
                $startOfMonth = $month->copy()->startOfMonth();
                $endOfMonth = $month->copy()->endOfMonth();
                
                $monthlyStats[] = [
                    'bulan' => $month->format('M'),
                    'diajukan' => PengajuanSurat::where('status', Status::DIAJUKAN)
                        ->whereBetween('tanggal_pengajuan', [$startOfMonth, $endOfMonth])
                        ->count(),
                    'diproses' => PengajuanSurat::where('status', Status::DIPROSES)
                        ->whereBetween('tanggal_pengajuan', [$startOfMonth, $endOfMonth])
                        ->count(),
                    'selesai' => PengajuanSurat::where('status', Status::SELESAI)
                        ->whereBetween('tanggal_selesai', [$startOfMonth, $endOfMonth])
                        ->count(),
                    'ditolak' => PengajuanSurat::where('status', Status::DITOLAK)
                        ->whereBetween('tanggal_pengajuan', [$startOfMonth, $endOfMonth])
                        ->count(),
                ];
            }

            return view('dashboard', [
                'totalDiajukan' => $totalDiajukan,
                'totalDiproses' => $totalDiproses,
                'totalSelesai' => $totalSelesai,
                'totalDitolak' => $totalDitolak,
                'jumlahPenduduk' => $jumlahPenduduk,
                'monthlyStats' => $monthlyStats,
            ]);
        }

        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return abort(404);
    }

    public function root()
    {
        return view('dashboard');
    }

}
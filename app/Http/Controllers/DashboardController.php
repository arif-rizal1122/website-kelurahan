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

            return view('dashboard', [
                'totalDiajukan' => $totalDiajukan,
                'totalDiproses' => $totalDiproses,
                'totalSelesai' => $totalSelesai,
                'totalDitolak' => $totalDitolak,
                'jumlahPenduduk' => $jumlahPenduduk,
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
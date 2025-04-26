<?php

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\Common\PendudukController;
use App\Http\Controllers\Surat\SuratKeluarController;
use App\Http\Controllers\Surat\SuratMasukController;
use App\Http\Controllers\Unit\UnitController;
use App\Http\Controllers\Pengajuan\PengajuanSuratController; 
use App\Http\Controllers\Pengajuan\JenisSuratController; 
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'mainPage'])->name('homepage');

Route::get('index/{locale}', [HomeController::class, 'lang']);

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('root'); 

    // Konfigurasi
    Route::prefix('config')->group(function () {
        Route::get('/', [ConfigController::class, 'index'])->name('config.index');
        Route::post('/', [ConfigController::class, 'update'])->name('config.update');
    });

    // User Management Routes (Added here)
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // Data Penduduk
    Route::prefix('penduduk')->group(function () {
        Route::get('/', [PendudukController::class, 'index'])->name('penduduk.index');
        Route::get('/data', [PendudukController::class, 'getData'])->name('penduduk.data');
        Route::get('/create', [PendudukController::class, 'create'])->name('penduduk.create');
        Route::post('/', [PendudukController::class, 'store'])->name('penduduk.store');
        Route::get('/{penduduk}', [PendudukController::class, 'show'])->name('penduduk.show');
        Route::get('/{penduduk}/edit', [PendudukController::class, 'edit'])->name('penduduk.edit');
        Route::put('/{penduduk}', [PendudukController::class, 'update'])->name('penduduk.update');
        Route::delete('/{penduduk}', [PendudukController::class, 'destroy'])->name('penduduk.destroy');
    });

    // Surat Masuk
    Route::prefix('surat-masuk')->group(function () {
        Route::get('/', [SuratMasukController::class, 'index'])->name('surat-masuk.index');
        Route::get('/create', [SuratMasukController::class, 'create'])->name('surat-masuk.create');
        Route::post('/', [SuratMasukController::class, 'store'])->name('surat-masuk.store');
        Route::get('/{surat}/edit', [SuratMasukController::class, 'edit'])->name('surat-masuk.edit');
        Route::get('/{surat}', [SuratMasukController::class, 'show'])->name('surat-masuk.show');
        Route::put('/{surat}', [SuratMasukController::class, 'update'])->name('surat-masuk.update');
        Route::delete('/{surat}', [SuratMasukController::class, 'destroy'])->name('surat-masuk.destroy');
        Route::delete('/attachments/{attachment}', [SuratMasukController::class, 'destroyAttachment'])->name('surat-masuk.attachments.destroy');
    });

    // Surat Keluar
    Route::prefix('surat-keluar')->group(function () {
        Route::get('/', [SuratKeluarController::class, 'index'])->name('surat-keluar.index');
        Route::get('/create', [SuratKeluarController::class, 'create'])->name('surat-keluar.create');
        Route::post('/', [SuratKeluarController::class, 'store'])->name('surat-keluar.store');
        Route::get('/{surat}/edit', [SuratKeluarController::class, 'edit'])->name('surat-keluar.edit'); // Route edit dipindahkan ke atas
        Route::get('/{surat}', [SuratKeluarController::class, 'show'])->name('surat-keluar.show');
        Route::put('/{surat}', [SuratKeluarController::class, 'update'])->name('surat-keluar.update');
        Route::delete('/{surat}', [SuratKeluarController::class, 'destroy'])->name('surat-keluar.destroy');
        Route::get('/{surat}/print-word', [SuratKeluarController::class, 'print'])->name('surat-keluar.print-word');
    });

    // Unit Management Routes
    Route::prefix('units')->group(function () {
        Route::get('/', [UnitController::class, 'index'])->name('units.index');
        Route::get('/create', [UnitController::class, 'create'])->name('units.create');
        Route::post('/', [UnitController::class, 'store'])->name('units.store');
        Route::get('/{unit}', [UnitController::class, 'show'])->name('units.show');
        Route::get('/{unit}/edit', [UnitController::class, 'edit'])->name('units.edit');
        Route::put('/{unit}', [UnitController::class, 'update'])->name('units.update');
        Route::delete('/{unit}', [UnitController::class, 'destroy'])->name('units.destroy');
    });


   // Jenis Surat Routes
    Route::prefix('jenis-surat')->group(function () {
        Route::get('/', [JenisSuratController::class, 'index'])->name('jenis-surat.index');
        Route::get('/create', [JenisSuratController::class, 'create'])->name('jenis-surat.create');
        Route::post('/', [JenisSuratController::class, 'store'])->name('jenis-surat.store');
        Route::get('/{jenisSurat}/edit', [JenisSuratController::class, 'edit'])->name('jenis-surat.edit'); 
        Route::get('/{jenisSurat}', [JenisSuratController::class, 'show'])->name('jenis-surat.show');
        Route::put('/{jenisSurat}', [JenisSuratController::class, 'update'])->name('jenis-surat.update');
        Route::delete('/{jenisSurat}', [JenisSuratController::class, 'destroy'])->name('jenis-surat.destroy');
    });

    // Pengajuan Surat Routes (Added here)
    Route::prefix('pengajuan-surat')->group(function () {
        Route::get('/', [PengajuanSuratController::class, 'index'])->name('pengajuan-surat.index');
        Route::get('/create', [PengajuanSuratController::class, 'create'])->name('pengajuan-surat.create');
        Route::post('/', [PengajuanSuratController::class, 'store'])->name('pengajuan-surat.store');
        Route::get('/{pengajuanSurat}', [PengajuanSuratController::class, 'show'])->name('pengajuan-surat.show');
        Route::get('/{pengajuanSurat}/edit', [PengajuanSuratController::class, 'edit'])->name('pengajuan-surat.edit');
        Route::put('/{pengajuanSurat}', [PengajuanSuratController::class, 'update'])->name('pengajuan-surat.update');
        Route::delete('/{pengajuanSurat}', [PengajuanSuratController::class, 'destroy'])->name('pengajuan-surat.destroy');
    });
});

// Catch-all route (Mungkin untuk menampilkan halaman statis lain tanpa login)
// Route::get('{any}', [HomeController::class, 'index'])->name('index'); 
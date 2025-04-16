<?php

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\Common\PendudukController;
use App\Http\Controllers\Surat\SuratKeluarController;
use App\Http\Controllers\Surat\SuratMasukController;
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

// Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

// Update User Details
Route::middleware(['auth'])->group(function () {
    // Config
    Route::prefix('config')->group(function () {
        Route::get('/', [ConfigController::class, 'index'])->name('config.index');
        Route::post('/', [ConfigController::class, 'update'])->name('config.update');
    });

    Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');
    
    // Data Penduduk
    Route::prefix('penduduk')->group(function () {
        Route::get('/', [PendudukController::class, 'index'])->name('penduduk.index');
        Route::get('/data', [PendudukController::class, 'getData'])->name('penduduk.data');
        Route::get('/create', [PendudukController::class, 'create'])->name('penduduk.create');
        Route::post('/', [PendudukController::class, 'store'])->name('penduduk.store');
        Route::get('/{id}/detail', [PendudukController::class, 'show'])->name('penduduk.show');
        Route::get('/{id}/edit', [PendudukController::class, 'edit'])->name('penduduk.edit');
        Route::put('/{id}', [PendudukController::class, 'update'])->name('penduduk.update');
        Route::delete('/{id}', [PendudukController::class, 'destroy'])->name('penduduk.destroy');
    });

    // Surat Masuk
    Route::prefix('surat-masuk')->group(function () {
        Route::get('/', [SuratMasukController::class, 'index'])->name('surat-masuk.index');
        Route::get('/create', [SuratMasukController::class, 'create'])->name('surat-masuk.create');
        Route::post('/', [SuratMasukController::class, 'store'])->name('surat-masuk.store');
        Route::get('/{surat}', [SuratMasukController::class, 'show'])->name('surat-masuk.show');
        Route::get('/{surat}/edit', [SuratMasukController::class, 'edit'])->name('surat-masuk.edit');
        Route::put('/{surat}', [SuratMasukController::class, 'update'])->name('surat-masuk.update');
        Route::delete('/{surat}', [SuratMasukController::class, 'destroy'])->name('surat-masuk.destroy');
    });

    // Surat Keluar
    Route::prefix('surat-keluar')->group(function () {
        Route::get('/', [SuratKeluarController::class, 'index'])->name('surat-keluar.index');
        Route::get('/create', [SuratKeluarController::class, 'create'])->name('surat-keluar.create');
        Route::post('/', [SuratKeluarController::class, 'store'])->name('surat-keluar.store');
        Route::get('/{surat}', [SuratKeluarController::class, 'show'])->name('surat-keluar.show');
        Route::get('/{surat}/edit', [SuratKeluarController::class, 'edit'])->name('surat-keluar.edit');
        Route::put('/{surat}', [SuratKeluarController::class, 'update'])->name('surat-keluar.update');
        Route::delete('/{surat}', [SuratKeluarController::class, 'destroy'])->name('surat-keluar.destroy');
    });


});

// Catch-all route harus berada di paling bawah
Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
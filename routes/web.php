<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\DashboardWarga\WargaController;
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
use PhpOffice\Math\Element\Row;

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

// Password Reset Routes for Warga
Route::get('/password/warga/reset', [App\Http\Controllers\Auth\WargaForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('warga.password.request');
Route::post('/password/warga/email', [App\Http\Controllers\Auth\WargaForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('warga.password.email');
Route::get('/password/warga/reset/{token}', [App\Http\Controllers\Auth\WargaResetPasswordController::class, 'showResetForm'])
    ->name('warga.password.reset');
Route::post('/password/warga/reset', [App\Http\Controllers\Auth\WargaResetPasswordController::class, 'reset'])
    ->name('warga.password.update');


// Routes untuk autentikasi warga
Route::get('/login/warga', [WargaController::class, 'showLoginForm'])->name('warga.login.form'); 
Route::post('/login/warga', [WargaController::class, 'loginWarga'])->name('warga.login');
Route::post('/logout/warga', [WargaController::class, 'logoutWarga'])->name('warga.logout');

// Routes untuk registrasi warga
Route::get('/register/warga', [RegisterController::class, 'showRegistrationForm'])->name('register.warga');
Route::post('/register/warga', [RegisterController::class, 'register'])->name('warga.register.process');

// Routes untuk verifikasi email
Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');




// Routes yang memerlukan autentikasi warga (dan verifikasi email)
Route::middleware(['auth.warga', 'verified:warga'])->name('warga.')->group(function () {
    Route::get('/menu', [WargaController::class, 'showMenuWarga'])->name('menu');
    Route::get('/formulir', [WargaController::class, 'showFormulirWarga'])->name('formulir');
    Route::post('/pengajuan', [WargaController::class, 'storePengajuanWarga'])->name('pengajuan');

    Route::get('profile', [WargaController::class, 'profile'])->name('profile');
    Route::get('notifikasi', [WargaController::class, 'notifikasi'])->name('notifikasi');
    Route::get('riwayat', [WargaController::class, 'riwayat'])->name('riwayat');
    Route::get('/pengajuan/{pengajuanSurat}', [WargaController::class, 'showPengajuanWarga'])->name('pengajuan-surat.show');
    // Route::get('/{pengajuanSurat}/print', [WargaController::class, 'printWarga'])->name('pengajuan-surat.print');
});







Route::middleware(['auth.admin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('root'); 

     // Konfigurasi
     Route::prefix('config')->group(function () {
        // Public Route (Accessible to all authenticated users)
        Route::get('/', [ConfigController::class, 'index'])->name('config.index');
        Route::post('/avatar', [ConfigController::class, 'updateAvatar'])->name('profile.updateAvatar');
        Route::post('/', [ConfigController::class, 'update'])->name('config.update');
    
        // Admin Only Routes
        Route::middleware('adminAccess')->group(function () {
            Route::prefix('profile')->group(function () {
                Route::post('/', [ConfigController::class, 'updateUser'])->name('profile.update');
                Route::post('/password', [ConfigController::class, 'updatePassword'])->name('profile.updatePassword');
                Route::get('/download', [ConfigController::class, 'download'])->name('profile.download');
            });
        });
    });



    // User Management Routes (Added here)
    Route::prefix('users')->middleware('adminAccess')->group(function () {
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

        Route::middleware('adminAccess')->group(function () {
            Route::get('/create', [PendudukController::class, 'create'])->name('penduduk.create'); // Pindahkan ke atas
            Route::post('/', [PendudukController::class, 'store'])->name('penduduk.store');
            Route::get('/{penduduk}/edit', [PendudukController::class, 'edit'])->name('penduduk.edit');
            Route::put('/{penduduk}', [PendudukController::class, 'update'])->name('penduduk.update');
            Route::delete('/{penduduk}', [PendudukController::class, 'destroy'])->name('penduduk.destroy');
        });
        Route::get('/', [PendudukController::class, 'index'])->name('penduduk.index');
        Route::get('/data', [PendudukController::class, 'getData'])->name('penduduk.data');
        Route::get('/{penduduk}', [PendudukController::class, 'show'])->name('penduduk.show');
    });


    // Surat Masuk
    Route::prefix('surat-masuk')->group(function () {
        Route::get('/', [SuratMasukController::class, 'index'])->name('surat-masuk.index');
        Route::get('/{surat}', [SuratMasukController::class, 'show'])->name('surat-masuk.show');
    
        // Admin Only Routes
        Route::middleware('adminAccess')->group(function () {
            Route::get('/create', [SuratMasukController::class, 'create'])->name('surat-masuk.create');
            Route::post('/', [SuratMasukController::class, 'store'])->name('surat-masuk.store');
            Route::get('/{surat}/edit', [SuratMasukController::class, 'edit'])->name('surat-masuk.edit');
            Route::put('/{surat}', [SuratMasukController::class, 'update'])->name('surat-masuk.update');
            Route::delete('/{surat}', [SuratMasukController::class, 'destroy'])->name('surat-masuk.destroy');
            Route::delete('/attachments/{attachment}', [SuratMasukController::class, 'destroyAttachment'])->name('surat-masuk.attachments.destroy');
        });
    });


    // Surat Keluar
    Route::prefix('surat-keluar')->group(function () {
        Route::get('/', [SuratKeluarController::class, 'index'])->name('surat-keluar.index');
        Route::get('/{surat}', [SuratKeluarController::class, 'show'])->name('surat-keluar.show');
        Route::get('/{surat}/print-word', [SuratKeluarController::class, 'print'])->name('surat-keluar.print-word');
    
        // Admin Only Routes
        Route::middleware('adminAccess')->group(function () {
            Route::get('/create', [SuratKeluarController::class, 'create'])->name('surat-keluar.create');
            Route::post('/', [SuratKeluarController::class, 'store'])->name('surat-keluar.store');
            Route::get('/{surat}/edit', [SuratKeluarController::class, 'edit'])->name('surat-keluar.edit');
            Route::put('/{surat}', [SuratKeluarController::class, 'update'])->name('surat-keluar.update');
            Route::delete('/{surat}', [SuratKeluarController::class, 'destroy'])->name('surat-keluar.destroy');
        });
    });

    // Unit Management Routes
    Route::prefix('units')->group(function () {
        Route::get('/', [UnitController::class, 'index'])->name('units.index');
        Route::get('/{unit}', [UnitController::class, 'show'])->name('units.show');
    
        // Admin Only Routes
        Route::middleware('adminAccess')->group(function () {
            Route::get('/create', [UnitController::class, 'create'])->name('units.create');
            Route::post('/', [UnitController::class, 'store'])->name('units.store');
            Route::get('/{unit}/edit', [UnitController::class, 'edit'])->name('units.edit');
            Route::put('/{unit}', [UnitController::class, 'update'])->name('units.update');
            Route::delete('/{unit}', [UnitController::class, 'destroy'])->name('units.destroy');
        });
    });


   // Jenis Surat Routes
    Route::prefix('jenis-surat')->group(function () {
        Route::middleware('adminAccess')->group(function () {
            Route::get('/create', [JenisSuratController::class, 'create'])->name('jenis-surat.create'); // Letakkan create di atas
            Route::post('/', [JenisSuratController::class, 'store'])->name('jenis-surat.store');
            Route::get('/{jenisSurat}/edit', [JenisSuratController::class, 'edit'])->name('jenis-surat.edit');
            Route::put('/{jenisSurat}', [JenisSuratController::class, 'update'])->name('jenis-surat.update');
            Route::delete('/{jenisSurat}', [JenisSuratController::class, 'destroy'])->name('jenis-surat.destroy');
        });

        Route::get('/', [JenisSuratController::class, 'index'])->name('jenis-surat.index');
        Route::get('/{jenisSurat}', [JenisSuratController::class, 'show'])->name('jenis-surat.show');
    });



    // Pengajuan Surat Routes (Added here)
    Route::prefix('pengajuan-surat')->group(function () {
        Route::get('/', [PengajuanSuratController::class, 'index'])->name('pengajuan-surat.index');
        Route::get('/{pengajuanSurat}', [PengajuanSuratController::class, 'show'])->name('pengajuan-surat.show');
        Route::patch('/{pengajuanSurat}/process', [PengajuanSuratController::class, 'process'])->name('pengajuan-surat.process');
        Route::patch('/{pengajuanSurat}/complete', [PengajuanSuratController::class, 'complete'])->name('pengajuan-surat.complete');
        Route::get('/{pengajuanSurat}/reject', [PengajuanSuratController::class, 'reject'])->name('pengajuan-surat.reject');
        Route::post('/{pengajuanSurat}/reject', [PengajuanSuratController::class, 'storeRejection'])->name('pengajuan-surat.storeRejection'); 
        
        Route::get('/{pengajuanSurat}/print', [PengajuanSuratController::class, 'print'])->name('pengajuan-surat.print');
        // Route untuk menampilkan pengajuan berdasarkan status
        Route::get('/status/{status}', [PengajuanSuratController::class, 'showByStatus'])->name('pengajuan-surat.status');

        // Admin Only Routes
        Route::middleware('adminAccess')->group(function () {
            Route::get('/create', [PengajuanSuratController::class, 'create'])->name('pengajuan-surat.create');
            Route::get('/{pengajuanSurat}/edit', [PengajuanSuratController::class, 'edit'])->name('pengajuan-surat.edit');
            Route::put('/{pengajuanSurat}', [PengajuanSuratController::class, 'update'])->name('pengajuan-surat.update');
            Route::delete('/{pengajuanSurat}', [PengajuanSuratController::class, 'destroy'])->name('pengajuan-surat.destroy');
        });
    });

    
});

// Catch-all route (Mungkin untuk menampilkan halaman statis lain tanpa login)
// Route::get('{any}', [HomeController::class, 'index'])->name('index'); 
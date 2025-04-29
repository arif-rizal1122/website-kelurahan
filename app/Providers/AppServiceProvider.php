<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Models\PengajuanSurat;
use Illuminate\Support\Facades\View;
use App\Enums\Status;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        Blade::component('input-form', \App\View\Components\InputForm::class);

        View::composer('*', function ($view) {
            $pengajuanDiajukan = PengajuanSurat::with(['warga', 'jenisSurat'])
                ->where('status', Status::DIAJUKAN)
                ->orderBy('tanggal_pengajuan', 'desc')
                ->get();
            $view->with('pengajuanDiajukan', $pengajuanDiajukan);
        });
       
    }
}

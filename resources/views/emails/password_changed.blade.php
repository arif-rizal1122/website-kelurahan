@extends('layouts.master-without-nav')
@section('title')
    Reset Email Berhasil
@endsection
@section('css')
<link href="{{ URL::asset('build/css/email.pages.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="status-icon success">
                                    <i class="bx bx-check-circle"></i>
                                </div>
                                <h4 class="page-title">Reset Password Berhasil!</h4>
                                <p class="page-subtitle">Password akun Anda telah berhasil diubah.</p>
                                
                                <div class="alert alert-success" role="alert">
                                    <i class="bx bx-check-circle"></i>
                                    <span>Perubahan password telah disimpan dengan aman.</span>
                                </div>
                                
                                <div class="mt-4">
                                    <p>Halo <strong>{{ $user->name }}</strong>,</p>
                                    <p class="text-muted">Jika Anda tidak melakukan perubahan ini, segera hubungi administrator.</p>
                                </div>

                                <div class="mt-4">
                                    <a href="{{ route('homepage') }}" class="btn btn-primary btn-lg w-100">
                                        <i class="bx bx-home me-2"></i>Kembali ke Beranda
                                    </a>
                                </div>
                                
                                <p class="mt-4 text-muted">Terima kasih atas penggunaan layanan kami.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
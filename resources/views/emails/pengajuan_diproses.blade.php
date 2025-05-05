@extends('layouts.master-without-nav')
@section('title')
    Pengajuan Surat Diproses
@endsection
@section('css')
<link href="{{ URL::asset('build/css/email.pages.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <div class="status-icon info">
                                    <i class="bx bx-info-circle"></i>
                                </div>
                                <h4 class="page-title">Pengajuan Surat Diproses</h4>
                                <p class="page-subtitle">Informasi status pengajuan surat Anda.</p>
                            </div>
                            
                            <div class="alert alert-info" role="alert">
                                <i class="bx bx-info-circle"></i>
                                <span>Pengajuan surat Anda sedang dalam proses.</span>
                            </div>
                            
                            <div class="mt-3">
                                <p class="mb-3"><span class="fw-bold">Yth. Bapak/Ibu</span> {{ $nama_warga }},</p>
                                <p class="mb-3">
                                    Kami informasikan bahwa pengajuan surat Anda dengan detail sebagai berikut sedang dalam proses:
                                </p>
                                
                                <div class="detail-list mb-4">
                                    <div class="detail-item">
                                        <span class="detail-label">Jenis Surat:</span>
                                        <span class="detail-value">{{ $jenis_surat }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">Nomor Pengajuan:</span>
                                        <span class="detail-value">{{ $nomor_pengajuan }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">Tanggal Pengajuan:</span>
                                        <span class="detail-value">{{ $tanggal_pengajuan }}</span>
                                    </div>
                                </div>
                                
                                <p class="mb-2">
                                    Kami akan memberitahu Anda kembali setelah proses selesai. Mohon untuk menunggu pemberitahuan selanjutnya.
                                </p>
                            </div>
                            
                            <div class="signature-box">
                                <p>Terima kasih atas kesabaran Anda,<br>Tim Administrasi</p>
                            </div>
                            
                            <div class="mt-4 text-center">
                                <a href="{{ route('menu.warga') }}" class="btn btn-primary w-100">
                                    <i class="bx bx-menu me-2"></i>Kembali ke Menu Utama
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
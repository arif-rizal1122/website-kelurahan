@extends('layouts.master-without-nav')
@section('title')
    Pengajuan Surat Ditolak
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
                                <div class="status-icon danger">
                                    <i class="bx bx-x-circle"></i>
                                </div>
                                <h4 class="page-title text-danger">Pengajuan Surat Ditolak</h4>
                                <p class="page-subtitle">Informasi status pengajuan surat Anda.</p>
                            </div>
                            
                            <div class="alert alert-danger" role="alert">
                                <i class="bx bx-x-circle"></i>
                                <span>Pengajuan surat Anda telah ditolak.</span>
                            </div>
                            
                            <div class="mt-3">
                                <p class="mb-3"><span class="fw-bold">Yth. Bapak/Ibu</span> {{ $nama_warga }},</p>
                                <p class="mb-3">
                                    Kami informasikan bahwa pengajuan surat Anda dengan detail sebagai berikut telah ditolak:
                                </p>
                                
                                <div class="detail-list mb-4">
                                    <div class="detail-item">
                                        <span class="detail-label">Jenis Surat:</span>
                                        <span class="detail-value">{{ $jenis_surat }}</span>
                                    </div>
                                   
                                    <div class="detail-item">
                                        <span class="detail-label">Tanggal Pengajuan:</span>
                                        <span class="detail-value">{{ $tanggal_pengajuan }}</span>
                                    </div>
                                </div>
                                
                                <div class="reason-box">
                                    <p class="reason-title">Alasan Penolakan:</p>
                                    <p class="mb-0">{{ $keterangan_penolakan }}</p>
                                </div>
                                
                                <p class="mb-3">
                                    Anda dapat mengajukan surat kembali dengan memperbaiki kekurangan yang ada.
                                </p>
                            </div>
                            
                            <div class="signature-box">
                                <p>Hormat kami,<br>Tim Administrasi</p>
                            </div>
                            
                            <div class="mt-4 text-center">
                                <a href="{{ route('formulir.warga') }}" class="btn btn-primary w-100">
                                    <i class="bx bx-edit me-2"></i>Ajukan Surat Kembali
                                </a>
                                <p class="mt-3">
                                    <a href="{{ route('warga.login.form') }}" class="btn-link">
                                        <i class="bx bx-arrow-back me-1"></i>Kembali ke Menu Utama
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
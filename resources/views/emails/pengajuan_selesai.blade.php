@extends('layouts.master-without-nav')
@section('title')
    Pengajuan Surat Selesai
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
                                <div class="status-icon success">
                                    <i class="bx bx-check-circle"></i>
                                </div>
                                <h4 class="page-title text-success">Pengajuan Surat Selesai</h4>
                                <p class="page-subtitle">Informasi status pengajuan surat Anda.</p>
                            </div>
                            
                            <div class="alert alert-success" role="alert">
                                <i class="bx bx-check-circle"></i>
                                <span>Pengajuan surat Anda telah selesai diproses.</span>
                            </div>
                            
                            <div class="mt-3">
                                <p class="mb-3"><span class="fw-bold">Yth. Bapak/Ibu</span> {{ $nama_warga }},</p>
                                <p class="mb-3">
                                    Kami informasikan dengan hormat bahwa pengajuan surat Anda dengan detail sebagai berikut telah selesai diproses:
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
                                
                                <p class="mb-3">
                                    Anda dapat mengambil surat yang telah selesai di kantor kami pada jam kerja. Mohon membawa bukti pengajuan atau identitas diri.
                                </p>
                            </div>
                            
                            <div class="signature-box">
                                <p>Hormat kami,<br>Tim Administrasi Kelurahan/Desa</p>
                            </div>
                            
                            <div class="disclaimer-box">
                                <p class="mb-0">
                                    Ini adalah email pemberitahuan otomatis. Mohon tidak membalas email ini. Jika Anda memiliki pertanyaan, silakan hubungi kantor kami langsung.
                                </p>
                            </div>
                            
                            <div class="mt-4 text-center">
                                <a href="{{ route('warga.login.form') }}" class="btn btn-primary w-100">
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
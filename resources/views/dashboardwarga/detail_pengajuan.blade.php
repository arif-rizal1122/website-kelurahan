@extends('layouts.master-without-nav')
@section('title') Detail Pengajuan @endsection
@section('css')
<link rel="stylesheet" href="{{ URL::asset('build/css/sub.menu.pengajuan.surat.min.css') }}" rel="stylesheet" type="text/css">
<style>
    .animate__fadeIn {
        animation-duration: 0.5s;
        animation-name: fadeIn;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>
@endsection

@section('content')
<div class="page-header bg-light py-5 animate__animated animate__fadeIn">
    <div class="container">
        <div class="d-flex flex-column align-items-start">
            <a href="{{ route('warga.menu') }}" class="logo d-flex align-items-center mb-2 text-decoration-none">
                <img src="{{ URL::asset('assets/img/logo.png') }}" alt="" height="30" class="me-2">
                <h1 class="sitename text-primary fw-bold mb-0">SMART<b>LURAH</b></h1>
            </a>
            <p class="text-muted fw-semibold mb-0">Form Detail Pengajuab</p>
        </div>
    </div>
    </div>

    <div class="container py-4">
        <div class="card shadow-sm animate-fadeIn">
            <div class="card-header bg-primary text-white">
                <i class="bi bi-file-earmark-text me-2"></i> Detail Pengajuan
            </div>
            <div class="card-body p-4">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong class="text-muted">Jenis Surat:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $pengajuanSurat->jenisSurat->nama ?? '-' }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong class="text-muted">Tanggal Pengajuan:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $pengajuanSurat->tanggal_pengajuan->format('d-m-Y H:i') }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong class="text-muted">Keperluan:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $pengajuanSurat->keperluan ?? '-' }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong class="text-muted">Status:</strong>
                    </div>
                    <div class="col-md-9">
                        <span class="badge 
                            {{ $pengajuanSurat->status == \App\Enums\Status::DIAJUKAN ? 'bg-warning' : '' }}
                            {{ $pengajuanSurat->status == \App\Enums\Status::DIPROSES ? 'bg-info' : '' }}
                            {{ $pengajuanSurat->status == \App\Enums\Status::SELESAI ? 'bg-success' : '' }}
                            {{ $pengajuanSurat->status == \App\Enums\Status::DITOLAK ? 'bg-danger' : '' }}
                        ">
                            {{ $pengajuanSurat->status->value }}
                        </span>
                    </div>
                </div>
                @if ($pengajuanSurat->keterangan_penolakan)
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong class="text-muted">Keterangan Penolakan:</strong>
                        </div>
                        <div class="col-md-9">
                            {{ $pengajuanSurat->keterangan_penolakan }}
                        </div>
                    </div>
                @endif
                @if ($pengajuanSurat->file_pendukung)
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong class="text-muted">File Pendukung:</strong>
                        </div>
                        <div class="col-md-9">
                            <a href="{{ asset('storage/' . $pengajuanSurat->file_pendukung) }}" class="btn btn-sm btn-outline-secondary" target="_blank"><i class="bi bi-file-earmark-arrow-down me-1"></i> Lihat File</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
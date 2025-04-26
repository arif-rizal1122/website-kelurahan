@extends('layouts.master')
@section('title') Detail Surat Keluar @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Surat @endslot
        @slot('title') Detail Surat Keluar @endslot
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-envelope font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">Detail Surat Keluar</h4>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <div class="p-3 bg-light rounded mb-3">
                            <div class="d-flex justify-content-between">
                                <span class="badge bg-success">No. {{ $surat->nomor_surat ?? '-' }}</span>
                                <span class="badge bg-info">Kode: {{ $surat->kode_surat ?? '-' }}</span>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-success" style="width: 30%;">
                                            <i class="bx bx-user me-2"></i>Dari
                                        </td>
                                        <td class="text-primary">{{ $surat->dari ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-success">
                                            <i class="bx bx-send me-2"></i>Tujuan
                                        </td>
                                        <td class="text-primary">{{ $surat->tujuan ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-success">
                                            <i class="bx bx-calendar me-2"></i>Tanggal Surat
                                        </td>
                                        <td class="text-primary">
                                            @if($surat->tanggal_surat)
                                                <span class="badge bg-soft-success text-success">
                                                    {{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d F Y') }}
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-success">
                                            <i class="bx bx-paper-plane me-2"></i>Tanggal Pengiriman
                                        </td>
                                        <td class="text-primary">
                                            @if($surat->tanggal_pengiriman)
                                                <span class="badge bg-soft-info text-info">
                                                    {{ \Carbon\Carbon::parse($surat->tanggal_pengiriman)->format('d F Y') }}
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-success">
                                            <i class="bx bx-check-circle me-2"></i>Tanggal Diterima
                                        </td>
                                        <td class="text-primary">
                                            @if($surat->tanggal_diterima)
                                                <span class="badge bg-soft-warning text-warning">
                                                    {{ \Carbon\Carbon::parse($surat->tanggal_diterima)->format('d F Y') }}
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bx bx-file-blank me-2"></i>Isi Surat</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-muted">{{ $surat->isi_surat ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bx bx-notepad me-2"></i>Ringkasan</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-muted">{{ $surat->ringkasan ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bx bx-comment-detail me-2"></i>Catatan</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-muted">{{ $surat->catatan ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    @if ($surat->attachments->isNotEmpty())
                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bx bx-paperclip me-2"></i>Lampiran</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($surat->attachments as $attachment)
                                    <div class="col-md-6 mb-2">
                                        <div class="p-2 border rounded d-flex align-items-center">
                                            <i class="bx bxs-file-pdf text-danger font-size-24 me-2"></i>
                                            <a href="{{ asset('storage/' . $attachment->path) }}"
                                               class="text-reset text-decoration-none stretched-link"
                                               target="_blank">
                                                {{ $attachment->filename }}
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row mt-4 align-items-center gy-2">
                        <div class="col-12 col-md-auto">
                            <a href="{{ route('surat-keluar.index') }}" class="btn btn-secondary w-100">
                                <i class="bx bx-arrow-back me-1"></i> Kembali
                            </a>
                        </div>
                        <div class="col-12 col-md d-flex justify-content-md-end gap-2 flex-wrap">
                            <a href="{{ route('surat-keluar.edit', $surat->id) }}" class="btn btn-warning">
                                <i class="bx bx-edit me-1"></i> Edit
                            </a>
                            <button type="button" class="btn btn-primary" onclick="window.print()">
                                <i class="bx bx-printer me-1"></i> Cetak
                            </button>
                        </div>
                    </div> 
                                        
                </div>
            </div>
        </div>
    </div>
@endsection



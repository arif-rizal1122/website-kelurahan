@extends('layouts.master')
@section('title')
    Detail Pengajuan Surat
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Surat
        @endslot
        @slot('title')
            Detail Pengajuan Surat
        @endslot
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-info text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-file-text font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">Detail Pengajuan Surat</h4>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <div class="p-3 bg-light rounded mb-3">
                            <div class="d-flex justify-content-between">
                                <span class="badge bg-info">ID: {{ $pengajuanSurat->id }}</span>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-borderless table-hover">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-info" style="width: 30%;">
                                            <i class="bx bx-user me-2"></i>Warga
                                        </td>
                                        <td class="text-info">{{ $pengajuanSurat->warga->nama ?? '-' }} (NIK: {{ $pengajuanSurat->warga->nik ?? '-' }})</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-file me-2"></i>Jenis Surat
                                        </td>
                                        <td class="text-info">{{ $pengajuanSurat->jenisSurat->nama ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-calendar me-2"></i>Tanggal Pengajuan
                                        </td>
                                        <td class="text-info">{{ $pengajuanSurat->tanggal_pengajuan ? $pengajuanSurat->tanggal_pengajuan->format('d-m-Y') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-note me-2"></i>Keperluan
                                        </td>
                                        <td class="text-info">{{ $pengajuanSurat->keperluan ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-label me-2"></i>Status
                                        </td>
                                        <td class="text-info">
                                            @if ($pengajuanSurat->status)
                                                @php
                                                    $statusClass = '';
                                                    switch ($pengajuanSurat->status->value) {
                                                        case \App\Enums\Status::DIAJUKAN->value:
                                                            $statusClass = 'info';
                                                            break;
                                                        case \App\Enums\Status::DIPROSES->value:
                                                            $statusClass = 'warning';
                                                            break;
                                                        case \App\Enums\Status::SELESAI->value:
                                                            $statusClass = 'success';
                                                            break;
                                                        case \App\Enums\Status::DITOLAK->value:
                                                            $statusClass = 'danger';
                                                            break;
                                                        default:
                                                            $statusClass = 'secondary'; // Untuk status yang tidak terdefinisi
                                                            break;
                                                    }
                                                @endphp
                                                <span class="badge bg-{{ $statusClass }}">{{ $pengajuanSurat->status->name }}</span>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-calendar-check me-2"></i>Tanggal Diproses
                                        </td>
                                        <td class="text-info">{{ $pengajuanSurat->tanggal_diproses ? $pengajuanSurat->tanggal_diproses->format('d-m-Y') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-user-check me-2"></i>Diproses Oleh
                                        </td>
                                        <td class="text-info">{{ $pengajuanSurat->user->name ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-calendar-check me-2"></i>Tanggal Selesai
                                        </td>
                                        <td class="text-info">{{ $pengajuanSurat->tanggal_selesai ? $pengajuanSurat->tanggal_selesai->format('d-m-Y') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-message-alt-error me-2"></i>Keterangan Penolakan
                                        </td>
                                        <td class="text-info">{{ $pengajuanSurat->keterangan_penolakan ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-file-pdf me-2"></i>File Pendukung
                                        </td>
                                        <td class="text-info">
                                            @if ($pengajuanSurat->file_pendukung)
                                                <a href="{{ asset('storage/' . $pengajuanSurat->file_pendukung) }}" target="_blank">
                                                    Lihat File
                                                </a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-4 align-items-center gy-2">
                        <div class="col-12 col-md-auto">
                            <a href="{{ route('pengajuan-surat.index') }}" class="btn btn-secondary w-100">
                                <i class="bx bx-arrow-back me-1"></i> Kembali
                            </a>
                        </div>
                        @if (Auth::user()->role === 'admin')
                        <div class="col-12 col-md d-flex justify-content-md-end gap-2 flex-wrap">
                            <a href="{{ route('pengajuan-surat.edit', $pengajuanSurat->id) }}" class="btn btn-warning">
                                <i class="bx bx-edit me-1"></i> Edit
                            </a>
                        </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
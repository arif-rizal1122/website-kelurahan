@extends('layouts.master')
@section('title')  Detail Penduduk @endsection
@section('content')
@section('css')
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
    @component('components.breadcrumb')
        @slot('li_1') Penduduk @endslot
        @slot('title') Detail Penduduk @endslot
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-user-circle font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">Detail Penduduk</h4>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <div class="p-3 bg-light rounded mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary fs-6 px-3 py-2">NIK: {{ $penduduk->nik ?? '-' }}</span>
                                <div>
                                    @if($penduduk->ktp_el)
                                        <span class="badge bg-success">KTP Elektronik</span>
                                    @else
                                        <span class="badge bg-warning">Non KTP-El</span>
                                    @endif
                                    
                                    
                                </div>
                            </div>
                        </div>
                        
                        <!-- Data Pribadi -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bx bx-user me-2"></i>Data Pribadi</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-hover">
                                        <tbody>
                                            <tr>
                                                <td class="fw-bold text-primary" style="width: 30%;">
                                                    <i class="bx bx-user-voice me-2"></i>Nama Lengkap
                                                </td>
                                                <td class="text-primary">{{ $penduduk->nama ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-envelope me-2"></i>Email
                                                </td>
                                                <td class="text-primary">{{ $penduduk->email ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-male-female me-2"></i>Jenis Kelamin
                                                </td>
                                                <td class="text-primary">
                                                    @if($penduduk->jenis_kelamin)
                                                        <span class="badge {{ $penduduk->jenis_kelamin === 'Laki-laki' ? 'bg-soft-primary text-primary' : 'bg-soft-danger text-danger' }}">
                                                            {{ $penduduk->jenis_kelamin }}
                                                        </span>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-map-pin me-2"></i>Tempat Lahir
                                                </td>
                                                <td class="text-primary">{{ $penduduk->tempat_lahir ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-calendar me-2"></i>Tanggal Lahir
                                                </td>
                                                <td class="text-primary">
                                                    @if($penduduk->tanggal_lahir)
                                                        <span class="badge bg-soft-success text-success">
                                                            {{ \Carbon\Carbon::parse($penduduk->tanggal_lahir)->format('d F Y') }}
                                                            ({{ \Carbon\Carbon::parse($penduduk->tanggal_lahir)->age }} tahun)
                                                        </span>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-church me-2"></i>Agama
                                                </td>
                                                <td class="text-primary">{{ $penduduk->agama ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-heart me-2"></i>Status Perkawinan
                                                </td>
                                                <td class="text-primary">{{ $penduduk->status_kawin ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-flag me-2"></i>Kewarganegaraan
                                                </td>
                                                <td class="text-primary">{{ $penduduk->warga_negara ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-droplet me-2"></i>Golongan Darah
                                                </td>
                                                <td class="text-primary">{{ $penduduk->golongan_darah ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-group me-2"></i>Suku
                                                </td>
                                                <td class="text-primary">{{ $penduduk->suku ?? '-' }}</td>
                                            </tr>
                                            <tr>   
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-group me-2"></i>Status Keadaan
                                                </td>
                                                <td class="text-primary">{{ $penduduk->status_keadaan ?? '-' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Informasi Pendidikan & Pekerjaan -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bx bx-book-open me-2"></i>Pendidikan & Pekerjaan</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-hover">
                                        <tbody>
                                            <tr>
                                                <td class="fw-bold text-primary" style="width: 30%;">
                                                    <i class="bx bx-library me-2"></i>Pendidikan Terakhir
                                                </td>
                                                <td class="text-primary">{{ $penduduk->pendidikan_terakhir ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-briefcase me-2"></i>Pekerjaan
                                                </td>
                                                <td class="text-primary">{{ $penduduk->pekerjaan ?? '-' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Informasi Alamat -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bx bx-home me-2"></i>Informasi Alamat</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-hover">
                                        <tbody>
                                            <tr>
                                                <td class="fw-bold text-primary" style="width: 30%;">
                                                    <i class="bx bx-current-location me-2"></i>Alamat Sekarang
                                                </td>
                                                <td class="text-primary">{{ $penduduk->alamat_sekarang ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-history me-2"></i>Alamat Sebelumnya
                                                </td>
                                                <td class="text-primary">{{ $penduduk->alamat_sebelumnya ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-id-card me-2"></i>Hubungan dalam Kartu Keluarga
                                                </td>
                                                <td class="text-primary">{{ $penduduk->hubungan_warga ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-card me-2"></i>No KK Sebelumnya
                                                </td>
                                                <td class="text-primary">{{ $penduduk->no_kk_sebelumnya ?? '-' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Informasi Keluarga -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bx bx-family me-2"></i>Data Keluarga</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-hover">
                                        <tbody>
                                            <tr>
                                                <td class="fw-bold text-primary" style="width: 30%;">
                                                    <i class="bx bx-male me-2"></i>Nama Ayah
                                                </td>
                                                <td class="text-primary">{{ $penduduk->nama_ayah ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-id-card me-2"></i>NIK Ayah
                                                </td>
                                                <td class="text-primary">{{ $penduduk->ayah_nik ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-female me-2"></i>Nama Ibu
                                                </td>
                                                <td class="text-primary">{{ $penduduk->nama_ibu ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-id-card me-2"></i>NIK Ibu
                                                </td>
                                                <td class="text-primary">{{ $penduduk->ibu_nik ?? '-' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Informasi KTP -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bx bx-credit-card me-2"></i>Informasi KTP</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-hover">
                                        <tbody>
                                            <tr>
                                                <td class="fw-bold text-primary" style="width: 30%;">
                                                    <i class="bx bx-check-shield me-2"></i>Status Rekam
                                                </td>
                                                <td class="text-primary">{{ $penduduk->status_rekam ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-map me-2"></i>Tempat Cetak KTP
                                                </td>
                                                <td class="text-primary">{{ $penduduk->tempat_cetak_ktp ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">
                                                    <i class="bx bx-calendar-check me-2"></i>Tanggal Cetak KTP
                                                </td>
                                                <td class="text-primary">
                                                    @if($penduduk->tanggal_cetak_ktp)
                                                        <span class="badge bg-soft-info text-info">
                                                            {{ \Carbon\Carbon::parse($penduduk->tanggal_cetak_ktp)->format('d F Y') }}
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
                        </div>
                        
                        <!-- Catatan -->
                        @if($penduduk->note)
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bx bx-notepad me-2"></i>Catatan</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-muted">{{ $penduduk->note ?? '-' }}</p>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="row mt-4 align-items-center gy-2">
                        <div class="col-12 col-md-auto">
                            <a href="{{ route('penduduk.index') }}" class="btn btn-secondary w-100">
                                <i class="bx bx-arrow-back me-1"></i> Kembali
                            </a>
                        </div>
                        <div class="col-12 col-md d-flex justify-content-md-end gap-2 flex-wrap">
                            <a href="{{ route('penduduk.edit', $penduduk->id) }}" class="btn btn-warning">
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


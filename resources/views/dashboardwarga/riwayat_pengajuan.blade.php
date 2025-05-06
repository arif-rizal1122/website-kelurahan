@extends('layouts.master-without-nav')
@section('title') Riwayat Pengajuan @endsection
@section('css')
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('build/css/sub.menu.pengajuan.surat.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="page-header animate-fadeIn">
        <a href="{{ route('warga.menu') }}" class="back-button">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h1>
            <a href="{{ route('warga.menu') }}">Riwayat Pengajuan</a>
        </h1>
        <p class="text-black">Pantau status pengajuan surat Anda</p>
    </div>

    <div class="container py-4">
        {{-- <div class="content-card mb-4 animate-fadeIn">
            <div class="card-title">
                <i class="bi bi-funnel"></i> Filter Pengajuan
            </div>
            <div class="row g-3">
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control border-0 bg-light" placeholder="Cari berdasarkan nomor pengajuan">
                    </div>
                </div>
                <div class="col-md-4">
                    <select class="form-select bg-light border-0">
                        <option selected>Semua Status</option>
                        <option value="{{ \App\Enums\Status::DIAJUKAN->value }}">Diajukan</option>
                        <option value="{{ \App\Enums\Status::DIPROSES->value }}">Diproses</option>
                        <option value="{{ \App\Enums\Status::SELESAI->value }}">Selesai</option>
                        <option value="{{ \App\Enums\Status::DITOLAK->value }}">Ditolak</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select bg-light border-0">
                        <option selected>Semua Jenis Surat</option>
                        @if(isset($jenisSurats))
                            @foreach($jenisSurats as $jenis)
                                <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div> --}}

        <div class="content-card animate-fadeIn">
            <div class="card-title">
                <i class="bi bi-clock-history"></i> Daftar Pengajuan
            </div>

            @if(count($pengajuans ?? []) > 0)
                @foreach($pengajuans ?? [] as $pengajuan)
                @php
                    $statusClass = '';
                    switch ($pengajuan->status) {
                        case \App\Enums\Status::DIAJUKAN:
                            $statusClass = 'status-menunggu'; // Sesuaikan dengan kelas CSS yang Anda inginkan untuk status "diajukan"
                            break;
                        case \App\Enums\Status::DIPROSES:
                            $statusClass = 'status-diproses';
                            break;
                        case \App\Enums\Status::SELESAI:
                            $statusClass = 'status-selesai';
                            break;
                        case \App\Enums\Status::DITOLAK:
                            $statusClass = 'status-ditolak';
                            break;
                        default:
                            $statusClass = 'status-default';
                            break;
                    }
                @endphp
                <div class="pengajuan-item {{ $statusClass }}">
                    <div class="row align-items-center">
                        <div class="col-lg-5 mb-2 mb-lg-0">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <div class="d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background-color: rgba(78, 115, 223, 0.1); border-radius: 10px;">
                                        <i class="bi bi-file-earmark-text text-primary" style="font-size: 1.2rem;"></i>
                                    </div>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold">{{ $pengajuan->jenisSurat->nama ?? 'Jenis Surat Tidak Diketahui' }}</h6>
                                    <small class="text-muted">No. Pengajuan: #{{ strtoupper(str_replace(' ', '', $pengajuan->jenisSurat->nama ?? '')) }}-{{ $pengajuan->tanggal_pengajuan->format('Ymd') }}-{{ $pengajuan->id }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 mb-2 mb-lg-0">
                            <small class="text-muted d-block">Tanggal Pengajuan</small>
                            <span>{{ $pengajuan->tanggal_pengajuan->format('d M Y') }}</span>
                        </div>
                        <div class="col-lg-2 mb-2 mb-lg-0">
                            <span class="status-badge {{ $statusClass }}">{{ $pengajuan->status->value }}</span>
                        </div>
                        <div class="col-lg-3 text-end">
                            <a href="{{ route('warga.pengajuan-surat.show', $pengajuan->id) }}" class="btn btn-sm btn-primary">Detail</a>
                            @if ($pengajuan->status == \App\Enums\Status::SELESAI)
                                {{-- <a href="{{ route('warga.pengajuan-surat.print', $pengajuan->id) }}" class="btn btn-sm btn-success">Unduh</a> --}}
                            @elseif ($pengajuan->status == \App\Enums\Status::DITOLAK)
                                <a href="#" class="btn btn-sm btn-danger">Ajukan Ulang</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="empty-state">
                    <i class="bi bi-inbox"></i>
                    <h4>Belum Ada Pengajuan</h4>
                    <p>Anda belum melakukan pengajuan surat apapun.</p>
                    <a href="{{ route('warga.formulir') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i> Buat Pengajuan Baru
                    </a>
                </div>
            @endif

            {{-- <nav aria-label="Navigasi riwayat" class="mt-4">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav> --}}
        </div>

    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script>
        // Script untuk filter (jika Anda mengimplementasikannya)
        $(document).ready(function() {
            $('select').on('change', function() {
                // Implementasikan logika filter Anda di sini
                console.log($(this).val());
            });

            $('input[type="text"]').on('keyup', function() {
                // Implementasikan logika pencarian Anda di sini
                console.log($(this).val());
            });
        });
    </script>
@endsection
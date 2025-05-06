@extends('layouts.master-without-nav')
@section('title') Notifikasi @endsection
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
            <a href="{{ route('warga.menu') }}">Notifikasi</a>
        </h1>
        <p class="text-black">Riwayat dan status pengajuan surat Anda</p>
    </div>

    <div class="container py-4">
        <div class="content-card mb-4 animate-fadeIn">
            <div class="card-title d-flex justify-content-between align-items-center">
                <div>
                    <i class="bi bi-funnel"></i> Filter Status & Waktu
                </div>
                <div>
                    </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-12 col-md-6">
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-outline-primary {{ !$jenisFilter ? 'active' : '' }}" onclick="filterStatus('')">Semua Status</button>
                        <button type="button" class="btn btn-outline-primary {{ $jenisFilter == \App\Enums\Status::DIAJUKAN ? 'active' : '' }}" onclick="filterStatus('{{ \App\Enums\Status::DIAJUKAN }}')">{{ \App\Enums\Status::DIAJUKAN->value }}</button>
                        <button type="button" class="btn btn-outline-primary {{ $jenisFilter == \App\Enums\Status::DIPROSES ? 'active' : '' }}" onclick="filterStatus('{{ \App\Enums\Status::DIPROSES }}')">{{ \App\Enums\Status::DIPROSES->value }}</button>
                        <button type="button" class="btn btn-outline-primary {{ $jenisFilter == \App\Enums\Status::SELESAI ? 'active' : '' }}" onclick="filterStatus('{{ \App\Enums\Status::SELESAI }}')">{{ \App\Enums\Status::SELESAI->value }}</button>
                        <button type="button" class="btn btn-outline-primary {{ $jenisFilter == \App\Enums\Status::DITOLAK ? 'active' : '' }}" onclick="filterStatus('{{ \App\Enums\Status::DITOLAK }}')">{{ \App\Enums\Status::DITOLAK->value }}</button>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-3 mt-md-0">
                    <select class="form-select bg-light border-0" name="waktu" onchange="this.form.submit()">
                        <option value="" {{ !$waktuFilter ? 'selected' : '' }}>Semua Waktu</option>
                        <option value="Hari Ini" {{ $waktuFilter == 'Hari Ini' ? 'selected' : '' }}>Hari Ini</option>
                        <option value="Minggu Ini" {{ $waktuFilter == 'Minggu Ini' ? 'selected' : '' }}>Minggu Ini</option>
                        <option value="Bulan Ini" {{ $waktuFilter == 'Bulan Ini' ? 'selected' : '' }}>Bulan Ini</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="content-card animate-fadeIn">
            <div class="card-title">
                <i class="bi bi-bell"></i> Riwayat Pengajuan Surat
            </div>

            @forelse ($pengajuans as $pengajuan)
                <div class="notification-item {{-- Tambahkan logika untuk menandai belum dibaca jika diperlukan --}}">
                    <div class="notification-time">
                        <i class="bi bi-clock me-1"></i> {{ $pengajuan->created_at->format('d M Y, H:i') }}
                    </div>
                    <h6 class="notification-title">Pengajuan Surat: {{ $pengajuan->jenisSurat->nama }}</h6>
                    <p class="notification-content">
                        Nomor Pengajuan: <strong>#{{ $pengajuan->id }}</strong><br>
                        Status: <strong>{{ $pengajuan->status->value }}</strong>
                        @if ($pengajuan->keterangan_penolakan)
                            <br>Alasan Penolakan: {{ $pengajuan->keterangan_penolakan }}
                        @endif
                    </p>
                    <div class="mt-2">
                        <a href="{{ route('warga.pengajuan-surat.show', $pengajuan->id) }}" class="btn btn-sm btn-outline-primary">
                            Lihat Detail
                        </a>
                        @if ($pengajuan->status == \App\Enums\Status::SELESAI && $pengajuan->jenisSurat->template_surat)
                            {{-- <a href="#" class="btn btn-sm btn-success">
                                <i class="bi bi-download me-1"></i> Unduh Surat
                            </a> --}}
                        @elseif ($pengajuan->status == \App\Enums\Status::DITOLAK)
                            <a href="{{ route('warga.formulir') }}" class="btn btn-sm btn-danger">
                                Ajukan Ulang
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <p>Tidak ada riwayat pengajuan surat.</p>
            @endforelse

            <nav aria-label="Navigasi pengajuan" class="mt-4">
                {{ $pengajuans->links() }}
            </nav>
        </div>
    </div>
    <form id="filterForm" method="GET" action="{{ route('warga.notifikasi') }}" style="display: none;">
        @csrf
        <input type="hidden" name="jenis" id="filterJenis" value="{{ $jenisFilter }}">
        <input type="hidden" name="waktu" value="{{ $waktuFilter }}">
    </form>
    <script>
        function filterStatus(status) {
            document.getElementById('filterJenis').value = status;
            document.getElementById('filterForm').submit();
        }
    </script>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
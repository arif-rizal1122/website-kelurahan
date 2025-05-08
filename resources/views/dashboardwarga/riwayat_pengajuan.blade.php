@extends('layouts.master-without-nav')
@section('title') Riwayat Pengajuan @endsection
@section('css')
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('build/css/sub.menu.pengajuan.surat.min.css') }}" rel="stylesheet" type="text/css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                <img src="assets/img/logo.png" alt="" height="30" class="me-2">
                <h1 class="sitename text-primary fw-bold mb-0">SMART<b>LURAH</b></h1>
            </a>
            <p class="text-muted fw-semibold mb-0">Form Riwayat Pengajuan</p>
        </div>
    </div>
    </div>

<div class="container py-4">
    <div class="content-card mb-4 animate-fadeIn">
        <div class="card-title d-flex justify-content-between align-items-center">
            <div>
                <i class='bx bx-filter'></i> Filter Status & Waktu
            </div>
            <div></div>
        </div>
        <div class="row g-3 align-items-center">
            <div class="col-12 col-md-auto">
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-outline-primary {{ !$statusFilter ? 'active' : '' }}" onclick="filterStatus('')">
                        Semua Status <span class="badge bg-secondary">{{ $jumlahSemua }}</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary {{ $statusFilter == \App\Enums\Status::DIAJUKAN ? 'active' : '' }}" onclick="filterStatus('{{ \App\Enums\Status::DIAJUKAN }}')">
                        {{ \App\Enums\Status::DIAJUKAN->value }} <span class="badge bg-info">{{ $jumlahDiajukan }}</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary {{ $statusFilter == \App\Enums\Status::DIPROSES ? 'active' : '' }}" onclick="filterStatus('{{ \App\Enums\Status::DIPROSES }}')">
                        {{ \App\Enums\Status::DIPROSES->value }} <span class="badge bg-warning">{{ $jumlahDiproses }}</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary {{ $statusFilter == \App\Enums\Status::SELESAI ? 'active' : '' }}" onclick="filterStatus('{{ \App\Enums\Status::SELESAI }}')">
                        {{ \App\Enums\Status::SELESAI->value }} <span class="badge bg-success">{{ $jumlahSelesai }}</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary {{ $statusFilter == \App\Enums\Status::DITOLAK ? 'active' : '' }}" onclick="filterStatus('{{ \App\Enums\Status::DITOLAK }}')">
                        {{ \App\Enums\Status::DITOLAK->value }} <span class="badge bg-danger">{{ $jumlahDitolak }}</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-auto">
                <form id="filterForm" method="GET">
                    @if($statusFilter)
                        <input type="hidden" name="status" value="{{ $statusFilter }}">
                    @endif
                    <select class="form-select bg-light border-0" name="waktu" onchange="document.getElementById('filterForm').submit();">
                        <option value="" {{ !$waktuFilter ? 'selected' : '' }}>Semua Waktu</option>
                        <option value="Hari Ini" {{ $waktuFilter == 'Hari Ini' ? 'selected' : '' }}>Hari Ini</option>
                        <option value="Minggu Ini" {{ $waktuFilter == 'Minggu Ini' ? 'selected' : '' }}>Minggu Ini</option>
                        <option value="Bulan Ini" {{ $waktuFilter == 'Bulan Ini' ? 'selected' : '' }}>Bulan Ini</option>
                    </select>
                </form>
            </div>
        </div>
    </div>

    <div class="content-card animate-fadeIn">
        <div class="card-title">
            <i class="bi bi-clock-history"></i> Riwayat Pengajuan Surat
        </div>

        @forelse ($pengajuans as $pengajuan)
            <div class="notification-item">
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
                        {{-- Unduh tombol --}}
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

<form id="filterForm" method="GET" action="{{ route('warga.riwayat') }}" style="display: none;">
    @csrf
    <input type="hidden" name="status" id="filterStatus" value="{{ $statusFilter }}">
    <input type="hidden" name="waktu" value="{{ $waktuFilter }}">
</form>

<script>
    function filterStatus(status) {
        const currentUrl = new URL(window.location.href);
        currentUrl.searchParams.set('status', status);
        window.location.href = currentUrl.toString();
    }
</script>
@endsection

@section('script')
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

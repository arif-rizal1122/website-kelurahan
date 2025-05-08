@extends('layouts.master-without-nav')
@section('title') Profil Saya @endsection
@section('css')
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />
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
                    <img src="assets/img/logo.png" alt="" height="30" class="me-2">
                    <h1 class="sitename text-primary fw-bold mb-0">SMART<b>LURAH</b></h1>
                </a>
                <p class="text-muted fw-semibold mb-0">Form Profile Warga</p>
            </div>
        </div>
        </div>

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <!-- Kartu Profil Ringkas -->
                <div class="content-card text-center animate-fadeIn">
                    <div class="profile-avatar">
                        <img src="{{ URL::asset('build/images/job-profile2.png') }}" alt="Avatar" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                    </div>
                    <h5 class="mb-1">{{ auth()->user()->nama ?? 'Nama Pengguna' }}</h5>
                    <p class="text-muted">NIK: {{ auth()->user()->nik ?? '123456789' }}</p>
                    
                    {{-- <div class="d-grid gap-2 mt-3">
                        <button type="button" class="btn edit-button">
                            <i class="bi bi-pencil-square me-1"></i> Edit Profil
                        </button>
                        <button type="button" class="btn btn-outline-primary">
                            <i class="bi bi-shield-lock me-1"></i> Ubah Kata Sandi
                        </button>
                    </div> --}}
                    
                    <hr class="my-4">
                    
                    <div class="text-start">
                        <div class="d-flex align-items-center mb-3">
                            <div class="d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background-color: rgba(78, 115, 223, 0.1); border-radius: 10px;">
                                <i class="bi bi-envelope text-primary"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Email</small>
                                <span>{{ auth()->user()->email ?? 'email@example.com' }}</span>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background-color: rgba(78, 115, 223, 0.1); border-radius: 10px;">
                                <i class="bi bi-check-circle text-primary"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Status Verifikasi</small>
                                <span class="text-success">
                                    <i class="bi bi-patch-check-fill me-1"></i> Terverifikasi
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-8">
                <!-- Informasi Detail Profil -->
                <div class="content-card animate-fadeIn">
                    <div class="card-title">
                        <i class="bi bi-person-circle"></i> Informasi Pribadi
                    </div>
                    
                    <div class="profile-info">
                        <div class="profile-field">
                            <label>Nama Lengkap</label>
                            <p>{{ auth()->user()->nama ?? 'Nama Lengkap Pengguna' }}</p>
                        </div>
                        
                        <div class="profile-field">
                            <label>NIK</label>
                            <p>{{ auth()->user()->nik ?? '123456789012345' }}</p>
                        </div>
                        
                        <div class="profile-field">
                            <label>Alamat</label>
                            <p>{{ auth()->user()->alamat ?? 'Jl. Contoh No. 123, RT 001/RW 002, Kelurahan Contoh, Kecamatan Contoh, Kota Contoh, Provinsi Contoh' }}</p>
                        </div>
                        
                        <div class="profile-field">
                            <label>Email</label>
                            <p>{{ auth()->user()->email ?? 'email@example.com' }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Form Edit Profil (Default hidden) -->
                <div class="content-card mt-4 animate-fadeIn" id="editProfileForm" style="display: none;">
                    <div class="card-title">
                        <i class="bi bi-pencil-square"></i> Edit Informasi Pribadi
                    </div>
                    
                    {{-- <form action="{{ route('warga.profile.update') }}" method="POST">
                        @csrf
                        @method('PUT') --}}
                        
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ auth()->user()->nama ?? '' }}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ auth()->user()->alamat ?? '' }}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email ?? '' }}">
                        </div>
                        
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-secondary" id="cancelEdit">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    {{-- </form> --}}
                </div>

                <!-- Riwayat Aktivitas -->
                <div class="content-card mt-4 animate-fadeIn">
                    <div class="card-title">
                        <i class="bi bi-activity"></i> Aktivitas Terbaru
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Jenis Surat</th>
                                    <th>Keperluan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($latestActivities as $activity)
                                    <tr>
                                        <td>{{ $activity->tanggal_pengajuan->format('d M Y') }}</td>
                                        <td>{{ $activity->jenisSurat->nama ?? '-' }}</td>
                                        <td>{{ $activity->keperluan }}</td>
                                        <td>
                                            @if ($activity->status == \App\Enums\Status::DIPROSES)
                                                <span class="badge bg-primary">Diproses</span>
                                            @elseif ($activity->status == \App\Enums\Status::SELESAI)
                                                <span class="badge bg-success">Selesai</span>
                                            @elseif ($activity->status == \App\Enums\Status::DITOLAK)
                                                <span class="badge bg-danger">Ditolak</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $activity->status->value }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" class="text-center">Tidak ada aktivitas terbaru.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        // Script untuk menangani tampilan edit profil
        document.addEventListener('DOMContentLoaded', function() {
            const editButton = document.querySelector('.edit-button');
            const editForm = document.getElementById('editProfileForm');
            const cancelButton = document.getElementById('cancelEdit');
            
            if (editButton && editForm && cancelButton) {
                editButton.addEventListener('click', function() {
                    editForm.style.display = 'block';
                    editButton.parentElement.scrollIntoView({ behavior: 'smooth' });
                });
                
                cancelButton.addEventListener('click', function() {
                    editForm.style.display = 'none';
                });
            }
        });
    </script>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
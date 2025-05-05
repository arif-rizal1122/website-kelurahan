@extends('layouts.master')
@section('title')
    Profile Pengguna
@endsection
@section('css')

@endsection
@section('content')
    <div class="container-fluid">
        <!-- Profile Header -->
        <div class="profile-header mb-4">
            <img src="{{ URL::asset('build/images/profile-bg.jpg') }}" class="img-fluid w-100 h-100 object-fit-cover" alt="Profile Background" style="object-position: center;">
            <div class="profile-header-overlay">
                <div class="upload-trigger">
                    <input id="profile-foreground-img-file-input" type="file" class="d-none">
                    <label for="profile-foreground-img-file-input" class="mb-0">
                        <i class="ri-image-edit-line me-1"></i> Change Cover Photo
                    </label>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left Column - User Profile -->
            <div class="col-lg-4 mb-4">
                <!-- Profile Card -->
                <div class="profile-info-card card mb-4">
                    <div class="card-body text-center pt-4">
                        <div class="d-flex flex-column align-items-center">
                            <div class="position-relative mb-3">
                                <div class="profile-avatar mx-auto">
                                    <img src="@if (Auth::user()->avatar) {{ asset('storage/' . Auth::user()->avatar) }}@else{{ asset('build/images/users/avatar-1.jpg') }} @endif"
                                        class="img-fluid rounded-circle w-100 h-100 object-fit-cover" alt="Profile Image">
                                    <div class="profile-avatar-badge">
                                        <i class="ri-checkbox-circle-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <h4 class="fw-bold mb-1">{{ Auth::user()->name }}</h4>
                            <p class="text-muted mb-2">{{ Auth::user()->jabatan }}</p>
                            <span class="user-badge bg-primary bg-opacity-10 text-primary mb-3">{{ Auth::user()->role }}</span>
                            
                            <div class="d-flex gap-2 mt-2">
                                <button class="btn btn-sm btn-primary">
                                    <i class="ri-edit-2-line me-1"></i> Edit Profile
                                </button>
                                <button class="btn btn-sm btn-outline-secondary">
                                    <i class="ri-settings-4-line me-1"></i> Settings
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information Card -->
                <div class="profile-info-card card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h5 class="card-title mb-0 fw-bold">Contact Information</h5>
                            <a href="javascript:void(0);" class="btn btn-sm btn-light">
                                <i class="ri-edit-line me-1"></i> Edit
                            </a>
                        </div>
                        
                        <div class="contact-info-item">
                            <div class="contact-info-icon bg-primary bg-opacity-10 text-primary">
                                <i class="ri-mail-line fs-4"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1 small">Email Address</p>
                                <h6 class="mb-0">{{ Auth::user()->email }}</h6>
                            </div>
                        </div>
                        
                        <div class="contact-info-item">
                            <div class="contact-info-icon bg-success bg-opacity-10 text-success">
                                <i class="ri-phone-line fs-4"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1 small">Phone Number</p>
                                <h6 class="mb-0">+62812345678</h6>
                            </div>
                        </div>
                        
                        <div class="contact-info-item mb-0">
                            <div class="contact-info-icon bg-info bg-opacity-10 text-info">
                                <i class="ri-map-pin-line fs-4"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1 small">Office Address</p>
                                <h6 class="mb-0">Kantor Desa, Kec. {{ $config->nama_kecamatan ?? '-' }}, {{ $config->nama_kabupaten ?? '-' }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Profile Details -->
            <div class="col-lg-8">
                <div class="profile-info-card card">
                    <div class="card-header bg-transparent border-bottom-0 pb-0">
                        <ul class="nav nav-tabs-custom nav-tabs gap-3 border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#commonDetails" role="tab">
                                    <i class="ri-information-line me-1 align-middle"></i>General Info
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#pengunaUser" role="tab">
                                    <i class="ri-user-3-line me-1 align-middle"></i>User Details
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <!-- General Information Tab -->
                            <div class="tab-pane fade" id="commonDetails" role="tabpanel">
                                <form action="{{ route('config.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="nama_desa" class="form-control @error('nama_desa') is-invalid @enderror"
                                                    id="namaDesaInput" placeholder="Nama Desa"
                                                    value="{{ old('nama_desa', $config->nama_desa ?? '') }}"
                                                    @if(Auth::user()->role != 'admin') readonly @endif>
                                                <label for="namaDesaInput">Nama Desa</label>
                                                @error('nama_desa')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="kode_desa" class="form-control @error('kode_desa') is-invalid @enderror"
                                                    id="kodeDesaInput" placeholder="Kode Desa"
                                                    value="{{ old('kode_desa', $config->kode_desa ?? '') }}"
                                                    @if(Auth::user()->role != 'admin') readonly @endif>
                                                <label for="kodeDesaInput">Kode Desa</label>
                                                @error('kode_desa')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="nama_kecamatan" class="form-control @error('nama_kecamatan') is-invalid @enderror"
                                                    id="namaKecamatanInput" placeholder="Nama Kecamatan"
                                                    value="{{ old('nama_kecamatan', $config->nama_kecamatan ?? '') }}"
                                                    @if(Auth::user()->role != 'admin') readonly @endif>
                                                <label for="namaKecamatanInput">Nama Kecamatan</label>
                                                @error('nama_kecamatan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="kode_kecamatan" class="form-control @error('kode_kecamatan') is-invalid @enderror"
                                                    id="kodeKecamatanInput" placeholder="Kode Kecamatan"
                                                    value="{{ old('kode_kecamatan', $config->kode_kecamatan ?? '') }}"
                                                    @if(Auth::user()->role != 'admin') readonly @endif>
                                                <label for="kodeKecamatanInput">Kode Kecamatan</label>
                                                @error('kode_kecamatan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="nama_kepala_camat" class="form-control @error('nama_kepala_camat') is-invalid @enderror"
                                                    id="namaCamatInput" placeholder="Nama Camat"
                                                    value="{{ old('nama_kepala_camat', $config->nama_kepala_camat ?? '') }}"
                                                    @if(Auth::user()->role != 'admin') readonly @endif>
                                                <label for="namaCamatInput">Nama Camat</label>
                                                @error('nama_kepala_camat')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="nip_kepala_camat" class="form-control @error('nip_kepala_camat') is-invalid @enderror"
                                                    id="nipCamatInput" placeholder="NIP Camat"
                                                    value="{{ old('nip_kepala_camat', $config->nip_kepala_camat ?? '') }}"
                                                    @if(Auth::user()->role != 'admin') readonly @endif>
                                                <label for="nipCamatInput">NIP Camat</label>
                                                @error('nip_kepala_camat')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="nama_kabupaten" class="form-control @error('nama_kabupaten') is-invalid @enderror"
                                                    id="namaKabupatenInput" placeholder="Nama Kabupaten"
                                                    value="{{ old('nama_kabupaten', $config->nama_kabupaten ?? '') }}"
                                                    @if(Auth::user()->role != 'admin') readonly @endif>
                                                <label for="namaKabupatenInput">Nama Kabupaten</label>
                                                @error('nama_kabupaten')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="kode_kabupaten" class="form-control @error('kode_kabupaten') is-invalid @enderror"
                                                    id="kodeKabupatenInput" placeholder="Kode Kabupaten"
                                                    value="{{ old('kode_kabupaten', $config->kode_kabupaten ?? '') }}"
                                                    @if(Auth::user()->role != 'admin') readonly @endif>
                                                <label for="kodeKabupatenInput">Kode Kabupaten</label>
                                                @error('kode_kabupaten')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="nama_propinsi" class="form-control @error('nama_propinsi') is-invalid @enderror"
                                                    id="namaProvinsiInput" placeholder="Nama Provinsi"
                                                    value="{{ old('nama_propinsi', $config->nama_propinsi ?? '') }}"
                                                    @if(Auth::user()->role != 'admin') readonly @endif>
                                                <label for="namaProvinsiInput">Nama Provinsi</label>
                                                @error('nama_propinsi')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="kode_propinsi" class="form-control @error('kode_propinsi') is-invalid @enderror"
                                                    id="kodeProvinsiInput" placeholder="Kode Provinsi"
                                                    value="{{ old('kode_propinsi', $config->kode_propinsi ?? '') }}"
                                                    @if(Auth::user()->role != 'admin') readonly @endif>
                                                <label for="kodeProvinsiInput">Kode Provinsi</label>
                                                @error('kode_propinsi')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="email" name="email_desa" class="form-control @error('email_desa') is-invalid @enderror"
                                                    id="emailDesaInput" placeholder="Email Desa"
                                                    value="{{ old('email_desa', $config->email_desa ?? '') }}"
                                                    @if(Auth::user()->role != 'admin') readonly @endif>
                                                <label for="emailDesaInput">Email Desa</label>
                                                @error('email_desa')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="nomor_operator" class="form-control @error('nomor_operator') is-invalid @enderror"
                                                    id="nomorOperatorInput" placeholder="Nomor Operator"
                                                    value="{{ old('nomor_operator', $config->nomor_operator ?? '') }}"
                                                    @if(Auth::user()->role != 'admin') readonly @endif>
                                                <label for="nomorOperatorInput">Nomor Operator</label>
                                                @error('nomor_operator')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                                                    id="teleponInput" placeholder="Telepon"
                                                    value="{{ old('telepon', $config->telepon ?? '') }}"
                                                    @if(Auth::user()->role != 'admin') readonly @endif>
                                                <label for="teleponInput">Telepon</label>
                                                @error('telepon')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Logo</label>
                                            @if(Auth::user()->role == 'admin')
                                                <div class="input-group">
                                                    <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
                                                    <span class="input-group-text"><i class="ri-file-upload-line"></i></span>
                                                </div>
                                                @if($config->logo)
                                                    <div class="mt-2">
                                                        <img src="{{ asset('storage/' . $config->logo) }}" alt="Logo Saat Ini" 
                                                            class="img-thumbnail" style="max-height: 80px;">
                                                        <small class="d-block text-muted mt-1">Logo Saat Ini</small>
                                                    </div>
                                                @endif
                                                @error('logo')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            @else
                                                <input type="text" class="form-control" value="{{ $config->logo }}" readonly>
                                                <small class="text-muted">Hanya admin yang dapat mengubah logo.</small>
                                            @endif
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <textarea name="alamat_kantor" class="form-control @error('alamat_kantor') is-invalid @enderror" 
                                                    id="alamatKantorInput" placeholder="Alamat Kantor" style="height: 100px;"
                                                    @if(Auth::user()->role != 'admin') readonly @endif>{{ old('alamat_kantor', $config->alamat_kantor ?? '') }}</textarea>
                                                <label for="alamatKantorInput">Alamat Kantor</label>
                                                @error('alamat_kantor')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 text-end">
                                            <hr>
                                            @if(Auth::user()->role == 'admin')
                                                <button type="submit" class="btn btn-primary px-4">
                                                    <i class="ri-save-line me-1"></i> Save Changes
                                                </button>
                                            @endif
                                            <a href="{{ route('config.index') }}" class="btn btn-light ms-2">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- User Details Tab -->
                            <div class="tab-pane fade show active" id="pengunaUser" role="tabpanel">
                                <div class="user-info-box mb-4">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h5 class="mb-0 fw-bold">
                                            <i class="ri-user-3-line me-2"></i> Personal Information
                                        </h5>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="ri-edit-2-line me-1"></i> Edit
                                        </button>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="user-info-item">
                                                <div class="user-info-label">Full Name</div>
                                                <div class="user-info-value">{{ Auth::user()->name }}</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="user-info-item">
                                                <div class="user-info-label">Email Address</div>
                                                <div class="user-info-value">{{ Auth::user()->email }}</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="user-info-item">
                                                <div class="user-info-label">Position</div>
                                                <div class="user-info-value">{{ Auth::user()->jabatan }}</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="user-info-item">
                                                <div class="user-info-label">Role</div>
                                                <div class="user-info-value">
                                                    <span class="badge bg-primary-subtle text-primary">{{ Auth::user()->role }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="user-info-item">
                                                <div class="user-info-label">NIP</div>
                                                <div class="user-info-value">{{ Auth::user()->nip }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-transparent">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xs">
                                                    <div class="avatar-title bg-primary-subtle text-primary rounded-circle">
                                                        <i class="ri-shield-keyhole-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="card-title mb-0">Account Information</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <div class="border rounded p-3 text-center">
                                                    <div class="avatar-sm bg-success-subtle text-success rounded-circle mx-auto mb-2">
                                                        <i class="ri-check-line fs-4"></i>
                                                    </div>
                                                    <h6 class="mb-1">Account Status</h6>
                                                    <span class="badge bg-success-subtle text-success">Active</span>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="border rounded p-3 text-center">
                                                    <div class="avatar-sm bg-primary-subtle text-primary rounded-circle mx-auto mb-2">
                                                        <i class="ri-time-line fs-4"></i>
                                                    </div>
                                                    <h6 class="mb-1">Last Login</h6>
                                                    <p class="text-muted small mb-0">{{ date('d F Y, H:i') }} WIB</p>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="border rounded p-3 text-center">
                                                    <div class="avatar-sm bg-info-subtle text-info rounded-circle mx-auto mb-2">
                                                        <i class="ri-calendar-check-line fs-4"></i>
                                                    </div>
                                                    <h6 class="mb-1">Account Created</h6>
                                                    <p class="text-muted small mb-0">{{ Auth::user()->created_at ? Auth::user()->created_at->format('d F Y') : '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="card border-0 shadow-sm mt-4">
                                    <div class="card-header bg-transparent">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xs">
                                                    <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                        <i class="ri-history-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="card-title mb-0">Recent Activities</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <a href="#" class="btn btn-sm btn-link text-muted">View All</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card-body p-0">
                                        <div class="p-3 border-bottom">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-light text-primary rounded-circle">
                                                            <i class="ri-login-circle-line"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Login from new device</h6>
                                                    <p class="text-muted mb-0 small">Today, 10:30 AM</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="p-3 border-bottom">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-light text-warning rounded-circle">
                                                            <i class="ri-file-edit-line"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Profile information updated</h6>
                                                    <p class="text-muted mb-0 small">Yesterday, 4:15 PM</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="p-3">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-light text-success rounded-circle">
                                                            <i class="ri-shield-check-line"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Security scan completed</h6>
                                                    <p class="text-muted mb-0 small">3 days ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end tab-pane-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
@endsection
@section('script')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Profile cover image change
        const profileCoverInput = document.getElementById('profile-foreground-img-file-input');
        if (profileCoverInput) {
            profileCoverInput.addEventListener('change', function(e) {
                if (e.target.files.length > 0) {
                    const file = e.target.files[0];
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.querySelector('.profile-header img').src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
        
        // Floating labels animation
        const floatingInputs = document.querySelectorAll('.form-floating input, .form-floating textarea');
        floatingInputs.forEach(input => {
            if (input.value.trim() !== '') {
                input.classList.add('filled');
            }
            
            input.addEventListener('focus', () => {
                input.classList.add('filled');
            });
            
            input.addEventListener('blur', () => {
                if (input.value.trim() === '') {
                    input.classList.remove('filled');
                }
            });
        });
        
        // Tab switching animation
        const tabLinks = document.querySelectorAll('.nav-tabs-custom .nav-link');
        tabLinks.forEach(link => {
            link.addEventListener('click', function() {
                tabLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
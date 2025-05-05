@extends('layouts.master-without-nav')
@section('title')
    Register Warga
@endsection
@section('content')
<div class="auth-page-wrapper min-vh-100 d-flex align-items-center bg-light py-5">
    {{-- <div class="auth-one-bg-position auth-one-bg" id="auth-particles"> --}}
    <div class="auth-one-bg-position auth-one-bg">
        <div class="bg-overlay bg-primary bg-opacity-75"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <div class="auth-page-content w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="text-center mb-5">
                        <div>
                            <a href="{{ route('homepage') }}" class="d-inline-block auth-logo">
                                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="Logo Kelurahan" height="40">
                            </a>
                        </div>
                        <h3 class="mt-4 text-white fw-semibold">Sistem Informasi Kelurahan</h3>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                        <div class="card-header bg-primary bg-opacity-10 border-bottom-0 py-4">
                            <div class="text-center">
                                <h4 class="text-primary mb-2">Registrasi Warga</h4>
                                <p class="text-muted mb-0">Silakan isi data diri Anda untuk melanjutkan pendaftaran</p>
                            </div>
                        </div>

                        <div class="card-body p-4 p-lg-5">
                            <form class="needs-validation" novalidate method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <label for="nama" class="form-label fw-medium">Nama Lengkap <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i class="ri-user-line"></i></span>
                                            <input type="text" class="form-control form-control-lg border-start-0 @error('nama') is-invalid @enderror"
                                                name="nama" value="{{ old('nama') }}" id="nama"
                                                placeholder="Masukkan Nama Lengkap" required>
                                            @error('nama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="invalid-feedback">
                                            Silakan masukkan nama lengkap.
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="nik" class="form-label fw-medium">NIK (Nomor Induk Kependudukan) <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i class="ri-id-card-line"></i></span>
                                            <input type="text" class="form-control form-control-lg border-start-0 @error('nik') is-invalid @enderror"
                                                name="nik" value="{{ old('nik') }}" id="nik"
                                                placeholder="Masukkan NIK" required>
                                            @error('nik')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="invalid-feedback">
                                            Silakan masukkan NIK.
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="email" class="form-label fw-medium">Alamat Email <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i class="ri-mail-line"></i></span>
                                            <input type="email" class="form-control form-control-lg border-start-0 @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" id="email"
                                                placeholder="Masukkan Email" required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="invalid-feedback">
                                            Silakan masukkan Email.
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <label for="alamat" class="form-label fw-medium">Alamat</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i class="ri-home-4-line"></i></span>
                                            <textarea class="form-control form-control-lg border-start-0 @error('alamat') is-invalid @enderror"
                                                name="alamat" id="alamat" rows="3"
                                                placeholder="Masukkan Alamat Lengkap">{{ old('alamat') }}</textarea>
                                            @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="invalid-feedback">
                                            Silakan masukkan alamat.
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="password" class="form-label fw-medium">Kata Sandi <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <span class="input-group-text bg-light border-end-0"><i class="ri-lock-2-line"></i></span>
                                            <input type="password" class="form-control form-control-lg border-start-0 pe-5 @error('password') is-invalid @enderror" 
                                                name="password" id="password" placeholder="Masukkan Kata Sandi" required>
                                            <button class="btn btn-link position-absolute end-0 top-50 translate-middle-y text-decoration-none text-muted px-3" 
                                                type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="invalid-feedback">
                                            Silakan masukkan kata sandi.
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="password_confirmation" class="form-label fw-medium">Konfirmasi Kata Sandi <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <span class="input-group-text bg-light border-end-0"><i class="ri-lock-2-line"></i></span>
                                            <input type="password" class="form-control form-control-lg border-start-0 pe-5" 
                                                name="password_confirmation" id="password_confirmation"
                                                placeholder="Konfirmasi Kata Sandi" required>
                                            <button class="btn btn-link position-absolute end-0 top-50 translate-middle-y text-decoration-none text-muted px-3" 
                                                type="button" id="password-confirm-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                        <div class="invalid-feedback">
                                            Silakan konfirmasi kata sandi.
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-primary btn-lg w-100 waves-effect waves-light" type="submit">
                                        <i class="ri-user-add-line me-1 align-middle"></i> Daftar Sekarang
                                    </button>
                                </div>

                                <div class="mt-4 text-center">
                                    <p class="mb-0">Sudah punya akun? <a href="{{ route('login') }}"
                                        class="fw-semibold text-primary"> Masuk </a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer position-absolute bottom-0 start-0 end-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-white">&copy; <script>document.write(new Date().getFullYear())</script> Sistem Informasi Kelurahan. Hak Cipta Dilindungi.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('build/libs/particles.js/particles.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/particles.app.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/password-addon.init.js') }}"></script>
<script>
    // Additional script for password confirmation toggle
    document.getElementById('password-confirm-addon').addEventListener('click', function() {
        var passwordConfirmInput = document.getElementById('password_confirmation');
        if (passwordConfirmInput.type === "password") {
            passwordConfirmInput.type = "text";
        } else {
            passwordConfirmInput.type = "password";
        }
    });
</script>
@endsection
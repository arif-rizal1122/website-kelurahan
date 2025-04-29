@extends('layouts.master-without-nav')
@section('title')
    Register Warga
@endsection
@section('content')

    <div class="auth-page-wrapper pt-5">
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="{{ route('homepage') }}" class="d-inline-block auth-logo">
                                    <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Sistem Informasi Kelurahan</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Registrasi Warga</h5>
                                    <p class="text-muted">Silakan isi data diri Anda.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form class="needs-validation" novalidate method="POST"
                                        action="{{ route('register') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama Lengkap <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                name="nama" value="{{ old('nama') }}" id="nama"
                                                placeholder="Masukkan Nama Lengkap" required>
                                            @error('nama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="invalid-feedback">
                                                Silakan masukkan nama lengkap.
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="nik" class="form-label">NIK (Nomor Induk Kependudukan) <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                                name="nik" value="{{ old('nik') }}" id="nik"
                                                placeholder="Masukkan NIK" required>
                                            @error('nik')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="invalid-feedback">
                                                Silakan masukkan NIK.
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Alamat Email Anda <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" id="nik"
                                                placeholder="Masukkan Email" required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="invalid-feedback">
                                                Silakan masukkan Email.
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea class="form-control @error('alamat') is-invalid @enderror"
                                                name="alamat" id="alamat" rows="3"
                                                placeholder="Masukkan Alamat">{{ old('alamat') }}</textarea>
                                            @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="invalid-feedback">
                                                Silakan masukkan alamat.
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Kata Sandi <span
                                                    class="text-danger">*</span></label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                id="password" placeholder="Masukkan Kata Sandi" required>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="invalid-feedback">
                                                Silakan masukkan kata sandi.
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control"
                                                name="password_confirmation" id="password_confirmation"
                                                placeholder="Konfirmasi Kata Sandi" required>
                                            <div class="invalid-feedback">
                                                Silakan konfirmasi kata sandi.
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <button class="btn btn-success w-100" type="submit">Daftar</button>
                                        </div>

                                        <div class="mt-3 text-center">
                                            <p class="mb-0">Sudah punya akun? <a href="{{ route('login') }}"
                                                    class="fw-semibold text-primary text-decoration-underline"> Masuk </a>
                                            </p>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            </div>
                        <div class="mt-4 text-center">
                            <p class="mb-0">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Sistem Informasi Kelurahan.
                            </p>
                        </div>

                    </div>
                </div>
                </div>
            </div>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Sistem Informasi Kelurahan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        </div>
    @endsection
@section('script')
    <script src="{{ URL::asset('build/libs/particles.js/particles.js.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/particles.app.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
@endsection
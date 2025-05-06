@extends('layouts.master-without-nav')
@section('title')
    Reset Password Warga
@endsection

@section('content')
    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="{{ url('/') }}" class="d-inline-block auth-logo">
                                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="50">
                            </a>
                        </div>
                        <p class="mt-3 fs-15 fw-medium">Sistem Administrasi Desa</p>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">
                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Reset Kata Sandi</h5>
                                <p class="text-muted">Buat kata sandi baru untuk akun warga Anda</p>
                            </div>

                            <div class="p-2">
                                <form class="form-horizontal" method="POST" action="{{ route('warga.password.update') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                            readonly>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Kata Sandi Baru</label>
                                        <div class="position-relative auth-pass-inputgroup">
                                            <input id="password" type="password"
                                                class="form-control pe-5 password-input @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password"
                                                placeholder="Masukkan kata sandi baru">
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password-confirm" class="form-label">Konfirmasi Kata Sandi</label>
                                        <div class="position-relative auth-pass-inputgroup">
                                            <input id="password-confirm" type="password" class="form-control pe-5 password-input"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="Konfirmasi kata sandi baru">
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                type="button" id="confirm-password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                    </div>

                                    <div class="text-center mt-4">
                                        <button class="btn btn-success w-100" type="submit">Reset Kata Sandi</button>
                                    </div>
                                </form><!-- end form -->
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center">
                        <p class="mb-0">Sudah ingat kata sandi? <a href="{{ route('warga.login.form') }}"
                                class="fw-semibold text-primary text-decoration-underline"> Masuk </a> </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->
@endsection

@section('script')
    <script src="{{ URL::asset('build/js/pages/passowrd-create.init.js') }}"></script>
@endsection
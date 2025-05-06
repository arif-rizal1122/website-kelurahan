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
                                <h5 class="text-primary">Lupa Kata Sandi?</h5>
                                <p class="text-muted">Reset kata sandi akun warga Anda</p>

                                <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop"
                                    colors="primary:#0ab39c" class="avatar-xl">
                                </lord-icon>
                            </div>

                            <div class="alert alert-borderless alert-warning text-center mb-2 mx-2" role="alert">
                                Masukkan alamat email Anda dan petunjuk akan dikirimkan kepada Anda!
                            </div>
                            <div class="p-2">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form class="form-horizontal" method="POST" action="{{ route('warga.password.email') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                            placeholder="Masukkan email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="text-center mt-4">
                                        <button class="btn btn-success w-100" type="submit">Kirim Tautan Reset</button>
                                    </div>
                                </form><!-- end form -->
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center">
                        <p class="mb-0">Ingat kata sandi Anda? <a href="{{ route('warga.login.form') }}"
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
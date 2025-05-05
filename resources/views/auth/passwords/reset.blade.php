@extends('layouts.master-without-nav')
@section('title')
   Verifikasi Email
@endsection
@section('content')
<div class="auth-page-wrapper min-vh-100 d-flex align-items-center bg-light py-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay bg-primary bg-opacity-75"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="text-center mb-5">
                        <div>
                            <a href="index" class="d-inline-block auth-logo">
                                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="Logo" height="40">
                            </a>
                        </div>
                        <h3 class="mt-4 text-white fw-semibold">Sistem Informasi Kelurahan</h3>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-md-5">
                            <div class="mb-4 text-center">
                                <div class="avatar-lg mx-auto">
                                    <div class="avatar-title bg-primary bg-opacity-10 text-primary display-5 rounded-circle">
                                        <i class="ri-mail-line"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mb-5">
                                <h4 class="text-primary">Verifikasi Email Anda</h4>
                                <p class="text-muted mb-0">Silakan masukkan kode 4 digit yang dikirim ke <span class="fw-semibold">example@abc.com</span></p>
                            </div>

                            <form>
                                <div class="row mb-4">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="digit1-input" class="visually-hidden">Digit 1</label>
                                            <input type="text"
                                                class="form-control form-control-lg bg-light border-light text-center fw-bold fs-4"
                                                onkeyup="moveToNext(this, 2)" maxLength="1"
                                                id="digit1-input">
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="digit2-input" class="visually-hidden">Digit 2</label>
                                            <input type="text"
                                                class="form-control form-control-lg bg-light border-light text-center fw-bold fs-4"
                                                onkeyup="moveToNext(this, 3)" maxLength="1"
                                                id="digit2-input">
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="digit3-input" class="visually-hidden">Digit 3</label>
                                            <input type="text"
                                                class="form-control form-control-lg bg-light border-light text-center fw-bold fs-4"
                                                onkeyup="moveToNext(this, 4)" maxLength="1"
                                                id="digit3-input">
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="digit4-input" class="visually-hidden">Digit 4</label>
                                            <input type="text"
                                                class="form-control form-control-lg bg-light border-light text-center fw-bold fs-4"
                                                onkeyup="moveToNext(this, 4)" maxLength="1"
                                                id="digit4-input">
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                
                                <div class="mb-4 countdown-wrapper text-center">
                                    <p class="text-muted mb-1 fs-13">Kode akan kadaluarsa dalam</p>
                                    <div class="countdown">
                                        <span class="badge bg-secondary fs-14">02:30</span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button type="button" class="btn btn-primary btn-lg w-100 waves-effect waves-light">
                                        <i class="ri-check-double-line me-1"></i> Konfirmasi
                                    </button>
                                </div>
                                
                                <div class="mt-4 text-center">
                                    <p class="mb-0 text-muted">Tidak menerima kode? <a href="auth-pass-reset-basic" class="fw-semibold text-primary"> Kirim Ulang </a></p>
                                </div>
                            </form><!-- end form -->
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
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
    <!-- end Footer -->
</div>
@endsection
@section('script')
<script src="{{ URL::asset('build/libs/particles.js/particles.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/particles.app.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/two-step-verification.init.js') }}"></script>
@endsection
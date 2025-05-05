<?php $__env->startSection('title'); ?>
    Login Warga
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="auth-page-wrapper min-vh-100 d-flex align-items-center bg-light py-5">
    
        <div class="auth-one-bg-position auth-one-bg">
        <div class="bg-overlay bg-primary bg-opacity-75"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
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
                            <a href="<?php echo e(route('homepage')); ?>" class="d-inline-block auth-logo">
                                <img src="<?php echo e(URL::asset('build/images/logo-light.png')); ?>" alt="Logo Kelurahan" height="40">
                            </a>
                        </div>
                        <h3 class="mt-4 text-white fw-semibold">Sistem Informasi Kelurahan</h3>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                        <div class="card-header bg-primary bg-opacity-10 border-bottom-0 py-4">
                            <div class="text-center">
                                <h4 class="text-primary mb-2">Selamat Datang Warga!</h4>
                                <p class="text-muted mb-0">Silakan masuk untuk mengakses layanan warga.</p>
                            </div>
                        </div>

                        <div class="card-body p-4 p-md-5">
                            <form action="<?php echo e(route('warga.login')); ?>" method="POST" class="needs-validation" novalidate>
                                <?php echo csrf_field(); ?>
                                <div class="mb-4">
                                    <label for="nik" class="form-label fw-medium">NIK (Nomor Induk Kependudukan) <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0"><i class="ri-user-3-line"></i></span>
                                        <input type="text" class="form-control form-control-lg border-start-0 <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nik')); ?>" id="nik" name="nik" placeholder="Masukkan NIK" required>
                                        <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <label class="form-label fw-medium" for="password-input">Kata Sandi <span class="text-danger">*</span></label>
                                        <a href="<?php echo e(route('password.request')); ?>" class="text-primary fw-medium text-decoration-none fs-13">Lupa kata sandi?</a>
                                    </div>
                                    <div class="input-group auth-pass-inputgroup">
                                        <span class="input-group-text bg-light border-end-0"><i class="ri-lock-2-line"></i></span>
                                        <input type="password" class="form-control form-control-lg border-start-0 pe-5 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="Masukkan kata sandi" id="password-input" required>
                                        <button class="btn btn-link position-absolute end-0 top-50 translate-middle-y text-decoration-none text-muted px-3" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="auth-remember-check" name="remember">
                                    <label class="form-check-label" for="auth-remember-check">Ingat saya</label>
                                </div>

                                <div class="mb-4">
                                    <button class="btn btn-primary btn-lg w-100 waves-effect waves-light" type="submit">
                                        <i class="ri-login-box-line me-1 align-middle"></i> Masuk
                                    </button>
                                </div>

                                <div class="text-center">
                                    <div class="signin-other-title position-relative mb-4">
                                        <span class="bg-white px-3 position-relative z-1 text-muted">atau</span>
                                        <hr class="position-absolute top-50 start-0 end-0 z-0 m-0">
                                    </div>
                                    <div class="mb-3">
                                        <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-secondary btn-lg w-100">
                                            <i class="ri-shield-user-line me-1"></i> Masuk Sebagai Petugas
                                        </a>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Don't have an account ? <a href="<?php echo e(route('register')); ?>" class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <p class="mb-0 text-white">Belum punya akun? <a href="<?php echo e(route('register')); ?>" class="fw-semibold text-white text-decoration-underline"> Daftar </a> </p>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('build/libs/particles.js/particles.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/particles.app.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/password-addon.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-without-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/auth/guest.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
    Login Warga
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- Animasi CSS -->
    <link href="<?php echo e(URL::asset('build/libs/aos/aos.css')); ?>" rel="stylesheet">
    <style>
        /* Style khusus untuk Login Warga - Tema Community */
        :root {
            --warga-primary: #4F7942; /* Forest Green - Mewakili komunitas/masyarakat */
            --warga-secondary: #8FBC8F;
            --warga-accent: #2E8B57;
            --warga-gradient: linear-gradient(135deg, #4F7942, #2E8B57);
        }
        
        .auth-one-bg {
            background-image: var(--warga-gradient), url("<?php echo e(URL::asset('build/images/bg-community.jpg')); ?>");
            background-size: cover;
            background-position: center;
        }
        
        .btn-primary {
            background-color: var(--warga-primary);
            border-color: var(--warga-primary);
        }
        
        .btn-primary:hover {
            background-color: var(--warga-accent);
            border-color: var(--warga-accent);
        }
        
        .text-primary {
            color: var(--warga-primary) !important;
        }
        
        .bg-primary {
            background-color: var(--warga-primary) !important;
        }
        
        .card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .form-control, .input-group-text {
            border-radius: 8px;
        }
        
        .auth-card-header {
            position: relative;
            overflow: hidden;
            border-radius: 15px 15px 0 0;
        }
        
        .auth-card-header::before {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            background: var(--warga-secondary);
            border-radius: 50%;
            opacity: 0.1;
            top: -125px;
            right: -125px;
        }
        
        .auth-card-header::after {
            content: "";
            position: absolute;
            width: 150px;
            height: 150px;
            background: var(--warga-secondary);
            border-radius: 50%;
            opacity: 0.1;
            bottom: -75px;
            left: -75px;
        }
        
        .floating-label {
            position: relative;
        }
        
        .floating-label input:focus + label,
        .floating-label input:not(:placeholder-shown) + label {
            transform: translateY(-25px) scale(0.85);
            color: var(--warga-primary);
        }
        
        .floating-label label {
            position: absolute;
            left: 15px;
            top: 10px;
            transition: all 0.2s ease-in-out;
            pointer-events: none;
        }
        
        .btn {
            transition: all 0.3s;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .warga-icon {
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            margin-bottom: 1rem;
        }
        
        .warga-icon i {
            font-size: 40px;
            color: #fff;
        }
        
        .card-separator {
            position: relative;
            text-align: center;
            margin: 1.5rem 0;
        }
        
        .card-separator::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e9ecef;
        }
        
        .card-separator span {
            position: relative;
            background: #fff;
            padding: 0 1rem;
        }
        
        .feature-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(79, 121, 66, 0.1);
            color: var(--warga-primary);
            margin-right: 10px;
        }
        
        .welcome-badge {
            display: inline-block;
            background: rgba(79, 121, 66, 0.1);
            color: var(--warga-primary);
            padding: 0.35rem 0.8rem;
            border-radius: 2rem;
            font-size: 0.75rem;
            margin-bottom: 0.75rem;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="auth-page-wrapper min-vh-100 d-flex align-items-center bg-light py-5">
    <div class="auth-one-bg-position auth-one-bg" data-aos="fade" data-aos-duration="1000">
        <div class="bg-overlay bg-primary bg-opacity-60"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <div class="auth-page-content w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-down" data-aos-delay="200">
                    <div class="text-center mb-5">
                        <div class="warga-icon">
                            <i class="ri-community-line"></i>
                        </div>
                        <div>
                            <a href="<?php echo e(route('homepage')); ?>" class="d-inline-block auth-logo">
                                <img src="<?php echo e(URL::asset('build/images/logo-light.png')); ?>" alt="Logo Kelurahan" height="45">
                            </a>
                        </div>
                        <h2 class="mt-4 text-white fw-semibold">Sistem Informasi Kelurahan</h2>
                        <p class="text-white-50 fs-15">Portal Layanan Masyarakat Digital</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card border-0 overflow-hidden" data-aos="zoom-in" data-aos-delay="400">
                        <div class="card-header auth-card-header bg-primary bg-opacity-10 border-bottom-0 py-4">
                            <div class="text-center">
                                <span class="welcome-badge"><i class="ri-user-smile-line me-1"></i> Warga Digital</span>
                                <h4 class="text-primary mb-2">Selamat Datang Warga!</h4>
                                <p class="text-muted mb-0">Akses layanan digital kelurahan dengan mudah</p>
                            </div>
                        </div>

                        <div class="card-body p-4 p-md-5">
                            <form action="<?php echo e(route('warga.login')); ?>" method="POST" class="needs-validation" novalidate>
                                <?php echo csrf_field(); ?>
                                <div class="mb-4">
                                    <label for="nik" class="form-label fw-medium">NIK (Nomor Induk Kependudukan) <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light border-end-0"><i class="ri-id-card-line"></i></span>
                                        <input type="text" class="form-control form-control-lg border-start-0 <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nik')); ?>" id="nik" name="nik" placeholder="Masukkan 16 digit NIK" required>
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
                                    <small class="text-muted"><i class="ri-information-line me-1"></i> NIK terdapat pada KTP elektronik Anda</small>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <label class="form-label fw-medium" for="password-input">Kata Sandi <span class="text-danger">*</span></label>
                                        <a href="<?php echo e(route('warga.password.request')); ?>" class="text-primary fw-medium text-decoration-none fs-13">Lupa kata sandi?</a>
                                    </div>
                                    <div class="input-group input-group-lg auth-pass-inputgroup">
                                        <span class="input-group-text bg-light border-end-0"><i class="ri-lock-password-line"></i></span>
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
                                        <i class="ri-login-box-line me-1 align-middle"></i> Masuk Sekarang
                                    </button>
                                </div>

                                <div class="card-separator">
                                    <span class="text-muted">atau</span>
                                </div>
                                
                                <div class="mb-3">
                                    <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-secondary btn-lg w-100">
                                        <i class="ri-shield-user-line me-1"></i> Masuk Sebagai Petugas
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="mt-4 text-center" data-aos="fade-up" data-aos-delay="500">
                        <p class="mb-3 text-white">Belum punya akun? <a href="<?php echo e(route('register')); ?>" class="fw-semibold text-white text-decoration-underline"> Daftar Sekarang </a></p>
                        
                        <div class="mt-4 d-flex justify-content-center gap-3">
                            <div class="d-flex align-items-center text-white-50">
                                <div class="feature-icon">
                                    <i class="ri-file-paper-2-line"></i>
                                </div>
                                <small>Layanan Dokumen</small>
                            </div>
                            <div class="d-flex align-items-center text-white-50">
                                <div class="feature-icon">
                                    <i class="ri-time-line"></i>
                                </div>
                                <small>Proses Cepat</small>
                            </div>
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
                        <p class="mb-0 text-white-50">&copy; <script>document.write(new Date().getFullYear())</script> Sistem Informasi Kelurahan. Hak Cipta Dilindungi.</p>
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
<script src="<?php echo e(URL::asset('build/libs/aos/aos.js')); ?>"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init();
        
        // NIK input validation - only allow numbers
        const nikInput = document.getElementById('nik');
        nikInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
            if(this.value.length > 16) {
                this.value = this.value.slice(0, 16);
            }
        });
        
        // Floating animations for form controls
        const formControls = document.querySelectorAll('.form-control');
        formControls.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('border-primary');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('border-primary');
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-without-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/auth/guest.blade.php ENDPATH**/ ?>
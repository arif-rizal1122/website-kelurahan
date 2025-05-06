<?php $__env->startSection('title'); ?>
  Login Admin
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- Animasi CSS -->
    <link href="<?php echo e(URL::asset('build/libs/aos/aos.css')); ?>" rel="stylesheet">
    <style>
        /* Style khusus untuk Login Admin - Tema Professional & Tech */
        :root {
            --admin-primary: #364FC7; /* Royal Blue - Mewakili otoritas & teknologi */
            --admin-secondary: #5C7CFA;
            --admin-accent: #1A3B8A;
            --admin-gradient: linear-gradient(135deg, #1e3c72, #2a5298);
        }
        
        .auth-one-bg {
            background-image: var(--admin-gradient), url("<?php echo e(URL::asset('build/images/bg-admin.jpg')); ?>");
            background-size: cover;
            background-position: center;
        }
        
        .btn-primary {
            background-color: var(--admin-primary);
            border-color: var(--admin-primary);
        }
        
        .btn-primary:hover {
            background-color: var(--admin-accent);
            border-color: var(--admin-accent);
        }
        
        .text-primary {
            color: var(--admin-primary) !important;
        }
        
        .bg-primary {
            background-color: var(--admin-primary) !important;
        }
        
        .card {
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }
        
        .form-control, .input-group-text {
            border-radius: 8px;
        }
        
        .admin-card-header {
            position: relative;
            overflow: hidden;
            border-radius: 16px 16px 0 0;
        }
        
        .admin-card-header::before {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            background: var(--admin-secondary);
            border-radius: 50%;
            opacity: 0.1;
            top: -150px;
            right: -150px;
        }
        
        .admin-card-header::after {
            content: "";
            position: absolute;
            width: 200px;
            height: 200px;
            background: var(--admin-secondary);
            border-radius: 50%;
            opacity: 0.1;
            bottom: -100px;
            left: -100px;
        }
        
        .admin-icon {
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.15);
            border-radius: 20px;
            transform: rotate(45deg);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            margin-bottom: 1rem;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .admin-icon i {
            font-size: 36px;
            color: #fff;
            transform: rotate(-45deg);
        }
        
        .btn {
            transition: all 0.3s;
            border-radius: 8px;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
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
        
        .tech-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: rgba(54, 79, 199, 0.1);
            color: var(--admin-primary);
            margin-right: 10px;
        }
        
        .security-badge {
            display: inline-block;
            background: rgba(54, 79, 199, 0.1);
            color: var(--admin-primary);
            padding: 0.35rem 0.8rem;
            border-radius: 2rem;
            font-size: 0.75rem;
            margin-bottom: 0.75rem;
        }
        
        /* Animation classes */
        .input-group {
            transition: all 0.3s ease;
        }
        
        .input-group:focus-within {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        /* Glow effect on input focus */
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(54, 79, 199, 0.15);
        }
        
        /* Type effect for heading */
        .typing-effect {
            overflow: hidden;
            border-right: 2px solid var(--admin-primary);
            white-space: nowrap;
            margin: 0 auto;
            animation: typing 3.5s steps(30, end), blink-caret 0.75s step-end infinite;
        }
        
        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }
        
        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: var(--admin-primary); }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="auth-page-wrapper min-vh-100 d-flex align-items-center bg-light py-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" data-aos="fade" data-aos-duration="1000">
        <div class="bg-overlay bg-primary bg-opacity-70"></div>
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
                <div class="col-lg-8" data-aos="fade-down" data-aos-delay="200">
                    <div class="text-center mb-5">
                        <div class="admin-icon">
                            <i class="ri-admin-line"></i>
                        </div>
                        <div>
                            <a href="<?php echo e(route('homepage')); ?>" class="d-inline-block auth-logo">
                                <img src="<?php echo e(URL::asset('build/images/logo-light.png')); ?>" alt="Logo SMART LURAH" height="45">
                            </a>
                        </div>
                        <h2 class="mt-4 text-white fw-bold">Sistem Aplikasi SMART LURAH</h2>
                        <p class="text-white-50 fs-15">Dashboard Manajemen Administrasi</p>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card border-0 overflow-hidden" data-aos="zoom-in" data-aos-delay="400">
                        <div class="card-header admin-card-header bg-primary bg-opacity-10 border-bottom-0 py-4">
                            <div class="text-center">
                                <span class="security-badge"><i class="ri-shield-check-line me-1"></i> Admin Zone</span>
                                <h4 class="text-primary mb-2">Selamat Datang Admin!</h4>
                                <p class="text-muted mb-0">Masuk untuk mengelola sistem administrasi</p>
                            </div>
                        </div>

                        <div class="card-body p-4 p-md-5">
                            <form action="<?php echo e(route('login')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="mb-4">
                                    <label for="username" class="form-label fw-medium">Username <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light border-end-0"><i class="ri-user-3-line"></i></span>
                                        <input type="text" class="form-control form-control-lg border-start-0 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>" id="username" name="email" placeholder="Masukkan username admin">
                                        <?php $__errorArgs = ['email'];
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
                                    <small class="text-muted"><i class="ri-information-line me-1"></i> Gunakan username yang diberikan oleh administrator</small>
                                </div>

                                <div class="mb-4">
                                    
                                    <div class="input-group input-group-lg auth-pass-inputgroup">
                                        <span class="input-group-text bg-light border-end-0"><i class="ri-lock-password-fill"></i></span>
                                        <input type="password" class="form-control form-control-lg border-start-0 pe-5 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="Masukkan password admin" id="password-input">
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
                                    <label class="form-check-label" for="auth-remember-check">Ingat perangkat ini</label>
                                </div>

                                <div class="mb-4">
                                    <button class="btn btn-primary btn-lg w-100 waves-effect waves-light" type="submit">
                                        <i class="ri-login-circle-fill me-1 align-middle"></i> Masuk ke Dashboard
                                    </button>
                                </div>

                                <div class="card-separator">
                                    <span class="text-muted">atau</span>
                                </div>
                                
                                <div class="mb-3">
                                    <a href="<?php echo e(route('warga.login.form')); ?>" class="btn btn-outline-secondary btn-lg w-100">
                                        <i class="ri-team-line me-1"></i> Masuk Sebagai Warga
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center" data-aos="fade-up" data-aos-delay="500">
                        <p class="mb-3 text-white">Belum memiliki akses? <a href="<?php echo e(route('register')); ?>" class="fw-semibold text-white text-decoration-underline"> Daftar Admin </a></p>
                        
                        <div class="mt-4 d-flex justify-content-center gap-3">
                            <div class="d-flex align-items-center text-white-50">
                                <div class="tech-icon">
                                    <i class="ri-dashboard-3-line"></i>
                                </div>
                                <small>Dashboard Analitik</small>
                            </div>
                            <div class="d-flex align-items-center text-white-50">
                                <div class="tech-icon">
                                    <i class="ri-secure-payment-line"></i>
                                </div>
                                <small>Akses Aman</small>
                            </div>
                        </div>
                    </div>
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
                        <p class="mb-0 text-white-50">&copy; <script>document.write(new Date().getFullYear())</script> Sistem Aplikasi SMART LURAH. Hak Cipta Dilindungi.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
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
    const formControls = document.querySelectorAll('.form-control');
    formControls.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
            if (this.value.length > 0) {
                this.classList.add('is-filled');
            } else {
                this.classList.remove('is-filled');
            }
        });
        
        if (input.value.length > 0) {
            input.classList.add('is-filled');
        }
    });
    // Typing effect for headings
    const headings = document.querySelectorAll('h4.text-primary');
    headings.forEach(heading => {
        heading.classList.add('typing-effect');
    });
    // Simple form validation
    const loginForm = document.querySelector('form');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            let isValid = true;
            const username = document.getElementById('username');
            const password = document.getElementById('password-input');
            // Basic validation
            if (!username.value.trim()) {
                username.classList.add('is-invalid');
                isValid = false;
            } else {
                username.classList.remove('is-invalid');
            }
            if (!password.value.trim()) {
                password.classList.add('is-invalid');
                isValid = false;
            } else {
                password.classList.remove('is-invalid');
            }
            if (!isValid) {
                e.preventDefault();
                // Show shake animation on invalid form if animate.css is available
                const card = document.querySelector('.card');
                if (card) {
                    card.classList.add('animate__animated', 'animate__shakeX');
                    setTimeout(() => {
                        card.classList.remove('animate__animated', 'animate__shakeX');
                    }, 1000);
                }
            }
        });
    }
    // Browser compatibility check
    const isIE = !!document.documentMode;
    if (isIE) {
        alert('Sistem ini tidak kompatibel dengan Internet Explorer. Silakan gunakan browser modern seperti Chrome, Firefox, atau Edge.');
    }
    // Add "Remember Me" checkbox functionality
    const rememberCheckbox = document.getElementById('auth-remember-check');
    if (rememberCheckbox) {
        // Check localStorage for saved preference
        const remembered = localStorage.getItem('remember_device');
        if (remembered === 'true') {
            rememberCheckbox.checked = true;
        }
        // Save preference to localStorage when changed
        rememberCheckbox.addEventListener('change', function() {
            localStorage.setItem('remember_device', this.checked);
        });
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-without-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/auth/login.blade.php ENDPATH**/ ?>
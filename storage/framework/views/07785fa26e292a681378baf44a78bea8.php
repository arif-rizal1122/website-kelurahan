<?php $__env->startSection('title'); ?>
    Reset Password Warga
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="<?php echo e(url('/')); ?>" class="d-inline-block auth-logo">
                                <img src="<?php echo e(URL::asset('build/images/logo-light.png')); ?>" alt="" height="50">
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
                                <?php if(session('status')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo e(session('status')); ?>

                                    </div>
                                <?php endif; ?>
                                <form class="form-horizontal" method="POST" action="<?php echo e(route('warga.password.email')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus
                                            placeholder="Masukkan email">
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
                        <p class="mb-0">Ingat kata sandi Anda? <a href="<?php echo e(route('warga.login.form')); ?>"
                                class="fw-semibold text-primary text-decoration-underline"> Masuk </a> </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-without-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/auth/passwords/warga-email.blade.php ENDPATH**/ ?>
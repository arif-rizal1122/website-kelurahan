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
                                <h5 class="text-primary">Reset Kata Sandi</h5>
                                <p class="text-muted">Buat kata sandi baru untuk akun warga Anda</p>
                            </div>

                            <div class="p-2">
                                <form class="form-horizontal" method="POST" action="<?php echo e(route('warga.password.update')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="token" value="<?php echo e($token); ?>">

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
                                            name="email" value="<?php echo e($email ?? old('email')); ?>" required autocomplete="email" autofocus
                                            readonly>
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

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Kata Sandi Baru</label>
                                        <div class="position-relative auth-pass-inputgroup">
                                            <input id="password" type="password"
                                                class="form-control pe-5 password-input <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="password" required autocomplete="new-password"
                                                placeholder="Masukkan kata sandi baru">
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
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
                        <p class="mb-0">Sudah ingat kata sandi? <a href="<?php echo e(route('warga.login.form')); ?>"
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

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/js/pages/passowrd-create.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-without-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/auth/passwords/warga-reset.blade.php ENDPATH**/ ?>
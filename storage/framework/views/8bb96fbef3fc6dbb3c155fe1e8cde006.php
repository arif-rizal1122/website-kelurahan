<?php $__env->startSection('title'); ?>
    Verifikasi Email
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Verifikasi Email Anda</h5>
                                    <p class="text-muted">Silakan verifikasi email Anda sebelum melanjutkan</p>
                                </div>

                                <div class="p-2 mt-4">
                                    <?php if(session('message')): ?>
                                        <div class="alert alert-success" role="alert">
                                            <?php echo e(session('message')); ?>

                                        </div>
                                    <?php endif; ?>

                                    <div class="text-center">
                                        <p class="mb-4">Email verifikasi telah dikirim ke alamat email Anda. Silakan cek inbox atau folder spam Anda.</p>

                                        <form method="POST" action="<?php echo e(route('verification.resend')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-success">Kirim Ulang Email Verifikasi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/libs/particles.js/particles.js.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/particles.app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-without-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/auth/verify-email.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?> Menu Warga <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/css/custom.min.menu.css')); ?>" rel="stylesheet" type="text/css" />
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="decorative-shape" style="width: 300px; height: 300px; background: radial-gradient(#ffffff, transparent); top: -100px; right: -100px;"></div>
    <div class="decorative-shape" style="width: 500px; height: 500px; background: radial-gradient(#4e73df, transparent); bottom: -200px; left: -200px;"></div>

    <div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center py-4 position-relative">
        <img src="<?php echo e(URL::asset('assets/img/bannerblue.png')); ?>" alt="" width="100%">


        <div class="card p-4 w-100 mb-4" style="max-width: 380px;">
            <div class="d-grid gap-3">
                <a href="<?php echo e(route('warga.formulir')); ?>" class="btn btn-danger py-3 d-flex align-items-center menu-button">
                    <div class="d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background-color: rgba(255,255,255,0.2); border-radius: 10px;">
                        <i class='bx bx-file-blank' style="font-size: 1.2rem;"></i>
                    </div>
                    <div class="text-start">
                        <span class="fw-bold">Pengajuan Surat</span>
                        <small class="d-block text-white-50">Buat pengajuan baru</small>
                    </div>
                    <i class="bi bi-chevron-right ms-auto"></i>
                </a>

                <a href="<?php echo e(route('warga.riwayat')); ?>" class="btn btn-secondary py-3 d-flex align-items-center menu-button">
                    <div class="d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background-color: rgba(255,255,255,0.2); border-radius: 10px;">
                        <i class='bx bx-history' style="font-size: 1.2rem;"></i>
                    </div>
                    <div class="text-start">
                        <span class="fw-bold">Riwayat Pengajuan</span>
                        <small class="d-block text-white-50">Lihat status pengajuan</small>
                    </div>
                    <i class="bi bi-chevron-right ms-auto"></i>
                </a>

                <a href="<?php echo e(route('warga.profile')); ?>" class="btn btn-info text-white py-3 d-flex align-items-center">
                    <div class="d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background-color: rgba(255,255,255,0.2); border-radius: 10px;">
                        <i class='bx bx-user-circle' style="font-size: 1.2rem;"></i>
                    </div>
                    <div class="text-start">
                        <span class="fw-bold">Profil Saya</span>
                        <small class="d-block text-white-50">Kelola data pribadi</small>
                    </div>
                    <i class="bi bi-chevron-right ms-auto"></i>
                </a>
            </div>
        </div>

        <div class="d-flex flex-wrap justify-content-center gap-2 w-100" style="max-width: 380px;">
            <a href="#" class="btn btn-outline-light btn-sm px-3 py-2">
                <i class='bx bx-question-mark me-1'></i> Bantuan
            </a>
            <a href="#" class="btn btn-outline-light btn-sm px-3 py-2">
                <i class='bx bx-info-circle me-1'></i> Tentang
            </a>
            <a href="#" class="btn btn-outline-light btn-sm px-3 py-2">
                <i class='bx bx-phone me-1'></i> Kontak
            </a>
            <form action="<?php echo e(route('warga.logout')); ?>" method="POST" class="d-inline">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-outline-light btn-sm px-3 py-2">
                    <i class='bx bx-log-out me-1'></i> Keluar
                </button>
            </form>
        </div>

        <div class="mt-auto pt-4 text-center">
            <small class="text-white-50">Digides © 2025 | Versi 2.1.0</small>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/dashboard-ecommerce.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master-without-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/dashboardwarga/menu.blade.php ENDPATH**/ ?>
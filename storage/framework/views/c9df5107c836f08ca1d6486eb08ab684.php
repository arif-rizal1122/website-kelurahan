<?php $__env->startSection('title'); ?> Menu Warga <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
    <style>
        body {
            /* Gaya body di sini kemungkinan akan ditimpa oleh gaya dari layout master */
            background: linear-gradient(135deg, #0f4c81 0%, #0a2e50 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .btn {
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            font-weight: 500;
        }
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            background: linear-gradient(45deg, #4e73df, #224abe);
            border: none;
        }
        .btn-danger {
            background: linear-gradient(45deg, #ff6b6b, #ee5253);
            border: none;
        }
        .btn-info {
            background: linear-gradient(45deg, #36b9cc, #1a8799);
            border: none;
        }
        .btn-secondary {
            background: linear-gradient(45deg, #6c757d, #495057);
            border: none;
        }
        .btn-outline-light {
            border-color: rgba(255, 255, 255, 0.3);
            color: rgba(255, 255, 255, 0.8);
        }
        .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
        }
        .card {
            border-radius: 15px;
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .app-icon {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            background: linear-gradient(45deg, #1e3c72, #2a5298);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            margin: 0 auto;
        }
        .menu-button {
            margin-bottom: 12px;
        }
        .glow {
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }
        .decorative-shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            z-index: -1;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="decorative-shape" style="width: 300px; height: 300px; background: radial-gradient(#ffffff, transparent); top: -100px; right: -100px;"></div>
    <div class="decorative-shape" style="width: 500px; height: 500px; background: radial-gradient(#4e73df, transparent); bottom: -200px; left: -200px;"></div>

    <div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center py-4 position-relative">
        <img src="<?php echo e(URL::asset('assets/img/bannerblue.png')); ?>" alt="" width="100%">


        <div class="card p-4 w-100 mb-4" style="max-width: 380px;">
            <div class="d-grid gap-3">
                <a href="<?php echo e(route('formulir.warga')); ?>" class="btn btn-danger py-3 d-flex align-items-center menu-button">
                    <div class="d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background-color: rgba(255,255,255,0.2); border-radius: 10px;">
                        <i class="bi bi-file-earmark-text" style="font-size: 1.2rem;"></i>
                    </div>
                    <div class="text-start">
                        <span class="fw-bold">Pengajuan Surat</span>
                        <small class="d-block text-white-50">Buat pengajuan baru</small>
                    </div>
                    <i class="bi bi-chevron-right ms-auto"></i>
                </a>

                <a href="#" class="btn btn-secondary py-3 d-flex align-items-center menu-button">
                    <div class="d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background-color: rgba(255,255,255,0.2); border-radius: 10px;">
                        <i class="bi bi-clock-history" style="font-size: 1.2rem;"></i>
                    </div>
                    <div class="text-start">
                        <span class="fw-bold">Riwayat Pengajuan</span>
                        <small class="d-block text-white-50">Lihat status pengajuan</small>
                    </div>
                    <i class="bi bi-chevron-right ms-auto"></i>
                </a>

                <a href="#" class="btn btn-primary py-3 d-flex align-items-center menu-button">
                    <div class="d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background-color: rgba(255,255,255,0.2); border-radius: 10px;">
                        <i class="bi bi-bell" style="font-size: 1.2rem;"></i>
                    </div>
                    <div class="text-start">
                        <span class="fw-bold">Notifikasi</span>
                        <small class="d-block text-white-50">3 pemberitahuan baru</small>
                    </div>
                    <i class="bi bi-chevron-right ms-auto"></i>
                </a>

                <a href="#" class="btn btn-info text-white py-3 d-flex align-items-center">
                    <div class="d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background-color: rgba(255,255,255,0.2); border-radius: 10px;">
                        <i class="bi bi-person-circle" style="font-size: 1.2rem;"></i>
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
                <i class="bi bi-question-circle me-1"></i> Bantuan
            </a>
            <a href="#" class="btn btn-outline-light btn-sm px-3 py-2">
                <i class="bi bi-info-circle me-1"></i> Tentang
            </a>
            <a href="#" class="btn btn-outline-light btn-sm px-3 py-2">
                <i class="bi bi-telephone me-1"></i> Kontak
            </a>
            <form action="<?php echo e(route('warga.logout')); ?>" method="POST" class="d-inline">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-outline-light btn-sm px-3 py-2">
                    <i class="bi bi-box-arrow-right me-1"></i> Keluar
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
<?php echo $__env->make('layouts.master-without-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/menu.blade.php ENDPATH**/ ?>
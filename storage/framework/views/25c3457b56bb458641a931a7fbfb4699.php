<?php $__env->startSection('title'); ?> Dashboard <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
<!-- Box Icons CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col">
        <div class="h-100">
            <!-- Welcome Card -->
            <div class="welcome-card mb-4 animate-fadeInUp" style="--delay: 0">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h2 class="welcome-title">Selamat Pagi, Anna!</h2>
                        <p class="welcome-subtitle mb-0">Berikut adalah rangkuman informasi hari ini, <?php echo e(now()->format('d F Y')); ?></p>
                    </div>
                    <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                        <button type="button" class="btn btn-light refresh-btn">
                            <i class="bx bx-refresh me-1"></i> Refresh Data
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Stats Summary Cards -->
            <div class="row stats-row g-3">
                <!-- Surat Diajukan -->
                <div class="col-xl-3 col-md-6 stat-item animate-fadeInUp" style="--delay: 1">
                    <div class="card card-dashboard h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="card-title">Surat Diajukan</h5>
                                <div class="dashboard-icon bg-info-subtle">
                                    <i class="bx bxs-inbox text-info"></i>
                                </div>
                            </div>
                            <h2 class="counter-value text-dark" data-target="<?php echo e($totalDiajukan); ?>">0</h2>
                            <div class="d-flex align-items-center mt-3">
                                <span class="trend-indicator bg-info-subtle text-info">
                                    <i class="bx bx-trending-up"></i>
                                    <span>+12%</span>
                                </span>
                                <span class="text-muted fs-12 ms-2">dari bulan lalu</span>
                            </div>
                            <div class="mt-4">
                                <a href="<?php echo e(route('pengajuan-surat.status', ['status' => 'diajukan'])); ?>" class="btn btn-soft-info view-details d-flex align-items-center justify-content-center">
                                    <span>Lihat Detail</span>
                                    <i class="bx bx-right-arrow-alt ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Surat Diproses -->
                <div class="col-xl-3 col-md-6 stat-item animate-fadeInUp" style="--delay: 2">
                    <div class="card card-dashboard h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="card-title">Surat Diproses</h5>
                                <div class="dashboard-icon bg-warning-subtle">
                                    <i class="bx bx-loader-circle text-warning"></i>
                                </div>
                            </div>
                            <h2 class="counter-value text-dark" data-target="<?php echo e($totalDiproses); ?>">0</h2>
                            <div class="d-flex align-items-center mt-3">
                                <span class="trend-indicator bg-warning-subtle text-warning">
                                    <i class="bx bx-time"></i>
                                    <span>Menunggu</span>
                                </span>
                                <span class="text-muted fs-12 ms-2">persetujuan</span>
                            </div>
                            <div class="mt-4">
                                <a href="<?php echo e(route('pengajuan-surat.status', ['status' => 'diproses'])); ?>" class="btn btn-soft-warning view-details d-flex align-items-center justify-content-center">
                                    <span>Lihat Detail</span>
                                    <i class="bx bx-right-arrow-alt ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Surat Selesai -->
                <div class="col-xl-3 col-md-6 stat-item animate-fadeInUp" style="--delay: 3">
                    <div class="card card-dashboard h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="card-title">Surat Selesai</h5>
                                <div class="dashboard-icon bg-success-subtle">
                                    <i class="bx bx-check-double text-success"></i>
                                </div>
                            </div>
                            <h2 class="counter-value text-dark" data-target="<?php echo e($totalSelesai); ?>">0</h2>
                            <div class="d-flex align-items-center mt-3">
                                <span class="trend-indicator bg-success-subtle text-success">
                                    <i class="bx bx-trending-up"></i>
                                    <span>+24%</span>
                                </span>
                                <span class="text-muted fs-12 ms-2">dari target bulan ini</span>
                            </div>
                            <div class="mt-4">
                                <a href="<?php echo e(route('pengajuan-surat.status', ['status' => 'selesai'])); ?>" class="btn btn-soft-success view-details d-flex align-items-center justify-content-center">
                                    <span>Lihat Detail</span>
                                    <i class="bx bx-right-arrow-alt ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Surat Ditolak -->
                <div class="col-xl-3 col-md-6 stat-item animate-fadeInUp" style="--delay: 4">
                    <div class="card card-dashboard h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="card-title">Surat Ditolak</h5>
                                <div class="dashboard-icon bg-danger-subtle">
                                    <i class="bx bx-x-circle text-danger"></i>
                                </div>
                            </div>
                            <h2 class="counter-value text-dark" data-target="<?php echo e($totalDitolak); ?>">0</h2>
                            <div class="d-flex align-items-center mt-3">
                                <span class="trend-indicator bg-danger-subtle text-danger">
                                    <i class="bx bx-trending-down"></i>
                                    <span>-5%</span>
                                </span>
                                <span class="text-muted fs-12 ms-2">dari bulan lalu</span>
                            </div>
                            <div class="mt-4">
                                <a href="<?php echo e(route('pengajuan-surat.status', ['status' => 'ditolak'])); ?>" class="btn btn-soft-danger view-details d-flex align-items-center justify-content-center">
                                    <span>Lihat Detail</span>
                                    <i class="bx bx-right-arrow-alt ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Info Cards -->
            <div class="row mt-4 g-3">
                <!-- Jumlah Penduduk -->
                <div class="col-xl-4 col-md-6 stat-item animate-fadeInUp" style="--delay: 5">
                    <div class="card card-dashboard h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="card-title">Jumlah Penduduk</h5>
                                <div class="dashboard-icon bg-primary-subtle">
                                    <i class="bx bxs-group text-primary"></i>
                                </div>
                            </div>
                            <h2 class="counter-value text-dark" data-target="<?php echo e($jumlahPenduduk); ?>">0</h2>
                            <div class="d-flex align-items-center mt-3">
                                <span class="trend-indicator bg-primary-subtle text-primary">
                                    <i class="bx bx-trending-up"></i>
                                    <span>+8%</span>
                                </span>
                                <span class="text-muted fs-12 ms-2">pertumbuhan tahunan</span>
                            </div>
                            
                            <!-- Population chart placeholder -->
                            <div class="mt-4" style="height: 80px;">
                                <div id="populationChart" class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Total Layanan Card with Progress -->
                <div class="col-xl-4 col-md-6 stat-item animate-fadeInUp" style="--delay: 6">
                    <div class="card card-dashboard h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="card-title">Total Layanan</h5>
                                <div class="dashboard-icon bg-secondary-subtle">
                                    <i class="bx bxs-file text-secondary"></i>
                                </div>
                            </div>
                            <h2 class="counter-value text-dark" data-target="15">0</h2>
                            <div class="d-flex align-items-center mt-3">
                                <span class="trend-indicator bg-secondary-subtle text-secondary">
                                    <i class="bx bx-sync"></i>
                                    <span>Aktif</span>
                                </span>
                                <span class="text-muted fs-12 ms-2">layanan tersedia</span>
                            </div>
                            
                            <!-- Service usage visualization -->
                            <div class="mt-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fs-12 text-muted">Penggunaan Layanan</span>
                                    <span class="fs-12 fw-medium">75%</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Statistik Bulanan -->
                <div class="col-xl-4 col-md-12 stat-item animate-fadeInUp" style="--delay: 7">
                    <div class="card card-dashboard h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="card-title">Statistik Bulanan</h5>
                                <div class="dashboard-icon bg-purple-subtle" style="background-color: rgba(107, 70, 193, 0.1);">
                                    <i class="bx bxs-bar-chart-alt-2" style="color: #6b46c1;"></i>
                                </div>
                            </div>
                            
                            <!-- Monthly statistics chart -->
                            <div style="height: 190px;">
                                <div id="monthlyStatsChart" class="apex-charts" dir="ltr"></div>
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
<script src="<?php echo e(URL::asset('build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/jsvectormap/maps/world-merc.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/dashboard-ecommerce.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>

<!-- Enhanced Counter script -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/dashboard.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?> Riwayat Pengajuan <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/css/sub.menu.pengajuan.surat.min.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-header animate-fadeIn">
        <a href="<?php echo e(route('warga.menu')); ?>" class="back-button">
            <i class="bi bi-arrow-left"></i>
        </a>
        <a href="/" class="logo d-flex align-items-center me-auto">
            <img src="assets/img/logo.png" alt="">
            <h1 class="sitename">SMART<b>LURAH</b></h1>
          </a>
        <p class="text-black">Pantau status pengajuan surat Anda</p>
    </div>

    <div class="container py-4">
        

        <div class="content-card animate-fadeIn">
            <div class="card-title">
                <i class="bi bi-clock-history"></i> Daftar Pengajuan
            </div>

            <?php if(count($pengajuans ?? []) > 0): ?>
                <?php $__currentLoopData = $pengajuans ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $statusClass = '';
                    switch ($pengajuan->status) {
                        case \App\Enums\Status::DIAJUKAN:
                            $statusClass = 'status-menunggu'; // Sesuaikan dengan kelas CSS yang Anda inginkan untuk status "diajukan"
                            break;
                        case \App\Enums\Status::DIPROSES:
                            $statusClass = 'status-diproses';
                            break;
                        case \App\Enums\Status::SELESAI:
                            $statusClass = 'status-selesai';
                            break;
                        case \App\Enums\Status::DITOLAK:
                            $statusClass = 'status-ditolak';
                            break;
                        default:
                            $statusClass = 'status-default';
                            break;
                    }
                ?>
                <div class="pengajuan-item <?php echo e($statusClass); ?>">
                    <div class="row align-items-center">
                        <div class="col-lg-5 mb-2 mb-lg-0">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <div class="d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background-color: rgba(78, 115, 223, 0.1); border-radius: 10px;">
                                        <i class="bi bi-file-earmark-text text-primary" style="font-size: 1.2rem;"></i>
                                    </div>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold"><?php echo e($pengajuan->jenisSurat->nama ?? 'Jenis Surat Tidak Diketahui'); ?></h6>
                                    <small class="text-muted">No. Pengajuan: #<?php echo e(strtoupper(str_replace(' ', '', $pengajuan->jenisSurat->nama ?? ''))); ?>-<?php echo e($pengajuan->tanggal_pengajuan->format('Ymd')); ?>-<?php echo e($pengajuan->id); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 mb-2 mb-lg-0">
                            <small class="text-muted d-block">Tanggal Pengajuan</small>
                            <span><?php echo e($pengajuan->tanggal_pengajuan->format('d M Y')); ?></span>
                        </div>
                        <div class="col-lg-2 mb-2 mb-lg-0">
                            <span class="status-badge <?php echo e($statusClass); ?>"><?php echo e($pengajuan->status->value); ?></span>
                        </div>
                        <div class="col-lg-3 text-end">
                            <a href="<?php echo e(route('warga.pengajuan-surat.show', $pengajuan->id)); ?>" class="btn btn-sm btn-primary">Detail</a>
                            <?php if($pengajuan->status == \App\Enums\Status::SELESAI): ?>
                                
                            <?php elseif($pengajuan->status == \App\Enums\Status::DITOLAK): ?>
                                <a href="#" class="btn btn-sm btn-danger">Ajukan Ulang</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="empty-state">
                    <i class="bi bi-inbox"></i>
                    <h4>Belum Ada Pengajuan</h4>
                    <p>Anda belum melakukan pengajuan surat apapun.</p>
                    <a href="<?php echo e(route('warga.formulir')); ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i> Buat Pengajuan Baru
                    </a>
                </div>
            <?php endif; ?>

            
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
    <script>
        // Script untuk filter (jika Anda mengimplementasikannya)
        $(document).ready(function() {
            $('select').on('change', function() {
                // Implementasikan logika filter Anda di sini
                console.log($(this).val());
            });

            $('input[type="text"]').on('keyup', function() {
                // Implementasikan logika pencarian Anda di sini
                console.log($(this).val());
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-without-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/dashboardwarga/riwayat_pengajuan.blade.php ENDPATH**/ ?>
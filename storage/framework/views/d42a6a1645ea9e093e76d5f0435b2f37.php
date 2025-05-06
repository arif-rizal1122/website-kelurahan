<?php $__env->startSection('title'); ?> Notifikasi <?php $__env->stopSection(); ?>
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
        <h1>
            <a href="<?php echo e(route('warga.menu')); ?>">Notifikasi</a>
        </h1>
        <p class="text-black">Riwayat dan status pengajuan surat Anda</p>
    </div>

    <div class="container py-4">
        <div class="content-card mb-4 animate-fadeIn">
            <div class="card-title d-flex justify-content-between align-items-center">
                <div>
                    <i class="bi bi-funnel"></i> Filter Status & Waktu
                </div>
                <div>
                    </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-12 col-md-6">
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-outline-primary <?php echo e(!$jenisFilter ? 'active' : ''); ?>" onclick="filterStatus('')">Semua Status</button>
                        <button type="button" class="btn btn-outline-primary <?php echo e($jenisFilter == \App\Enums\Status::DIAJUKAN ? 'active' : ''); ?>" onclick="filterStatus('<?php echo e(\App\Enums\Status::DIAJUKAN); ?>')"><?php echo e(\App\Enums\Status::DIAJUKAN->value); ?></button>
                        <button type="button" class="btn btn-outline-primary <?php echo e($jenisFilter == \App\Enums\Status::DIPROSES ? 'active' : ''); ?>" onclick="filterStatus('<?php echo e(\App\Enums\Status::DIPROSES); ?>')"><?php echo e(\App\Enums\Status::DIPROSES->value); ?></button>
                        <button type="button" class="btn btn-outline-primary <?php echo e($jenisFilter == \App\Enums\Status::SELESAI ? 'active' : ''); ?>" onclick="filterStatus('<?php echo e(\App\Enums\Status::SELESAI); ?>')"><?php echo e(\App\Enums\Status::SELESAI->value); ?></button>
                        <button type="button" class="btn btn-outline-primary <?php echo e($jenisFilter == \App\Enums\Status::DITOLAK ? 'active' : ''); ?>" onclick="filterStatus('<?php echo e(\App\Enums\Status::DITOLAK); ?>')"><?php echo e(\App\Enums\Status::DITOLAK->value); ?></button>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-3 mt-md-0">
                    <select class="form-select bg-light border-0" name="waktu" onchange="this.form.submit()">
                        <option value="" <?php echo e(!$waktuFilter ? 'selected' : ''); ?>>Semua Waktu</option>
                        <option value="Hari Ini" <?php echo e($waktuFilter == 'Hari Ini' ? 'selected' : ''); ?>>Hari Ini</option>
                        <option value="Minggu Ini" <?php echo e($waktuFilter == 'Minggu Ini' ? 'selected' : ''); ?>>Minggu Ini</option>
                        <option value="Bulan Ini" <?php echo e($waktuFilter == 'Bulan Ini' ? 'selected' : ''); ?>>Bulan Ini</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="content-card animate-fadeIn">
            <div class="card-title">
                <i class="bi bi-bell"></i> Riwayat Pengajuan Surat
            </div>

            <?php $__empty_1 = true; $__currentLoopData = $pengajuans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="notification-item ">
                    <div class="notification-time">
                        <i class="bi bi-clock me-1"></i> <?php echo e($pengajuan->created_at->format('d M Y, H:i')); ?>

                    </div>
                    <h6 class="notification-title">Pengajuan Surat: <?php echo e($pengajuan->jenisSurat->nama); ?></h6>
                    <p class="notification-content">
                        Nomor Pengajuan: <strong>#<?php echo e($pengajuan->id); ?></strong><br>
                        Status: <strong><?php echo e($pengajuan->status->value); ?></strong>
                        <?php if($pengajuan->keterangan_penolakan): ?>
                            <br>Alasan Penolakan: <?php echo e($pengajuan->keterangan_penolakan); ?>

                        <?php endif; ?>
                    </p>
                    <div class="mt-2">
                        <a href="<?php echo e(route('warga.pengajuan-surat.show', $pengajuan->id)); ?>" class="btn btn-sm btn-outline-primary">
                            Lihat Detail
                        </a>
                        <?php if($pengajuan->status == \App\Enums\Status::SELESAI && $pengajuan->jenisSurat->template_surat): ?>
                            
                        <?php elseif($pengajuan->status == \App\Enums\Status::DITOLAK): ?>
                            <a href="<?php echo e(route('warga.formulir')); ?>" class="btn btn-sm btn-danger">
                                Ajukan Ulang
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p>Tidak ada riwayat pengajuan surat.</p>
            <?php endif; ?>

            <nav aria-label="Navigasi pengajuan" class="mt-4">
                <?php echo e($pengajuans->links()); ?>

            </nav>
        </div>
    </div>
    <form id="filterForm" method="GET" action="<?php echo e(route('warga.notifikasi')); ?>" style="display: none;">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="jenis" id="filterJenis" value="<?php echo e($jenisFilter); ?>">
        <input type="hidden" name="waktu" value="<?php echo e($waktuFilter); ?>">
    </form>
    <script>
        function filterStatus(status) {
            document.getElementById('filterJenis').value = status;
            document.getElementById('filterForm').submit();
        }
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-without-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/dashboardwarga/notifikasi.blade.php ENDPATH**/ ?>
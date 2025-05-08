<?php $__env->startSection('title'); ?> Riwayat Pengajuan <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/css/sub.menu.pengajuan.surat.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<style>
    .animate__fadeIn {
        animation-duration: 0.5s;
        animation-name: fadeIn;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header bg-light py-5 animate__animated animate__fadeIn">
    <div class="container">
        <div class="d-flex flex-column align-items-start">
            <a href="<?php echo e(route('warga.menu')); ?>" class="logo d-flex align-items-center mb-2 text-decoration-none">
                <img src="assets/img/logo.png" alt="" height="30" class="me-2">
                <h1 class="sitename text-primary fw-bold mb-0">SMART<b>LURAH</b></h1>
            </a>
            <p class="text-muted fw-semibold mb-0">Form Riwayat Pengajuan</p>
        </div>
    </div>
    </div>

<div class="container py-4">
    <div class="content-card mb-4 animate-fadeIn">
        <div class="card-title d-flex justify-content-between align-items-center">
            <div>
                <i class='bx bx-filter'></i> Filter Status & Waktu
            </div>
            <div></div>
        </div>
        <div class="row g-3 align-items-center">
            <div class="col-12 col-md-auto">
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-outline-primary <?php echo e(!$statusFilter ? 'active' : ''); ?>" onclick="filterStatus('')">
                        Semua Status <span class="badge bg-secondary"><?php echo e($jumlahSemua); ?></span>
                    </button>
                    <button type="button" class="btn btn-outline-primary <?php echo e($statusFilter == \App\Enums\Status::DIAJUKAN ? 'active' : ''); ?>" onclick="filterStatus('<?php echo e(\App\Enums\Status::DIAJUKAN); ?>')">
                        <?php echo e(\App\Enums\Status::DIAJUKAN->value); ?> <span class="badge bg-info"><?php echo e($jumlahDiajukan); ?></span>
                    </button>
                    <button type="button" class="btn btn-outline-primary <?php echo e($statusFilter == \App\Enums\Status::DIPROSES ? 'active' : ''); ?>" onclick="filterStatus('<?php echo e(\App\Enums\Status::DIPROSES); ?>')">
                        <?php echo e(\App\Enums\Status::DIPROSES->value); ?> <span class="badge bg-warning"><?php echo e($jumlahDiproses); ?></span>
                    </button>
                    <button type="button" class="btn btn-outline-primary <?php echo e($statusFilter == \App\Enums\Status::SELESAI ? 'active' : ''); ?>" onclick="filterStatus('<?php echo e(\App\Enums\Status::SELESAI); ?>')">
                        <?php echo e(\App\Enums\Status::SELESAI->value); ?> <span class="badge bg-success"><?php echo e($jumlahSelesai); ?></span>
                    </button>
                    <button type="button" class="btn btn-outline-primary <?php echo e($statusFilter == \App\Enums\Status::DITOLAK ? 'active' : ''); ?>" onclick="filterStatus('<?php echo e(\App\Enums\Status::DITOLAK); ?>')">
                        <?php echo e(\App\Enums\Status::DITOLAK->value); ?> <span class="badge bg-danger"><?php echo e($jumlahDitolak); ?></span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-auto">
                <form id="filterForm" method="GET">
                    <?php if($statusFilter): ?>
                        <input type="hidden" name="status" value="<?php echo e($statusFilter); ?>">
                    <?php endif; ?>
                    <select class="form-select bg-light border-0" name="waktu" onchange="document.getElementById('filterForm').submit();">
                        <option value="" <?php echo e(!$waktuFilter ? 'selected' : ''); ?>>Semua Waktu</option>
                        <option value="Hari Ini" <?php echo e($waktuFilter == 'Hari Ini' ? 'selected' : ''); ?>>Hari Ini</option>
                        <option value="Minggu Ini" <?php echo e($waktuFilter == 'Minggu Ini' ? 'selected' : ''); ?>>Minggu Ini</option>
                        <option value="Bulan Ini" <?php echo e($waktuFilter == 'Bulan Ini' ? 'selected' : ''); ?>>Bulan Ini</option>
                    </select>
                </form>
            </div>
        </div>
    </div>

    <div class="content-card animate-fadeIn">
        <div class="card-title">
            <i class="bi bi-clock-history"></i> Riwayat Pengajuan Surat
        </div>

        <?php $__empty_1 = true; $__currentLoopData = $pengajuans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="notification-item">
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

<form id="filterForm" method="GET" action="<?php echo e(route('warga.riwayat')); ?>" style="display: none;">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="status" id="filterStatus" value="<?php echo e($statusFilter); ?>">
    <input type="hidden" name="waktu" value="<?php echo e($waktuFilter); ?>">
</form>

<script>
    function filterStatus(status) {
        const currentUrl = new URL(window.location.href);
        currentUrl.searchParams.set('status', status);
        window.location.href = currentUrl.toString();
    }
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/dashboardwarga/riwayat_pengajuan.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?> Detail Pengajuan <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(URL::asset('build/css/sub.menu.pengajuan.surat.min.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-header animate-fadeIn">
        <a href="<?php echo e(route('warga.riwayat')); ?>" class="back-button">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h1>
            <a href="<?php echo e(route('warga.menu')); ?>">Detail Pengajuan Surat</a>
        </h1>
        <p class="text-black">Informasi lengkap mengenai pengajuan surat Anda.</p>
    </div>

    <div class="container py-4">
        <div class="card shadow-sm animate-fadeIn">
            <div class="card-header bg-primary text-white">
                <i class="bi bi-file-earmark-text me-2"></i> Detail Pengajuan
            </div>
            <div class="card-body p-4">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong class="text-muted">Jenis Surat:</strong>
                    </div>
                    <div class="col-md-9">
                        <?php echo e($pengajuanSurat->jenisSurat->nama ?? '-'); ?>

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong class="text-muted">Tanggal Pengajuan:</strong>
                    </div>
                    <div class="col-md-9">
                        <?php echo e($pengajuanSurat->tanggal_pengajuan->format('d-m-Y H:i')); ?>

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong class="text-muted">Keperluan:</strong>
                    </div>
                    <div class="col-md-9">
                        <?php echo e($pengajuanSurat->keperluan ?? '-'); ?>

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong class="text-muted">Status:</strong>
                    </div>
                    <div class="col-md-9">
                        <span class="badge 
                            <?php echo e($pengajuanSurat->status == \App\Enums\Status::DIAJUKAN ? 'bg-warning' : ''); ?>

                            <?php echo e($pengajuanSurat->status == \App\Enums\Status::DIPROSES ? 'bg-info' : ''); ?>

                            <?php echo e($pengajuanSurat->status == \App\Enums\Status::SELESAI ? 'bg-success' : ''); ?>

                            <?php echo e($pengajuanSurat->status == \App\Enums\Status::DITOLAK ? 'bg-danger' : ''); ?>

                        ">
                            <?php echo e($pengajuanSurat->status->value); ?>

                        </span>
                    </div>
                </div>
                <?php if($pengajuanSurat->keterangan_penolakan): ?>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong class="text-muted">Keterangan Penolakan:</strong>
                        </div>
                        <div class="col-md-9">
                            <?php echo e($pengajuanSurat->keterangan_penolakan); ?>

                        </div>
                    </div>
                <?php endif; ?>
                <?php if($pengajuanSurat->file_pendukung): ?>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong class="text-muted">File Pendukung:</strong>
                        </div>
                        <div class="col-md-9">
                            <a href="<?php echo e(asset('storage/' . $pengajuanSurat->file_pendukung)); ?>" class="btn btn-sm btn-outline-secondary" target="_blank"><i class="bi bi-file-earmark-arrow-down me-1"></i> Lihat File</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-without-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/dashboardwarga/detail_pengajuan.blade.php ENDPATH**/ ?>
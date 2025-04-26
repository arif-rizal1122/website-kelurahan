<?php $__env->startSection('title'); ?> Detail Surat Masuk <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Surat <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Detail Surat Masuk <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-envelope-open font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">Detail Surat Masuk</h4>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <div class="p-3 bg-light rounded mb-3">
                            <div class="d-flex justify-content-between">
                                <span class="badge bg-primary">No. <?php echo e($surat->nomor_surat ?? '-'); ?></span>
                                <span class="badge bg-info">Kode: <?php echo e($surat->kode_surat ?? '-'); ?></span>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-primary" style="width: 30%;">
                                            <i class="bx bx-user-voice me-2"></i>Dari
                                        </td>
                                        <td class="text-primary"><?php echo e($surat->dari ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-primary">
                                            <i class="bx bx-target-lock me-2"></i>Tujuan
                                        </td>
                                        <td class="text-primary"><?php echo e($surat->tujuan ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-primary">
                                            <i class="bx bx-calendar me-2"></i>Tanggal Surat
                                        </td>
                                        <td class="text-primary">
                                            <?php if($surat->tanggal_surat): ?>
                                                <span class="badge bg-soft-success text-success">
                                                    <?php echo e(\Carbon\Carbon::parse($surat->tanggal_surat)->format('d F Y')); ?>

                                                </span>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-primary">
                                            <i class="bx bx-calendar-check me-2"></i>Tanggal Diterima
                                        </td>
                                        <td class="text-primary">
                                            <?php if($surat->tanggal_diterima): ?>
                                                <span class="badge bg-soft-info text-info">
                                                    <?php echo e(\Carbon\Carbon::parse($surat->tanggal_diterima)->format('d F Y')); ?>

                                                </span>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bx bx-notepad me-2"></i>Ringkasan</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-muted"><?php echo e($surat->ringkasan ?? '-'); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bx bx-comment-detail me-2"></i>Catatan</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-muted"><?php echo e($surat->catatan ?? '-'); ?></p>
                            </div>
                        </div>
                    </div>

                    <?php if($surat->attachments->isNotEmpty()): ?>
                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bx bx-paperclip me-2"></i>Lampiran</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <?php $__currentLoopData = $surat->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-6 mb-2">
                                        <div class="p-2 border rounded d-flex align-items-center">
                                            <i class="bx bxs-file-pdf text-danger font-size-24 me-2"></i>
                                            <a href="<?php echo e(asset('storage/' . $attachment->path)); ?>"
                                               class="text-reset text-decoration-none stretched-link"
                                               target="_blank">
                                                <?php echo e($attachment->filename); ?>

                                            </a>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="row mt-4 align-items-center gy-2">
                        <div class="col-12 col-md-auto">
                            <a href="<?php echo e(route('surat-masuk.index')); ?>" class="btn btn-secondary w-100">
                                <i class="bx bx-arrow-back me-1"></i> Kembali
                            </a>
                        </div>
                        <div class="col-12 col-md d-flex justify-content-md-end gap-2 flex-wrap">
                            <a href="<?php echo e(route('surat-masuk.edit', $surat->id)); ?>" class="btn btn-warning">
                                <i class="bx bx-edit me-1"></i> Edit
                            </a>
                            <button type="button" class="btn btn-primary" onclick="window.print()">
                                <i class="bx bx-printer me-1"></i> Cetak
                            </button>
                        </div>
                    </div> 
                                        
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/surat/masuk/show.blade.php ENDPATH**/ ?>
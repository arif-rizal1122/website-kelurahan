<?php $__env->startSection('title'); ?>
    Detail Jenis Surat
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Surat
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Detail Jenis Surat
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-file-text font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">
                            Detail Jenis Surat
                        </h4>
                    </div>
                </div>
                <div class="card-body p-4">

                    <div class="mb-4">

                        <div class="table-responsive">
                            <table class="table table-borderless table-hover">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-primary" style="width: 30%;">
                                            <i class="bx bx-file-alt me-2"></i>Nama Surat
                                        </td>
                                        <td class="text-primary"><?php echo e($jenisSurat->nama ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-primary" style="width: 30%;">
                                            <i class="bx bx-file-alt me-2"></i>Code Surat
                                        </td>
                                        <td class="text-primary"><?php echo e($jenisSurat->code ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-primary">
                                            <i class="bx bx-notepad me-2"></i>Deskripsi
                                        </td>
                                        <td class="text-primary"><?php echo e($jenisSurat->deskripsi ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-primary">
                                            <i class="bx bx-notepad me-2"></i>Template Surat
                                        </td>
                                        <td class="text-primary"><?php echo e($jenisSurat->template_surat ?? '-'); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-4 align-items-center gy-2">
                        <div class="col-12 col-md-auto">
                            <a href="<?php echo e(route('jenis-surat.index')); ?>" class="btn btn-secondary w-100">
                                <i class="bx bx-arrow-back me-1"></i> Kembali
                            </a>
                        </div>
                        <div class="col-12 col-md d-flex justify-content-md-end gap-2 flex-wrap">
                        <?php if(Auth::user()->role === 'admin'): ?>
                            <a href="<?php echo e(route('jenis-surat.edit', $jenisSurat->id)); ?>" class="btn btn-warning">
                                <i class="bx bx-edit me-1"></i> Edit
                            </a>
                        </div>
                        <?php endif; ?>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/pengajuan/jenisSurat/show.blade.php ENDPATH**/ ?>
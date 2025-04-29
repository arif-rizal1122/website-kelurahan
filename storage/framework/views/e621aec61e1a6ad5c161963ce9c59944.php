// resources/views/pengajuan-surat/reject.blade.php

<?php $__env->startSection('title'); ?>
    Tolak Pengajuan Surat
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Pengajuan Surat
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Tolak Pengajuan Surat
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Alasan Penolakan</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('pengajuan-surat.storeRejection', $pengajuanSurat->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="keterangan_penolakan" class="form-label">Keterangan Penolakan <span class="text-danger">*</span></label>
                            <textarea class="form-control <?php $__errorArgs = ['keterangan_penolakan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                id="keterangan_penolakan" name="keterangan_penolakan" rows="4" 
                                placeholder="Jelaskan alasan penolakan pengajuan surat" required><?php echo e(old('keterangan_penolakan')); ?></textarea>
                            <?php $__errorArgs = ['keterangan_penolakan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-danger">
                                <i class="bx bx-x-circle me-1"></i> Tolak Pengajuan
                            </button>
                            <a href="<?php echo e(route('pengajuan-surat.index')); ?>" class="btn btn-light">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/pengajuan/pengajuanSurat/reject.blade.php ENDPATH**/ ?>
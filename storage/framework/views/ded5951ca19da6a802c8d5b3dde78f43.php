<?php $__env->startSection('title'); ?>
    Detail User
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Users
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Detail User
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-user font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">Detail User</h4>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <div class="p-3 bg-light rounded mb-3">
                            <div class="d-flex justify-content-between">
                                <span class="badge bg-primary">ID: <?php echo e($user->id); ?></span>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-borderless table-hover">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-primary" style="width: 30%;">
                                            <i class="bx bx-user me-2"></i>Nama
                                        </td>
                                        <td class="text-primary"><?php echo e($user->name ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-primary">
                                            <i class="bx bx-envelope me-2"></i>Email
                                        </td>
                                        <td class="text-primary"><?php echo e($user->email ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-primary">
                                            <i class="bx bx-shield me-2"></i>Role
                                        </td>
                                        <td class="text-primary">
                                            <?php if($user->role): ?>
                                                <span class="badge bg-soft-success text-success">
                                                    <?php echo e(ucfirst($user->role)); ?>

                                                </span>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-primary">
                                            <i class="bx bx-id-card me-2"></i>NIP
                                        </td>
                                        <td class="text-primary"><?php echo e($user->nip ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-primary">
                                            <i class="bx bx-briefcase me-2"></i>Jabatan
                                        </td>
                                        <td class="text-primary"><?php echo e($user->jabatan ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-primary">
                                            <i class="bx bx-image me-2"></i>Avatar
                                        </td>
                                        <td class="text-primary">
                                            <?php if($user->avatar): ?>
                                                <img src="<?php echo e(asset('storage/' . $user->avatar)); ?>" alt="Avatar"
                                                    class="img-thumbnail" width="100">
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-4 align-items-center gy-2">
                        <div class="col-12 col-md-auto">
                            <a href="<?php echo e(route('users.index')); ?>" class="btn btn-secondary w-100">
                                <i class="bx bx-arrow-back me-1"></i> Kembali
                            </a>
                        </div>
                        <div class="col-12 col-md d-flex justify-content-md-end gap-2 flex-wrap">
                            <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-warning">
                                <i class="bx bx-edit me-1"></i> Edit
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/users/show.blade.php ENDPATH**/ ?>
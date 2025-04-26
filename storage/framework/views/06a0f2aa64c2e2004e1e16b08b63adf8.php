<?php $__env->startSection('title'); ?> Unit Kerja <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Tables <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>Data Unit <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Data Unit</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUnitModal">
                            Tambah Unit
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kode</th>
                                    <th>Deskripsi</th>
                                    <th>Kepala Unit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($unit->nama); ?></td>
                                        <td><?php echo e($unit->kode ?? '-'); ?></td>
                                        <td><?php echo e($unit->deskripsi ?? '-'); ?></td>
                                        <td><?php echo e($unit->nama_kepala_unit); ?></td>
                                        <td>
                                            <div class="d-flex flex-wrap gap-1">
                                                <a href="<?php echo e(route('units.show', $unit->id)); ?>" class="btn btn-sm btn-info">Detail</a>
                                                <button class="btn btn-sm btn-warning edit-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editUnitModal"
                                                    data-id="<?php echo e($unit->id); ?>"
                                                    data-nama="<?php echo e($unit->nama); ?>"
                                                    data-kode="<?php echo e($unit->kode); ?>"
                                                    data-deskripsi="<?php echo e($unit->deskripsi); ?>"
                                                    data-kepala_unit_id="<?php echo e($unit->kepala_unit_id); ?>">
                                                    Edit
                                                </button>
                                                <form action="<?php echo e(route('units.destroy', $unit->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-unit">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('units.create', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('units.edit', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div id="hapus-unit" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="text-end">
                        <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="mt-2">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" style="width:100px;height:100px"></lord-icon>
                        <h4 class="mt-4">Anda yakin ingin menghapus unit ini?</h4>
                        <p class="text-muted fs-15 mb-4">Data yang sudah dihapus tidak dapat dikembalikan.</p>
                        <div class="hstack gap-3 justify-content-center">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-danger btn-hapus-unit">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/datatables.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
 
<?php $__env->stopSection(); ?>

<?php if($errors->any()): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            <?php if($errors->hasAny(['nama', 'kode', 'deskripsi', 'kepala_unit_id'])): ?>
                <?php if(session('edit_modal')): ?>
                    var editModal = new bootstrap.Modal(document.getElementById('editUnitModal'));
                    editModal.show();
                <?php else: ?>
                    var createModal = new bootstrap.Modal(document.getElementById('createUnitModal'));
                    createModal.show();
                <?php endif; ?>
            <?php endif; ?>
        });
    </script>
<?php endif; ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/units/index.blade.php ENDPATH**/ ?>
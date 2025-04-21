<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.datatables'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Tables <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>Data Surat Keluar <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Data Surat Keluar</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSuratKeluarModal">
                            Tambah Surat Keluar
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nomor Surat</th>
                                    <th>Pengirim</th>
                                    <th>tujuan surat</th>
                                    <th>Tanggal Surat</th>
                                    <th>Tanggal Pengiriman</th>
                                    <th>Lampiran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $surats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($surat->nomor_surat); ?></td>
                                        <td><?php echo e($surat->dari); ?></td>
                                        <td><?php echo e($surat->tujuan); ?></td>
                                        <td><?php echo e($surat->tanggal_surat ? \Carbon\Carbon::parse($surat->tanggal_surat)->format('d-m-Y') : '-'); ?></td>
                                        <td><?php echo e($surat->tanggal_pengiriman ? \Carbon\Carbon::parse($surat->tanggal_pengiriman)->format('d-m-Y') : '-'); ?></td>
                                        <td>
                                            <?php if($surat->attachments->isNotEmpty()): ?>
                                                <?php $__currentLoopData = $surat->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(route('surat-keluar.show', $surat->id)); ?>" target="_blank" style="color: #dc3545;">
                                                        <i class="bx bxs-file-pdf bx-sm"></i>
                                                    </a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                Tidak Ada Lampiran
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('surat-keluar.show', $surat->id)); ?>" class="btn btn-sm btn-info">Detail</a>
                                            <button class="btn btn-sm btn-warning edit-btn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editSuratKeluarModal"
                                                data-id="<?php echo e($surat->id); ?>"
                                                data-nomor_surat="<?php echo e($surat->nomor_surat); ?>"
                                                data-dari="<?php echo e($surat->dari); ?>"
                                                data-tujuan="<?php echo e($surat->tujuan); ?>"
                                                data-tanggal_surat="<?php echo e($surat->tanggal_surat ? \Carbon\Carbon::parse($surat->tanggal_surat)->format('Y-m-d') : ''); ?>"
                                                data-tanggal_pengiriman="<?php echo e($surat->tanggal_pengiriman ? \Carbon\Carbon::parse($surat->tanggal_pengiriman)->format('Y-m-d') : ''); ?>"
                                                data-catatan="<?php echo e($surat->catatan); ?>"
                                                data-isi_surat="<?php echo e($surat->isi_surat); ?>"
                                                data-attachments="<?php echo e(json_encode($surat->attachments)); ?>">
                                                Edit
                                            </button>
                                            <form action="<?php echo e(route('surat-keluar.destroy', $surat->id)); ?>" method="POST" style="display: inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-surat-keluar">Hapus</button>
                                            </form>
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

    <?php echo $__env->make('surat.keluar.create', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('surat.keluar.edit', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div id="hapus-surat-keluar" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="text-end">
                        <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="mt-2">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" style="width:100px;height:100px"></lord-icon>
                        <h4 class="mt-4">Anda yakin ingin menghapus surat keluar ini?</h4>
                        <p class="text-muted fs-15 mb-4">Data yang sudah dihapus tidak dapat dikembalikan.</p>
                        <div class="hstack gap-3 justify-content-center">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-danger btn-hapus-surat-keluar">Hapus</button>
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
            <?php if($errors->hasAny(['nomor_surat', 'dari', 'isi_surat', 'tujuan', 'tanggal_surat', 'tanggal_pengiriman', 'catatan', 'attachments', 'removed_attachments'])): ?>
                var editModal = new bootstrap.Modal(document.getElementById('editSuratKeluarModal'));
                editModal.show();
            <?php endif; ?>
        });
    </script>
<?php endif; ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/surat/keluar/index.blade.php ENDPATH**/ ?>
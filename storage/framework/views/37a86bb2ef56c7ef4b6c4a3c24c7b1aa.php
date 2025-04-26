<?php $__env->startSection('title'); ?> Index Surat Masuk <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Tables <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>Data Surat Masuk <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2">
                        <h5 class="card-title mb-0">Data Surat Masuk</h5>
                        <a href="<?php echo e(route('surat-masuk.create')); ?>" class="btn btn-primary">
                            Tambah Surat Masuk
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nomor Surat</th>
                                    <th>Dari</th>
                                    <th>Ringkasan</th>
                                    <th>Tanggal Surat</th>
                                    <th>Tanggal Diterima</th>
                                    <th>Lampiran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $surats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($surat->nomor_surat); ?></td>
                                        <td><?php echo e($surat->dari); ?></td>
                                        <td><?php echo e(Str::limit($surat->ringkasan, 70)); ?></td>
                                        <td><?php echo e($surat->tanggal_surat ? \Carbon\Carbon::parse($surat->tanggal_surat)->format('d-m-Y') : '-'); ?></td>
                                        <td><?php echo e($surat->tanggal_diterima ? \Carbon\Carbon::parse($surat->tanggal_diterima)->format('d-m-Y') : '-'); ?></td>
                                        <td>
                                            <?php if($surat->attachments->isNotEmpty()): ?>
                                                <?php $__currentLoopData = $surat->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(asset('storage/' . $attachment->path)); ?>" target="_blank" style="color: #dc3545;">
                                                        <i class="bx bxs-file-pdf bx-sm"></i>
                                                    </a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                Tidak Ada Lampiran
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1 overflow-auto">
                                                <a href="<?php echo e(route('surat-masuk.show', $surat->id)); ?>" class="btn btn-sm btn-info">Detail</a>
                                                <a href="<?php echo e(route('surat-masuk.edit', $surat->id)); ?>" class="btn btn-sm btn-warning">
                                                    Edit
                                                </a>
                                                <form action="<?php echo e(route('surat-masuk.destroy', $surat->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-surat-masuk">Hapus</button>
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


    <div id="hapus-surat-masuk" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="text-end">
                        <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="mt-2">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" style="width:100px;height:100px"></lord-icon>
                        <h4 class="mt-4">Anda yakin ingin menghapus surat masuk ini?</h4>
                        <p class="text-muted fs-15 mb-4">Data yang sudah dihapus tidak dapat dikembalikan.</p>
                        <div class="hstack gap-3 justify-content-center">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-danger btn-hapus-surat-masuk">Hapus</button>
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

    <script>
        $('#hapus-surat-masuk').on('show.bs.modal', function(e) {
			const button = $(e.relatedTarget);
			const form = button.closest('form');
			const action = form.attr('action');

			$(this).find('.btn-hapus-surat-masuk').off('click').on('click', function() {
				form.submit();
			});
		});
    </script>
<?php $__env->stopSection(); ?>

<?php if($errors->any()): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            <?php if($errors->hasAny(['nomor_surat', 'dari', 'tujuan', 'tanggal_surat', 'tanggal_diterima', 'catatan', 'ringkasan', 'attachments', 'removed_attachments'])): ?>
                var editModal = new bootstrap.Modal(document.getElementById('editSuratMasukModal'));
                editModal.show();
            <?php endif; ?>
        });
    </script>
<?php endif; ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/surat/masuk/index.blade.php ENDPATH**/ ?>
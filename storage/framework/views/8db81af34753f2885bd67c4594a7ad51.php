<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.datatables'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Tables <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>Datatables <?php $__env->endSlot(); ?>
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
                                <th>Perihal</th>
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
                                <td><?php echo e($surat->pengirim); ?></td>
                                <td><?php echo e($surat->perihal); ?></td>
                                <td><?php echo e($surat->tanggal_surat); ?></td>
                                <td><?php echo e($surat->tanggal_diterima); ?></td>
                                <td>
                                    <?php if($surat->lampiran): ?>
                                        <a href="<?php echo e(asset('storage/' . $surat->lampiran)); ?>" target="_blank">Lihat</a>
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
                                        data-pengirim="<?php echo e($surat->pengirim); ?>"
                                        data-perihal="<?php echo e($surat->perihal); ?>"
                                        data-tanggal_surat="<?php echo e($surat->tanggal_surat); ?>"
                                        data-tanggal_diterima="<?php echo e($surat->tanggal_diterima); ?>"
                                        data-lampiran="<?php echo e($surat->lampiran); ?>">
                                        Edit
                                    </button>
                                    <form action="<?php echo e(route('surat-keluar.destroy', $surat->id)); ?>" method="POST" style="display: inline-block;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-surat-masuk">Hapus</button>
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
<script>
$(document).ready(function() {
    $('#editSuratKeluarModal').on('show.bs.modal', function(e) {
        const button = $(e.relatedTarget);
        const surat = button.data();

        if (surat.id) {
            const updateUrl = `/surat-keluar/${surat.id}`; // Sesuaikan dengan route Anda
            $(this).find('#editSuratKeluarForm').attr('action', updateUrl);
            $(this).find('#edit_id').val(surat.id);
            $(this).find('#edit_nomor_surat').val(surat.nomor_surat);
            $(this).find('#edit_pengirim').val(surat.pengirim);
            $(this).find('#edit_perihal').val(surat.perihal);
            $(this).find('#edit_tanggal_surat').val(surat.tanggal_surat);
            $(this).find('#edit_tanggal_diterima').val(surat.tanggal_diterima);
            // Anda mungkin tidak ingin menampilkan atau mengedit nama file secara langsung
            // $(this).find('#edit_lampiran').val(surat.lampiran);
        } else {
            console.error('ID surat keluar tidak ditemukan');
        }
    });

    $('#hapus-surat-keluar').on('show.bs.modal', function(e) {
        const button = $(e.relatedTarget);
        const form = button.closest('form');
        const action = form.attr('action');

        $(this).find('.btn-hapus-surat-keluar').off('click').on('click', function() {
            form.submit();
        });
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/surat/keluar/index.blade.php ENDPATH**/ ?>
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
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Data Penduduk</h5>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPendudukModal">
                        Tambah Penduduk
                    </button>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat Sekarang</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $penduduks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penduduk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($penduduk->nama); ?></td>
                                    <td><?php echo e($penduduk->nik); ?></td>
                                    <td>
                                       <?php echo e($penduduk->jenis_kelamin); ?>

                                    </td>
                                    <td><?php echo e($penduduk->tanggal_lahir); ?></td>
                                    <td><?php echo e($penduduk->alamat_sekarang); ?></td>
                                    <td><?php echo e($penduduk->email); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('penduduk.show', $penduduk->id)); ?>" class="btn btn-sm btn-info">Detail</a>
                                        <button class="btn btn-sm btn-warning edit-btn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editPendudukModal"
                                            data-id="<?php echo e($penduduk->id); ?>"
                                            data-nik="<?php echo e($penduduk->nik); ?>"
                                            data-nama="<?php echo e($penduduk->nama); ?>"
                                            data-email="<?php echo e($penduduk->email); ?>"
                                            data-jenis_kelamin="<?php echo e($penduduk->jenis_kelamin); ?>"
                                            data-tempat_lahir="<?php echo e($penduduk->tempat_lahir); ?>"
                                            data-tanggal_lahir="<?php echo e($penduduk->tanggal_lahir); ?>"
                                            data-alamat_sekarang="<?php echo e($penduduk->alamat_sekarang); ?>"
                                            data-alamat_sebelumnya="<?php echo e($penduduk->alamat_sebelumnya); ?>"
                                            data-agama="<?php echo e($penduduk->agama); ?>"
                                            data-status_kawin="<?php echo e($penduduk->status_kawin); ?>"
                                            data-status_keadaan="<?php echo e($penduduk->status_keadaan); ?>"
                                            data-warga_negara="<?php echo e($penduduk->warga_negara); ?>"
                                            data-pendidikan_terakhir="<?php echo e($penduduk->pendidikan_terakhir); ?>"
                                            data-pekerjaan="<?php echo e($penduduk->pekerjaan); ?>"
                                            data-ayah_nik="<?php echo e($penduduk->ayah_nik); ?>"
                                            data-ibu_nik="<?php echo e($penduduk->ibu_nik); ?>"
                                            data-nama_ayah="<?php echo e($penduduk->nama_ayah); ?>"
                                            data-nama_ibu="<?php echo e($penduduk->nama_ibu); ?>"
                                            data-hubungan_warga="<?php echo e($penduduk->hubungan_warga); ?>"
                                            data-no_kk_sebelumnya="<?php echo e($penduduk->no_kk_sebelumnya); ?>"
                                            data-golongan_darah="<?php echo e($penduduk->golongan_darah); ?>"
                                            data-suku="<?php echo e($penduduk->suku); ?>"
                                            data-ktp_el="<?php echo e($penduduk->ktp_el); ?>"
                                            data-status_rekam="<?php echo e($penduduk->status_rekam); ?>"
                                            data-tempat_cetak_ktp="<?php echo e($penduduk->tempat_cetak_ktp); ?>"
                                            data-tanggal_cetak_ktp="<?php echo e($penduduk->tanggal_cetak_ktp); ?>"
                                            data-note="<?php echo e($penduduk->note); ?>">
                                            Edit
                                        </button>

                                        <form action="<?php echo e(route('penduduk.destroy', $penduduk->id)); ?>" method="POST" style="display: inline-block;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-penduduk">Hapus</button>
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

<?php echo $__env->make('penduduk.create', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('penduduk.edit', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div id="hapus-penduduk" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <div class="text-end">
                    <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="mt-2">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" style="width:100px;height:100px"></lord-icon>
                    <h4 class="mt-4">Anda yakin ingin menghapus data ini?</h4>
                    <p class="text-muted fs-15 mb-4">Data yang sudah dihapus tidak dapat dikembalikan.</p>
                    <div class="hstack gap-3 justify-content-center">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger btn-hapus-penduduk">Hapus</button>
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
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/penduduk/index.blade.php ENDPATH**/ ?>
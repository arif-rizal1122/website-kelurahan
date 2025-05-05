<?php $__env->startSection('title'); ?>
    Data Pengajuan Surat
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Pengajuan Surat
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Data Pengajuan Surat <?php echo e($statusName); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <!-- Statistics Row -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <a href="<?php echo e(route('pengajuan-surat.status', 'diajukan')); ?>" class="btn btn-sm btn-outline-warning me-1">
                            <i class="bx bxs-inbox me-1"></i> Diajukan
                        </a>
                        <a href="<?php echo e(route('pengajuan-surat.status', 'diproses')); ?>" class="btn btn-sm btn-outline-info me-1">
                            <i class="bx bx-loader-circle me-1"></i> Diproses
                        </a>
                        <a href="<?php echo e(route('pengajuan-surat.status', 'selesai')); ?>" class="btn btn-sm btn-outline-success me-1">
                            <i class="bx bx-check-double me-1"></i> Selesai
                        </a>
                        <a href="<?php echo e(route('pengajuan-surat.status', 'ditolak')); ?>" class="btn btn-sm btn-outline-secondary">
                            <i class="bx bx-x-circle me-1"></i> Ditolak
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Warga</th>
                                    <th>Jenis Surat</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Keperluan</th>
                                    <th>Status</th>
                                    <th>Petugas</th>
                                    <th>File Pendukung</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $pengajuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuanSurat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($pengajuanSurat->warga->nama ?? '-'); ?></td>
                                        <td><?php echo e($pengajuanSurat->jenisSurat->nama ?? '-'); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($pengajuanSurat->tanggal_pengajuan)->format('d-m-Y')); ?></td>
                                        <td><?php echo e($pengajuanSurat->keperluan); ?></td>
                                        <td>
                                            <?php
                                                $statusClass = '';
                                                $statusIcon = '';
                                                
                                                if ($pengajuanSurat->status == \App\Enums\Status::DIAJUKAN) {
                                                    $statusClass = 'status-diajukan';
                                                    $statusIcon = 'bx bxs-inbox';
                                                } elseif ($pengajuanSurat->status == \App\Enums\Status::DIPROSES) {
                                                    $statusClass = 'status-diproses';
                                                    $statusIcon = 'bx bx-loader-circle';
                                                } elseif ($pengajuanSurat->status == \App\Enums\Status::SELESAI) {
                                                    $statusClass = 'status-selesai';
                                                    $statusIcon = 'bx bx-check-double';
                                                } elseif ($pengajuanSurat->status == \App\Enums\Status::DITOLAK) {
                                                    $statusClass = 'status-ditolak';
                                                    $statusIcon = 'bx bx-x-circle';
                                                }
                                            ?>
                                            
                                            <span class="status-badge <?php echo e($statusClass); ?>">
                                                <i class="<?php echo e($statusIcon); ?>"></i> <?php echo e($pengajuanSurat->status->value); ?>

                                            </span>
                                        </td>
                                        <td><?php echo e($pengajuanSurat->user->name ?? '-'); ?></td>
                                        <td>
                                            <?php if($pengajuanSurat->file_pendukung): ?>
                                                <a href="<?php echo e(asset('storage/' . $pengajuanSurat->file_pendukung)); ?>"
                                                   target="_blank"
                                                   class="text-primary"> 
                                                    <i class="bx bxs-file-pdf bx-sm align-middle"></i> 
                                                </a>
                                            <?php else: ?>
                                                <span class="text-muted">Tidak Ada</span>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <div class="d-flex gap-1 overflow-auto">
                                                <a href="<?php echo e(route('pengajuan-surat.show', $pengajuanSurat->id)); ?>"
                                                    class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Lihat Detail">
                                                    <i class="bx bx-detail"></i> Detail
                                                </a>
                                        
                                                <?php if($pengajuanSurat->status == \App\Enums\Status::DIAJUKAN): ?>
                                                    <button type="button" class="btn btn-sm btn-warning process-btn" 
                                                        data-id="<?php echo e($pengajuanSurat->id); ?>"
                                                        data-status="<?php echo e(\App\Enums\Status::DIPROSES); ?>"
                                                        data-bs-toggle="tooltip" title="Proses Pengajuan">
                                                        <i class="bx bx-task"></i> Proses
                                                    </button>
                                                    
                                                    <a href="<?php echo e(route('pengajuan-surat.reject', $pengajuanSurat->id)); ?>" 
                                                        class="btn btn-sm btn-secondary reject-btn"
                                                        data-bs-toggle="tooltip" title="Tolak Pengajuan">
                                                        <i class="bx bx-x-circle"></i> Tolak
                                                    </a>
                                                <?php elseif($pengajuanSurat->status == \App\Enums\Status::DIPROSES): ?>
                                                    <button type="button" class="btn btn-sm btn-success complete-btn" 
                                                        data-id="<?php echo e($pengajuanSurat->id); ?>"
                                                        data-status="<?php echo e(\App\Enums\Status::SELESAI); ?>"
                                                        data-bs-toggle="tooltip" title="Selesaikan Pengajuan">
                                                        <i class="bx bx-check-circle"></i> Selesaikan
                                                    </button>
                                                <?php elseif($pengajuanSurat->status == \App\Enums\Status::SELESAI): ?>
                                                    <a href="<?php echo e(route('pengajuan-surat.print', $pengajuanSurat->id)); ?>" class="btn btn-primary btn-sm">
                                                        <i class="bx bx-printer"></i> Cetak Word
                                                    </a>
                                                <?php elseif($pengajuanSurat->status == \App\Enums\Status::DITOLAK): ?>
                                                    <button type="button" class="btn btn-sm btn-secondary" disabled>
                                                        <i class="bx bx-info-circle"></i> Ditolak
                                                    </button>
                                                <?php endif; ?>

                                                <?php if(auth()->guard()->check()): ?>
                                                <?php if(Auth::user()->role === 'admin'): ?>
                                                    <button type="button" class="btn btn-sm btn-danger delete-btn" 
                                                        data-id="<?php echo e($pengajuanSurat->id); ?>"
                                                        data-bs-toggle="tooltip" title="Hapus Pengajuan">
                                                        <i class="bx bx-trash"></i> Hapus
                                                    </button>
                                                <?php endif; ?>
                                                <?php endif; ?>

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

    <!-- Modal Konfirmasi Hapus -->
    <div id="delete-modal" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="text-end">
                        <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="mt-2">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" style="width:100px;height:100px"></lord-icon>
                        <h4 class="mt-4">Anda yakin ingin menghapus pengajuan surat ini?</h4>
                        <p class="text-muted fs-15 mb-4">Data yang sudah dihapus tidak dapat dikembalikan.</p>
                        <div class="hstack gap-3 justify-content-center">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-danger" id="confirm-delete">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form processing untuk status update -->
    <form id="process-form" action="" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
    </form>

    <!-- Form delete -->
    <form id="delete-form" action="" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
       
                $(document).ready(function() {
                // Process button click handler
                $('.process-btn').on('click', function() {
                    const id = $(this).data('id');
                    const status = $(this).data('status');
                    
                    Swal.fire({
                        title: 'Proses Pengajuan?',
                        text: 'Anda yakin ingin memproses pengajuan ini?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, proses!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#process-form').attr('action', `/pengajuan-surat/${id}/process`);
                            $('#process-form').submit();
                        }
                    });
                });
                
                // Complete button click handler
                $('.complete-btn').on('click', function() {
                    const id = $(this).data('id');
                    const status = $(this).data('status');
                    
                    Swal.fire({
                        title: 'Selesaikan Pengajuan?',
                        text: 'Anda yakin ingin menyelesaikan pengajuan ini?',
                        icon: 'success',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, selesaikan!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#process-form').attr('action', `/pengajuan-surat/${id}/complete`);
                            $('#process-form').submit();
                        }
                    });
                });
                
                // Reject button click handler
                $('.reject-btn').on('click', function() {
                    const id = $(this).data('id');
                    const status = $(this).data('status');
                    
                    Swal.fire({
                        title: 'Tolak Pengajuan?',
                        text: 'Anda yakin ingin menolak pengajuan ini?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, tolak!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#process-form').attr('action', `/pengajuan-surat/${id}/reject`);
                            $('#process-form').submit();
                        }
                    });
                });
                
                // Delete button click handler
                $('.delete-btn').on('click', function() {
                    const id = $(this).data('id');
                    $('#delete-form').attr('action', `/pengajuan-surat/${id}`);
                    $('#delete-modal').modal('show');
                });
                
                // Confirm delete button
                $('#confirm-delete').on('click', function() {
                    $('#delete-form').submit();
                });
                
                // Initialize tooltips
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                });
            });
    </script>
    
    <?php if(session('success')): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?php echo e(session('success')); ?>',
                timer: 3000,
                showConfirmButton: false
            });
        });
    </script>
    <?php endif; ?>
    
    <?php if(session('error')): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '<?php echo e(session('error')); ?>',
                timer: 3000,
                showConfirmButton: false
            });
        });
    </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/pengajuan/pengajuanSurat/show_by_status.blade.php ENDPATH**/ ?>
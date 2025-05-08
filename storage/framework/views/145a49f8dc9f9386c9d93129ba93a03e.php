<?php $__env->startSection('title'); ?>
    Detail Pengajuan Surat
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Surat
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Detail Pengajuan Surat
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-info text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-file-text font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">Detail Pengajuan Surat</h4>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <div class="p-3 bg-light rounded mb-3">
                            <div class="d-flex justify-content-between">
                                <span class="badge bg-info">ID: <?php echo e($pengajuanSurat->id); ?></span>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-borderless table-hover">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-info" style="width: 30%;">
                                            <i class="bx bx-user me-2"></i>Warga
                                        </td>
                                        <td class="text-black"><?php echo e($pengajuanSurat->warga->nama ?? '-'); ?> (NIK: <?php echo e($pengajuanSurat->warga->nik ?? '-'); ?>)</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-file me-2"></i>Jenis Surat
                                        </td>
                                        <td class="text-black"><?php echo e($pengajuanSurat->jenisSurat->nama ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-calendar me-2"></i>Tanggal Pengajuan
                                        </td>
                                        <td class="text-black"><?php echo e($pengajuanSurat->tanggal_pengajuan ? $pengajuanSurat->tanggal_pengajuan->format('d-m-Y') : '-'); ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-label me-2"></i>Status
                                        </td>
                                        <td class="text-black">
                                            <?php if($pengajuanSurat->status): ?>
                                                <?php
                                                    $statusClass = '';
                                                    switch ($pengajuanSurat->status->value) {
                                                        case \App\Enums\Status::DIAJUKAN->value:
                                                            $statusClass = 'info';
                                                            break;
                                                        case \App\Enums\Status::DIPROSES->value:
                                                            $statusClass = 'warning';
                                                            break;
                                                        case \App\Enums\Status::SELESAI->value:
                                                            $statusClass = 'success';
                                                            break;
                                                        case \App\Enums\Status::DITOLAK->value:
                                                            $statusClass = 'danger';
                                                            break;
                                                        default:
                                                            $statusClass = 'secondary'; // Untuk status yang tidak terdefinisi
                                                            break;
                                                    }
                                                ?>
                                                <span class="badge bg-<?php echo e($statusClass); ?>"><?php echo e($pengajuanSurat->status->name); ?></span>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-calendar-check me-2"></i>Tanggal Diproses
                                        </td>
                                        <td class="text-black"><?php echo e($pengajuanSurat->tanggal_diproses ? $pengajuanSurat->tanggal_diproses->format('d-m-Y') : '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-user-check me-2"></i>Diproses Oleh
                                        </td>
                                        <td class="text-black"><?php echo e($pengajuanSurat->user->name ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-calendar-check me-2"></i>Tanggal Selesai
                                        </td>
                                        <td class="text-black"><?php echo e($pengajuanSurat->tanggal_selesai ? $pengajuanSurat->tanggal_selesai->format('d-m-Y') : '-'); ?></td>
                                    </tr>
                                    <?php if($pengajuanSurat->keterangan): ?>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-question-mark me-2"></i>Apa
                                        </td>
                                        <td class="text-black"><?php echo e($pengajuanSurat->keterangan->apa ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-question-mark me-2"></i>Mengapa
                                        </td>
                                        <td class="text-black"><?php echo e($pengajuanSurat->keterangan->mengapa ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-calendar me-2"></i>Kapan
                                        </td>
                                        <td class="text-black"><?php echo e($pengajuanSurat->keterangan->kapan ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-map me-2"></i>Di Mana
                                        </td>
                                        <td class="text-black"><?php echo e($pengajuanSurat->keterangan->di_mana ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-user me-2"></i>Siapa
                                        </td>
                                        <td class="text-black"><?php echo e($pengajuanSurat->keterangan->siapa ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-directions me-2"></i>Bagaimana
                                        </td>
                                        <td class="text-black"><?php echo e($pengajuanSurat->keterangan->bagaimana ?? '-'); ?></td>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-note me-2"></i>Keterangan
                                        </td>
                                        <td class="text-black">-</td>
                                    </tr>
                                <?php endif; ?>

                                    <tr>
                                        <td class="fw-bold text-info">
                                            <i class="bx bx-message-alt-error me-2"></i>Keterangan Penolakan
                                        </td>
                                        <td class="text-black"><?php echo e($pengajuanSurat->keterangan_penolakan ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-primary">
                                            <i class="bx bxs-file-pdf bx-sm align-middle"></i> </i>File Pendukung
                                        </td>
                                        <td class="text-black">
                                            <?php if($pengajuanSurat->file_pendukung): ?>
                                                <a href="<?php echo e(asset('storage/' . $pengajuanSurat->file_pendukung)); ?>" target="_blank" class="text-black">
                                                    <i class="bx bxs-file-pdf bx-sm align-middle"></i> 
                                                </a>
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
                            <a href="<?php echo e(route('pengajuan-surat.index')); ?>" class="btn btn-secondary w-100">
                                <i class="bx bx-arrow-back me-1"></i> Kembali
                            </a>
                        </div>
                        <?php if(Auth::user()->role === 'admin'): ?>
                        <div class="col-12 col-md d-flex justify-content-md-end gap-2 flex-wrap">
                            <a href="<?php echo e(route('pengajuan-surat.edit', $pengajuanSurat->id)); ?>" class="btn btn-warning">
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
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/pengajuan/pengajuanSurat/show.blade.php ENDPATH**/ ?>
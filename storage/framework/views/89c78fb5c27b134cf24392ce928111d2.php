<?php $__env->startSection('title'); ?>
    Edit Pengajuan Surat
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Surat
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Edit Pengajuan Surat
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-info text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-edit font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">Form Edit Pengajuan Surat</h4>
                    </div>
                </div>
                <div class="card-body p-4">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('pengajuan-surat.update', $pengajuanSurat->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="mb-3">
                            <label for="warga_id" class="form-label fw-bold text-info">
                                <i class="bx bx-user me-1"></i>Warga <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select2 <?php $__errorArgs = ['warga_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="warga_id"
                                name="warga_id"
                                required>
                                <option value="">Pilih Warga</option>
                                <?php $__currentLoopData = $wargas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($warga->id); ?>" <?php echo e(old('warga_id', $pengajuanSurat->warga_id) == $warga->id ? 'selected' : ''); ?>>
                                        <?php echo e($warga->nama); ?> - <?php echo e($warga->nik); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['warga_id'];
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

                        <div class="mb-3">
                            <label for="jenis_surat_id" class="form-label fw-bold text-info">
                                <i class="bx bx-file me-1"></i>Jenis Surat <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select2 <?php $__errorArgs = ['jenis_surat_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="jenis_surat_id"
                                name="jenis_surat_id"
                                required>
                                <option value="">Pilih Jenis Surat</option>
                                <?php $__currentLoopData = $jenisSurats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenisSurat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($jenisSurat->id); ?>" <?php echo e(old('jenis_surat_id', $pengajuanSurat->jenis_surat_id) == $jenisSurat->id ? 'selected' : ''); ?>>
                                        <?php echo e($jenisSurat->nama); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                            <?php $__errorArgs = ['jenis_surat_id'];
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

                        <div class="mb-3">
                            <label for="tanggal_pengajuan" class="form-label fw-bold text-info">
                                <i class="bx bx-calendar me-1"></i>Tanggal Pengajuan
                            </label>
                            <input type="date"
                                class="form-control <?php $__errorArgs = ['tanggal_pengajuan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="tanggal_pengajuan"
                                name="tanggal_pengajuan"
                                value="<?php echo e(old('tanggal_pengajuan', $pengajuanSurat->tanggal_pengajuan ? $pengajuanSurat->tanggal_pengajuan->toDateString() : null)); ?>">
                            <?php $__errorArgs = ['tanggal_pengajuan'];
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

                        <div class="mb-3">
                            <label for="keperluan" class="form-label fw-bold text-info">
                                <i class="bx bx-note me-1"></i>Keperluan
                            </label>
                            <textarea class="form-control <?php $__errorArgs = ['keperluan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="keperluan"
                                name="keperluan"
                                rows="3"
                                placeholder="Jelaskan keperluan pengajuan surat"><?php echo e(old('keperluan', $pengajuanSurat->keperluan)); ?></textarea>
                            <?php $__errorArgs = ['keperluan'];
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

                        
                        <div class="mb-3">
                            <label for="tanggal_diproses" class="form-label fw-bold text-info">
                                <i class="bx bx-calendar-check me-1"></i>Tanggal Diproses
                            </label>
                            <input type="date"
                                class="form-control <?php $__errorArgs = ['tanggal_diproses'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="tanggal_diproses"
                                name="tanggal_diproses"
                                value="<?php echo e(old('tanggal_diproses', $pengajuanSurat->tanggal_diproses ? $pengajuanSurat->tanggal_diproses->toDateString() : null)); ?>">
                            <?php $__errorArgs = ['tanggal_diproses'];
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

                        <div class="mb-3">
                            <label for="user_id" class="form-label fw-bold text-info">
                                <i class="bx bx-user-check me-1"></i>User yang Memproses
                            </label>
                            <select class="form-control select2 <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="user_id"
                                name="user_id">
                                <option value="">Pilih User</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>" <?php echo e(old('user_id', $pengajuanSurat->user_id) == $user->id ? 'selected' : ''); ?>>
                                        <?php echo e($user->name); ?> (<?php echo e($user->email); ?>)
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['user_id'];
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

                        <div class="mb-3">
                            <label for="tanggal_selesai" class="form-label fw-bold text-info">
                                <i class="bx bx-calendar-check me-1"></i>Tanggal Selesai
                            </label>
                            <input type="date"
                                class="form-control <?php $__errorArgs = ['tanggal_selesai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="tanggal_selesai"
                                name="tanggal_selesai"
                                value="<?php echo e(old('tanggal_selesai', $pengajuanSurat->tanggal_selesai ? $pengajuanSurat->tanggal_selesai->toDateString() : null)); ?>">
                            <?php $__errorArgs = ['tanggal_selesai'];
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

                        <div class="mb-3">
                            <label for="status_pengajuan" class="form-label fw-bold text-info">
                                <i class="bx bx-label me-1"></i>Status <span class="text-danger">*</span>
                            </label>
                            <select class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="status_pengajuan"
                                name="status"
                                required>
                                <option value="">Pilih Status</option>
                                <?php $__currentLoopData = \App\Enums\Status::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($status->value); ?>" <?php echo e(old('status', $pengajuanSurat->status?->value) == $status->value ? 'selected' : ''); ?>>
                                        <?php echo e($status->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['status'];
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


                        <div class="mb-3">
                            <label for="keterangan_penolakan" class="form-label fw-bold text-info">
                                <i class="bx bx-message-alt-error me-1"></i>Keterangan Penolakan
                            </label>
                            <textarea class="form-control <?php $__errorArgs = ['keterangan_penolakan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="keterangan_penolakan"
                                name="keterangan_penolakan"
                                rows="3"
                                placeholder="Alasan penolakan (jika ditolak)"><?php echo e(old('keterangan_penolakan', $pengajuanSurat->keterangan_penolakan)); ?></textarea>
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

                        <div class="mb-4">
                            <label for="file_pendukung" class="form-label fw-bold text-info">
                                <i class="bx bx-upload me-1"></i>File Pendukung (PDF, DOC, DOCX, Max: 2MB)
                            </label>
                            <input type="file"
                                class="form-control <?php $__errorArgs = ['file_pendukung'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="file_pendukung"
                                name="file_pendukung"
                                accept=".pdf,.doc,.docx">
                            <?php if($pengajuanSurat->file_pendukung): ?>
                                <small class="text-muted">File saat ini: <a href="<?php echo e(asset('storage/' . $pengajuanSurat->file_pendukung)); ?>" target="_blank">Lihat File</a></small>
                            <?php endif; ?>
                            <?php $__errorArgs = ['file_pendukung'];
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

                        <div class="d-flex flex-wrap justify-content-between align-items-center mt-4 gap-2">
                            <a href="<?php echo e(route('pengajuan-surat.index')); ?>" class="btn btn-sm btn-secondary flex-grow-1 flex-md-grow-0">
                                <i class="bx bx-arrow-back me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-sm btn-primary flex-grow-1 flex-md-grow-0">
                                <i class="bx bx-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/pengajuan/pengajuanSurat/edit.blade.php ENDPATH**/ ?>
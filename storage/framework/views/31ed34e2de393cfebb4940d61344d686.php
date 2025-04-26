<?php $__env->startSection('title'); ?> Edit Surat Masuk <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Surat <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Edit Surat Masuk <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-warning text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-pencil font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">Form Edit Surat Masuk</h4>
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

                    <form action="<?php echo e(route('surat-masuk.update', $surat->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?> 

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nomor_surat" class="form-label fw-bold text-warning">
                                        <i class="bx bx-hash me-1"></i>Nomor Surat <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control <?php $__errorArgs = ['nomor_surat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="nomor_surat"
                                           name="nomor_surat"
                                           value="<?php echo e(old('nomor_surat', $surat->nomor_surat)); ?>" 
                                           placeholder="Masukkan nomor surat"
                                           maxlength="35"
                                           required>
                                    <?php $__errorArgs = ['nomor_surat'];
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
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="tanggal_surat" class="form-label fw-bold text-warning">
                                        <i class="bx bx-calendar me-1"></i>Tanggal Surat <span class="text-danger">*</span>
                                    </label>
                                    <input type="date"
                                           class="form-control <?php $__errorArgs = ['tanggal_surat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="tanggal_surat"
                                           name="tanggal_surat"
                                           value="<?php echo e(old('tanggal_surat', $surat->tanggal_surat ? $surat->tanggal_surat->format('Y-m-d') : '')); ?>" 
                                           required>
                                    <?php $__errorArgs = ['tanggal_surat'];
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
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="dari" class="form-label fw-bold text-warning">
                                        <i class="bx bx-user-voice me-1"></i>Dari <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control <?php $__errorArgs = ['dari'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="dari"
                                           name="dari"
                                           value="<?php echo e(old('dari', $surat->dari)); ?>" 
                                           placeholder="Masukkan pengirim surat"
                                           required>
                                    <?php $__errorArgs = ['dari'];
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
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="tujuan" class="form-label fw-bold text-warning">
                                        <i class="bx bx-target-lock me-1"></i>Tujuan <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control <?php $__errorArgs = ['tujuan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="tujuan"
                                           name="tujuan"
                                           value="<?php echo e(old('tujuan', $surat->tujuan)); ?>" 
                                           placeholder="Masukkan tujuan surat"
                                           required>
                                    <?php $__errorArgs = ['tujuan'];
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
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="tanggal_diterima" class="form-label fw-bold text-warning">
                                    <i class="bx bx-inbox me-1"></i>Tanggal Diterima <span class="text-danger">*</span>
                                </label>
                                <input type="date"
                                       class="form-control <?php $__errorArgs = ['tanggal_diterima'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="tanggal_diterima"
                                       name="tanggal_diterima"
                                       value="<?php echo e(old('tanggal_diterima', $surat->tanggal_diterima ? $surat->tanggal_diterima->format('Y-m-d') : '')); ?>" 
                                       required>
                                <?php $__errorArgs = ['tanggal_diterima'];
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
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="ringkasan" class="form-label fw-bold text-warning">
                                    <i class="bx bx-notepad me-1"></i>Ringkasan <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control <?php $__errorArgs = ['ringkasan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                          id="ringkasan"
                                          name="ringkasan"
                                          rows="5"
                                          placeholder="Masukkan ringkasan surat"
                                          required><?php echo e(old('ringkasan', $surat->ringkasan)); ?></textarea> 
                                <?php $__errorArgs = ['ringkasan'];
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
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="catatan" class="form-label fw-bold text-warning">
                                    <i class="bx bx-comment-detail me-1"></i>Catatan
                                </label>
                                <textarea class="form-control <?php $__errorArgs = ['catatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                          id="catatan"
                                          name="catatan"
                                          rows="3"
                                          placeholder="Masukkan catatan surat"><?php echo e(old('catatan', $surat->catatan)); ?></textarea> 
                                <?php $__errorArgs = ['catatan'];
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
                        </div>

                        <div class="mb-4">
                            <div class="form-group">
                                <label for="attachments" class="form-label fw-bold text-warning">
                                    <i class="bx bx-paperclip me-1"></i>Lampiran Baru
                                </label>
                                <div class="card shadow-none border">
                                    <div class="card-body">
                                        <div class="dropzone-wrapper">
                                            <div class="dropzone-desc">
                                                <i class="bx bx-upload font-size-24 mb-2 d-block text-muted"></i>
                                                <p class="text-muted mb-1">Klik atau seret file ke sini untuk mengunggah</p>
                                                <p class="small text-muted mb-0">Format file yang diizinkan: PDF (Maks: 2MB)</p>
                                            </div>
                                            <input type="file"
                                                   class="form-control dropzone-input"
                                                   id="attachments"
                                                   name="attachments[]"
                                                   accept="application/pdf"
                                                   multiple>
                                        </div>
                                        <?php $__errorArgs = ['attachments.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger small mt-2"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php if($surat->attachments->isNotEmpty()): ?>
                        <div class="mb-4">
                            <label class="form-label fw-bold text-info">
                                <i class="bx bx-paperclip me-1"></i>Lampiran Saat Ini
                            </label>
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <?php $__currentLoopData = $surat->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <i class="bx bxs-file-pdf text-danger font-size-20 me-1"></i>
                                                        <a href="<?php echo e(asset('storage/' . $attachment->path)); ?>" target="_blank" class="text-reset text-decoration-none">
                                                            <?php echo e($attachment->filename); ?>

                                                        </a>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="remove_attachment_<?php echo e($attachment->id); ?>" name="removed_attachments[]" value="<?php echo e($attachment->id); ?>">
                                                        <label class="form-check-label text-danger small" for="remove_attachment_<?php echo e($attachment->id); ?>">Hapus</label>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="d-flex flex-wrap justify-content-between align-items-center mt-4 gap-2">
                            <a href="<?php echo e(route('surat-masuk.index')); ?>" class="btn btn-sm btn-secondary flex-grow-1 flex-md-grow-0">
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




<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/surat/masuk/edit.blade.php ENDPATH**/ ?>
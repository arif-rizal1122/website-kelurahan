 <?php $__env->startSection('title'); ?>
     Tambah Pengajuan Surat
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
             Tambah Pengajuan Surat
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>

     <div class="row justify-content-center">
         <div class="col-lg-10">
             <div class="card shadow-lg border-0">
                 <div class="card-header bg-success text-white">
                     <div class="d-flex align-items-center">
                         <i class="bx bx-envelope-open font-size-24 me-2"></i>
                         <h4 class="card-title mb-0">Form Tambah Pengajuan Surat</h4>
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

                     <form action="<?php echo e(route('pengajuan-surat.store')); ?>" method="POST" enctype="multipart/form-data">
                         <?php echo csrf_field(); ?>

                         <div class="mb-3">
                             <div class="form-group">
                                 <label for="warga_id" class="form-label fw-bold text-success">
                                     <i class="bx bx-user me-1"></i>Warga <span class="text-danger">*</span>
                                 </label>
                                 <select class="form-control <?php $__errorArgs = ['warga_id'];
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
                                     <?php $__currentLoopData = \App\Models\Warga::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($warga->id); ?>" <?php echo e(old('warga_id') == $warga->id ? 'selected' : ''); ?>>
                                             <?php echo e($warga->nama); ?>

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
                         </div>

                         <div class="mb-3">
                             <div class="form-group">
                                 <label for="jenis_surat_id" class="form-label fw-bold text-success">
                                     <i class="bx bx-file me-1"></i>Jenis Surat <span class="text-danger">*</span>
                                 </label>
                                 <select class="form-control <?php $__errorArgs = ['jenis_surat_id'];
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
                                     <?php $__currentLoopData = \App\Models\JenisSurat::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenisSurat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($jenisSurat->id); ?>" <?php echo e(old('jenis_surat_id') == $jenisSurat->id ? 'selected' : ''); ?>>
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
                         </div>

                         <div class="mb-3">
                             <div class="form-group">
                                 <label for="tanggal_pengajuan" class="form-label fw-bold text-success">
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
                                     value="<?php echo e(old('tanggal_pengajuan')); ?>">
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
                         </div>

                         <div class="mb-3">
                             <div class="form-group">
                                 <label for="keperluan" class="form-label fw-bold text-success">
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
                                     placeholder="Masukkan keperluan"><?php echo e(old('keperluan')); ?></textarea>
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
                         </div>

                         <div class="mb-3">
                             <div class="form-group">
                                 <label for="status" class="form-label fw-bold text-success">
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
                                     id="status"
                                     name="status"
                                     required>
                                     <option value="">Pilih Status</option>
                                     <?php $__currentLoopData = \App\Enums\Status::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($statusOption->value); ?>" <?php echo e(old('status') == $statusOption->value ? 'selected' : ''); ?>>
                                             <?php echo e($statusOption->name); ?>

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
                         </div>

                         <div class="mb-3">
                             <div class="form-group">
                                 <label for="tanggal_diproses" class="form-label fw-bold text-success">
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
                                     value="<?php echo e(old('tanggal_diproses')); ?>">
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
                         </div>

                         <div class="mb-3">
                             <div class="form-group">
                                 <label for="user_id" class="form-label fw-bold text-success">
                                     <i class="bx bx-user-check me-1"></i>Petugas yang Memproses
                                 </label>
                                 <select class="form-control <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                     id="user_id"
                                     name="user_id">
                                     <option value="">Pilih Petugas</option>
                                     <?php $__currentLoopData = \App\Models\User::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($user->id); ?>" <?php echo e(old('user_id') == $user->id ? 'selected' : ''); ?>>
                                             <?php echo e($user->name); ?>

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
                         </div>

                         <div class="mb-3">
                             <div class="form-group">
                                 <label for="tanggal_selesai" class="form-label fw-bold text-success">
                                     <i class="bx bx-calendar-x me-1"></i>Tanggal Selesai
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
                                     value="<?php echo e(old('tanggal_selesai')); ?>">
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
                         </div>

                         <div class="mb-3">
                             <div class="form-group">
                                 <label for="keterangan_penolakan" class="form-label fw-bold text-success">
                                     <i class="bx bx-message-error me-1"></i>Keterangan Penolakan
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
                                     placeholder="Masukkan keterangan penolakan (jika ada)"><?php echo e(old('keterangan_penolakan')); ?></textarea>
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
                         </div>

                         <div class="mb-4">
                             <div class="form-group">
                                 <label for="file_pendukung" class="form-label fw-bold text-success">
                                     <i class="bx bx-file-plus me-1"></i>File Pendukung
                                 </label>
                                 <div class="card shadow-none border">
                                     <div class="card-body">
                                         <div class="dropzone-wrapper">
                                             <div class="dropzone-desc">
                                                 <i class="bx bx-upload font-size-24 mb-2 d-block text-muted"></i>
                                                 <p class="text-muted mb-1">Klik atau seret file ke sini untuk mengunggah</p>
                                                 <p class="small text-muted mb-0">Format file yang diizinkan: PDF, DOC, DOCX (Maks:
                                                     2MB)</p>
                                             </div>
                                             <input type="file"
                                                 class="form-control dropzone-input"
                                                 id="file_pendukung"
                                                 name="file_pendukung"
                                                 accept=".pdf,.doc,.docx">
                                         </div>
                                         <?php $__errorArgs = ['file_pendukung'];
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

                         <div class="d-flex flex-wrap justify-content-between align-items-center mt-4 gap-2">
                             <a href="<?php echo e(route('pengajuan-surat.index')); ?>"
                                 class="btn btn-sm btn-secondary flex-grow-1 flex-md-grow-0">
                                 <i class="bx bx-arrow-back me-1"></i> Kembali
                             </a>
                             <button type="submit" class="btn btn-sm btn-primary flex-grow-1 flex-md-grow-0">
                                 <i class="bx bx-save me-1"></i> Simpan
                             </button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('script'); ?>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

     <script>
         $(document).ready(function() {
             $("#datatable").DataTable({
                 language: {
                     url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
                 },
             });
         });
     </script>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/pengajuan/pengajuanSurat/create.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.edit'); ?> Edit Data Penduduk
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Penduduk <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Edit Data Penduduk <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-user-edit font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">Form Edit Penduduk</h4>
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

                    <form action="<?php echo e(route('penduduk.update', $penduduk->id)); ?>" method="POST">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="penduduk" value="<?php echo e($penduduk->id); ?>">

                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2"><i class="bx bx-user-circle me-1"></i>Data Pribadi</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nama" class="form-label fw-bold text-primary">
                                        <i class="bx bx-user me-1"></i>Nama Lengkap <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="nama"
                                           name="nama"
                                           value="<?php echo e(old('nama', $penduduk->nama)); ?>"
                                           placeholder="Masukkan nama lengkap"
                                           maxlength="100"
                                           required>
                                    <?php $__errorArgs = ['nama'];
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
                                    <label for="nik" class="form-label fw-bold text-primary">
                                        <i class="bx bx-id-card me-1"></i>NIK <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="nik"
                                           name="nik"
                                           value="<?php echo e(old('nik', $penduduk->nik)); ?>"
                                           placeholder="Masukkan NIK"
                                           maxlength="16"
                                           required>
                                    <?php $__errorArgs = ['nik'];
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
                                    <label for="email" class="form-label fw-bold text-primary">
                                        <i class="bx bx-envelope me-1"></i>Email <span class="text-danger">*</span>
                                    </label>
                                    <input type="email"
                                           class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="email"
                                           name="email"
                                           value="<?php echo e(old('email', $penduduk->email)); ?>"
                                           placeholder="Masukkan email"
                                           required>
                                    <?php $__errorArgs = ['email'];
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
                                    <label for="jenis_kelamin" class="form-label fw-bold text-primary">
                                        <i class="bx bx-male-female me-1"></i>Jenis Kelamin <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select <?php $__errorArgs = ['jenis_kelamin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="jenis_kelamin"
                                            name="jenis_kelamin"
                                            required>
                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                        <?php $__currentLoopData = \App\Enums\JenisKelamin::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenisKelamin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($jenisKelamin->value); ?>"
                                                    <?php echo e(old('jenis_kelamin', $penduduk->jenis_kelamin) == $jenisKelamin->value ? 'selected' : ''); ?>>
                                                <?php echo e($jenisKelamin->value); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['jenis_kelamin'];
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
                                    <label for="tempat_lahir" class="form-label fw-bold text-primary">
                                        <i class="bx bx-map-pin me-1"></i>Tempat Lahir <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control <?php $__errorArgs = ['tempat_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="tempat_lahir"
                                           name="tempat_lahir"
                                           value="<?php echo e(old('tempat_lahir', $penduduk->tempat_lahir)); ?>"
                                           placeholder="Masukkan tempat lahir"
                                           maxlength="100"
                                           required>
                                    <?php $__errorArgs = ['tempat_lahir'];
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
                                    <label for="tanggal_lahir" class="form-label fw-bold text-primary">
                                        <i class="bx bx-calendar me-1"></i>Tanggal Lahir <span class="text-danger">*</span>
                                    </label>
                                    <input type="date"
                                           class="form-control <?php $__errorArgs = ['tanggal_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="tanggal_lahir"
                                           name="tanggal_lahir"
                                           value="<?php echo e(old('tanggal_lahir', $penduduk->tanggal_lahir)); ?>"
                                           required>
                                    <?php $__errorArgs = ['tanggal_lahir'];
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
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="agama" class="form-label fw-bold text-primary">
                                        <i class="bx bx-church me-1"></i>Agama <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select <?php $__errorArgs = ['agama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="agama"
                                            name="agama"
                                            required>
                                        <option value="" selected disabled>Pilih Agama</option>
                                        <?php $__currentLoopData = \App\Enums\Agama::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agama): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($agama->value); ?>"
                                                    <?php echo e(old('agama', $penduduk->agama) == $agama->value ? 'selected' : ''); ?>>
                                                <?php echo e($agama->value); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['agama'];
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

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="status_kawin" class="form-label fw-bold text-primary">
                                        <i class="bx bx-heart me-1"></i>Status Perkawinan <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select <?php $__errorArgs = ['status_kawin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="status_kawin"
                                            name="status_kawin"
                                            required>
                                        <option value="" selected disabled>Pilih Status Perkawinan</option>
                                        <?php $__currentLoopData = \App\Enums\StatusKawin::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusKawin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($statusKawin->value); ?>"
                                                    <?php echo e(old('status_kawin', $penduduk->status_kawin) == $statusKawin->value ? 'selected' : ''); ?>>
                                                <?php echo e($statusKawin->value); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['status_kawin'];
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

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="warga_negara" class="form-label fw-bold text-primary">
                                        <i class="bx bx-flag me-1"></i>Warga Negara <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control <?php $__errorArgs = ['warga_negara'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="warga_negara"
                                           name="warga_negara"
                                           value="<?php echo e(old('warga_negara', $penduduk->warga_negara)); ?>"
                                           placeholder="Masukkan kewarganegaraan"
                                           maxlength="50"
                                           required>
                                    <?php $__errorArgs = ['warga_negara'];
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

                        <div class="row mb-4 mt-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2"><i class="bx bx-buildings me-1"></i>Pendidikan & Pekerjaan</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="pendidikan_terakhir" class="form-label fw-bold text-primary">
                                        <i class="bx bx-book-open me-1"></i>Pendidikan Terakhir <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select <?php $__errorArgs = ['pendidikan_terakhir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="pendidikan_terakhir"
                                            name="pendidikan_terakhir"
                                            required>
                                        <option value="" selected disabled>Pilih Pendidikan Terakhir</option>
                                        <?php $__currentLoopData = \App\Enums\Pendidikan::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendidikan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($pendidikan->value); ?>"
                                                    <?php echo e(old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == $pendidikan->value ? 'selected' : ''); ?>>
                                                <?php echo e($pendidikan->value); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['pendidikan_terakhir'];
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
                                    <label for="pekerjaan" class="form-label fw-bold text-primary">
                                        <i class="bx bx-briefcase me-1"></i>Pekerjaan <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control <?php $__errorArgs = ['pekerjaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="pekerjaan"
                                           name="pekerjaan"
                                           value="<?php echo e(old('pekerjaan', $penduduk->pekerjaan)); ?>"
                                           placeholder="Masukkan pekerjaan"
                                           maxlength="100"
                                           required>
                                    <?php $__errorArgs = ['pekerjaan'];
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

                        <div class="row mb-4 mt-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2"><i class="bx bx-home me-1"></i>Alamat</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="alamat_sekarang" class="form-label fw-bold text-primary">
                                        <i class="bx bx-map me-1"></i>Alamat Sekarang <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control <?php $__errorArgs = ['alamat_sekarang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                              id="alamat_sekarang"
                                              name="alamat_sekarang"
                                              rows="3"
                                              placeholder="Masukkan alamat sekarang"
                                              maxlength="200"
                                              required><?php echo e(old('alamat_sekarang', $penduduk->alamat_sekarang)); ?></textarea>
                                    <?php $__errorArgs = ['alamat_sekarang'];
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
                                    <label for="alamat_sebelumnya" class="form-label fw-bold text-primary">
                                        <i class="bx bx-map-alt me-1"></i>Alamat Sebelumnya
                                    </label>
                                    <textarea class="form-control <?php $__errorArgs = ['alamat_sebelumnya'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                              id="alamat_sebelumnya"
                                              name="alamat_sebelumnya"
                                              rows="3"
                                              placeholder="Masukkan alamat sebelumnya (jika ada)"
                                              maxlength="200"><?php echo e(old('alamat_sebelumnya', $penduduk->alamat_sebelumnya)); ?></textarea>
                                    <?php $__errorArgs = ['alamat_sebelumnya'];
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

                        <div class="row mb-4 mt-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2"><i class="bx bx-group me-1"></i>Data Orang Tua</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nama_ayah" class="form-label fw-bold text-primary">
                                        <i class="bx bx-male me-1"></i>Nama Ayah <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control <?php $__errorArgs = ['nama_ayah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="nama_ayah"
                                           name="nama_ayah"
                                           value="<?php echo e(old('nama_ayah', $penduduk->nama_ayah)); ?>"
                                           placeholder="Masukkan nama ayah"
                                           maxlength="100"
                                           required>
                                    <?php $__errorArgs = ['nama_ayah'];
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
                                    <label for="ayah_nik" class="form-label fw-bold text-primary">
                                        <i class="bx bx-id-card me-1"></i>NIK Ayah
                                    </label>
                                    <input type="text"
                                           class="form-control <?php $__errorArgs = ['ayah_nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="ayah_nik"
                                           name="ayah_nik"
                                           value="<?php echo e(old('ayah_nik', $penduduk->ayah_nik)); ?>"
                                           placeholder="Masukkan NIK ayah (jika ada)"
                                           maxlength="16">
                                    <?php $__errorArgs = ['ayah_nik'];
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
                                    <label for="nama_ibu" class="form-label fw-bold text-primary">
                                        <i class="bx bx-female me-1"></i>Nama Ibu <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control <?php $__errorArgs = ['nama_ibu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="nama_ibu"
                                           name="nama_ibu"
                                           value="<?php echo e(old('nama_ibu', $penduduk->nama_ibu)); ?>"
                                           placeholder="Masukkan nama ibu"
                                           maxlength="100"
                                           required>
                                    <?php $__errorArgs = ['nama_ibu'];
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
                                    <label for="ibu_nik" class="form-label fw-bold text-primary">
                                        <i class="bx bx-id-card me-1"></i>NIK Ibu
                                    </label>
                                    <input type="text"
                                           class="form-control <?php $__errorArgs = ['ibu_nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="ibu_nik"
                                           name="ibu_nik"
                                           value="<?php echo e(old('ibu_nik', $penduduk->ibu_nik)); ?>"
                                           placeholder="Masukkan NIK ibu (jika ada)"
                                           maxlength="16">
                                    <?php $__errorArgs = ['ibu_nik'];
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

                        <div class="row mb-4 mt-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2"><i class="bx bx-detail me-1"></i>Informasi Tambahan</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="hubungan_warga" class="form-label fw-bold text-primary">
                                        <i class="bx bx-link me-1"></i>Hubungan Warga <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select <?php $__errorArgs = ['hubungan_warga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="hubungan_warga"
                                            name="hubungan_warga"
                                            required>
                                        <option value="" selected disabled>Pilih Hubungan Warga</option>
                                        <?php $__currentLoopData = \App\Enums\HubunganWarga::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hubunganWarga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($hubunganWarga->value); ?>"
                                                    <?php echo e(old('hubungan_warga', $penduduk->hubungan_warga) == $hubunganWarga->value ? 'selected' : ''); ?>>
                                                <?php echo e($hubunganWarga->value); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['hubungan_warga'];
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
                                    <label for="no_kk_sebelumnya" class="form-label fw-bold text-primary">
                                        <i class="bx bx-file me-1"></i>No. KK Sebelumnya
                                    </label>
                                    <input type="text"
                                           class="form-control <?php $__errorArgs = ['no_kk_sebelumnya'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="no_kk_sebelumnya"
                                           name="no_kk_sebelumnya"
                                           value="<?php echo e(old('no_kk_sebelumnya', $penduduk->no_kk_sebelumnya)); ?>"
                                           placeholder="Masukkan nomor KK sebelumnya (jika ada)"
                                           maxlength="30">
                                    <?php $__errorArgs = ['no_kk_sebelumnya'];
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
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="golongan_darah" class="form-label fw-bold text-primary">
                                        <i class="bx bx-donate-blood me-1"></i>Golongan Darah <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select <?php $__errorArgs = ['golongan_darah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="golongan_darah"
                                            name="golongan_darah"
                                            required>
                                        <option value="" selected disabled>Pilih Golongan Darah</option>
                                        <?php $__currentLoopData = \App\Enums\GolonganDarah::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $golonganDarah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($golonganDarah->value); ?>"
                                                    <?php echo e(old('golongan_darah', $penduduk->golongan_darah) == $golonganDarah->value ? 'selected' : ''); ?>>
                                                <?php echo e($golonganDarah->value); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['golongan_darah'];
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

                            <div class="col-md-8 mb-3">
                                <div class="form-group">
                                    <label for="suku" class="form-label fw-bold text-primary">
                                        <i class="bx bx-user-voice me-1"></i>Suku <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select <?php $__errorArgs = ['suku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="suku"
                                            name="suku"
                                            required>
                                        <option value="" selected disabled>Pilih Suku</option>
                                        <?php $__currentLoopData = \App\Enums\Suku::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($suku->value); ?>"
                                                    <?php echo e(old('suku', $penduduk->suku) == $suku->value ? 'selected' : ''); ?>>
                                                <?php echo e($suku->value); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['suku'];
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

                        <div class="row mb-4 mt-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2"><i class="bx bx-id-card me-1"></i>Informasi KTP</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label fw-bold text-primary">
                                        <i class="bx bx-check-square me-1"></i>KTP Elektronik <span class="text-danger">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" 
                                                   type="radio" 
                                                   name="ktp_el" 
                                                   id="ktp_el_1" 
                                                   value="1" 
                                                   <?php echo e(old('ktp_el', $penduduk->ktp_el) == '1' ? 'checked' : ''); ?> 
                                                   required>
                                            <label class="form-check-label" for="ktp_el_1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" 
                                                   type="radio" 
                                                   name="ktp_el" 
                                                   id="ktp_el_0" 
                                                   value="0" 
                                                   <?php echo e(old('ktp_el', $penduduk->ktp_el) == '0' ? 'checked' : ''); ?> 
                                                   required>
                                            <label class="form-check-label" for="ktp_el_0">Tidak</label>
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['ktp_el'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-8 mb-3">
                                <div class="form-group">
                                    <label for="status_rekam" class="form-label fw-bold text-primary">
                                        <i class="bx bx-fingerprint me-1"></i>Status Rekam <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select <?php $__errorArgs = ['status_rekam'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="status_rekam"
                                            name="status_rekam"
                                            required>
                                        <option value="" selected disabled>Pilih Status Rekam</option>
                                        <?php $__currentLoopData = \App\Enums\StatusRekam::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusRekam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($statusRekam->value); ?>"
                                                    <?php echo e(old('status_rekam', $penduduk->status_rekam) == $statusRekam->value ? 'selected' : ''); ?>>
                                                <?php echo e($statusRekam->value); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['status_rekam'];
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
                                    <label for="tempat_cetak_ktp" class="form-label fw-bold text-primary">
                                        <i class="bx bx-printer me-1"></i>Tempat Cetak KTP
                                    </label>
                                    <input type="text"
                                           class="form-control <?php $__errorArgs = ['tempat_cetak_ktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="tempat_cetak_ktp"
                                           name="tempat_cetak_ktp"
                                           value="<?php echo e(old('tempat_cetak_ktp', $penduduk->tempat_cetak_ktp)); ?>"
                                           placeholder="Masukkan tempat cetak KTP (jika ada)"
                                           maxlength="100">
                                    <?php $__errorArgs = ['tempat_cetak_ktp'];
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
                                    <label for="tanggal_cetak_ktp" class="form-label fw-bold text-primary">
                                        <i class="bx bx-calendar-event me-1"></i>Tanggal Cetak KTP
                                    </label>
                                    <input type="date"
                                           class="form-control <?php $__errorArgs = ['tanggal_cetak_ktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="tanggal_cetak_ktp"
                                           name="tanggal_cetak_ktp"
                                           value="<?php echo e(old('tanggal_cetak_ktp', $penduduk->tanggal_cetak_ktp)); ?>">
                                    <?php $__errorArgs = ['tanggal_cetak_ktp'];
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
                                        <label for="status_keadaan" class="form-label fw-bold text-primary">
                                            <i class="bx bx-health me-1"></i>Status Keadaan <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select <?php $__errorArgs = ['status_keadaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="status_keadaan"
                                                name="status_keadaan"
                                                required>
                                            <option value="" selected disabled>Pilih Status Keadaan</option>
                                            <?php $__currentLoopData = \App\Enums\StatusKeadaan::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusKeadaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($statusKeadaan->value); ?>"
                                                        <?php echo e(old('status_keadaan', $penduduk->status_keadaan) == $statusKeadaan->value ? 'selected' : ''); ?>>
                                                    <?php echo e($statusKeadaan->value); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['status_keadaan'];
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
                                        <label for="note" class="form-label fw-bold text-primary">
                                            <i class="bx bx-note me-1"></i>Catatan
                                        </label>
                                        <textarea class="form-control <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                  id="note"
                                                  name="note"
                                                  rows="3"
                                                  placeholder="Masukkan catatan (jika ada)"><?php echo e(old('note', $penduduk->note)); ?></textarea>
                                        <?php $__errorArgs = ['note'];
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
                            
                            <div class="d-flex justify-content-between mt-4">
                                <a href="<?php echo e(route('penduduk.index')); ?>" class="btn btn-secondary">
                                    <i class="bx bx-arrow-back me-1"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-save me-1"></i> Simpan Perubahan
                                </button>
                            </div>
                            </form>
                            </div>
                            </div>
                            </div>
                            <?php $__env->stopSection(); ?>
                            
                            <?php $__env->startSection('script'); ?>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                            <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
                            
                            <script>
                            $(document).ready(function() {
                                // Default tanggal hari ini untuk tanggal lahir
                                var today = new Date().toISOString().split('T')[0];
                                // Jika tanggal lahir belum diisi, default ke 18 tahun yang lalu
                                if (!$('#tanggal_lahir').val()) {
                                    var defaultDate = new Date();
                                    defaultDate.setFullYear(defaultDate.getFullYear() - 18);
                                    $('#tanggal_lahir').val(defaultDate.toISOString().split('T')[0]);
                                }
                            });
                            </script>
                            <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/penduduk/edit.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
    Profile Pengguna
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <!-- Include Box Icons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- Profile Header -->
        <div class="profile-header mb-4">
            <img src="<?php echo e(URL::asset('build/images/profile-bg.jpg')); ?>" class="img-fluid w-100 h-100 object-fit-cover" alt="Profile Background" style="object-position: center;">
            <div class="profile-header-overlay">
                <div class="upload-trigger">
                    <input id="profile-foreground-img-file-input" type="files" class="d-none">
                    <label for="profile-foreground-img-file-input" class="mb-0">
                        <i class='bx bx-image-add me-1'></i> Change Cover Photo
                    </label>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left Column - User Profile -->
            <div class="col-lg-4 mb-4">
                <!-- Profile Card -->
                <div class="profile-info-card card mb-4">
                    <div class="card-body text-center pt-4">
                        <div class="d-flex flex-column align-items-center">
                            <div class="position-relative mb-3">
                                <div class="profile-avatar mx-auto">
                                    <img src="<?php if(Auth::user()->avatar): ?> <?php echo e(asset('storage/' . Auth::user()->avatar)); ?><?php else: ?><?php echo e(asset('build/images/users/avatar-1.jpg')); ?> <?php endif; ?>"
                                        class="img-fluid rounded-circle w-100 h-100 object-fit-cover" alt="Profile Image">
                                    <div class="profile-avatar-badge">
                                        <i class='bx bxs-check-circle'></i>
                                    </div>
                                </div>
                            </div>
                            <h4 class="fw-bold mb-1"><?php echo e(Auth::user()->name); ?></h4>
                            <p class="text-muted mb-2"><?php echo e(Auth::user()->jabatan); ?></p>
                            <span class="user-badge bg-primary bg-opacity-10 text-primary mb-3"><?php echo e(Auth::user()->role); ?></span>
                            
                        </div>
                    </div>
                </div>

                <!-- Contact Information Card -->
                <div class="profile-info-card card">
                    <div class="card-body">
                        
                        <div class="contact-info-item">
                            <div class="contact-info-icon bg-primary bg-opacity-10 text-primary">
                                <i class='bx bx-envelope fs-4'></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1 small">Email Address</p>
                                <h6 class="mb-0"><?php echo e(Auth::user()->email); ?></h6>
                            </div>
                        </div>
                        
                        
                        
                        <div class="contact-info-item mb-0">
                            <div class="contact-info-icon bg-info bg-opacity-10 text-info">
                                <i class='bx bx-map-pin fs-4'></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1 small">Office Address</p>
                                <h6 class="mb-0">Kantor Desa, Kec. <?php echo e($config->nama_kecamatan ?? '-'); ?>, <?php echo e($config->nama_kabupaten ?? '-'); ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Profile Details -->
            <div class="col-lg-8">
                <div class="profile-info-card card">
                    <div class="card-header bg-transparent border-bottom-0 pb-0">
                        <ul class="nav nav-tabs-custom nav-tabs gap-3 border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#commonDetails" role="tab">
                                    <i class='bx bx-info-circle me-1 align-middle'></i>General Info
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#pengunaUser" role="tab">
                                    <i class='bx bx-user me-1 align-middle'></i>User Details
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <!-- General Information Tab -->
                            <div class="tab-pane fade" id="commonDetails" role="tabpanel">
                                <form action="<?php echo e(route('config.update')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="nama_desa" class="form-control <?php $__errorArgs = ['nama_desa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="namaDesaInput" placeholder="Nama Desa"
                                                    value="<?php echo e(old('nama_desa', $config->nama_desa ?? '')); ?>"
                                                    <?php if(Auth::user()->role != 'admin'): ?> readonly <?php endif; ?>>
                                                <label for="namaDesaInput">Nama Desa</label>
                                                <?php $__errorArgs = ['nama_desa'];
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
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="kode_desa" class="form-control <?php $__errorArgs = ['kode_desa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="kodeDesaInput" placeholder="Kode Desa"
                                                    value="<?php echo e(old('kode_desa', $config->kode_desa ?? '')); ?>"
                                                    <?php if(Auth::user()->role != 'admin'): ?> readonly <?php endif; ?>>
                                                <label for="kodeDesaInput">Kode Desa</label>
                                                <?php $__errorArgs = ['kode_desa'];
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
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="nama_kecamatan" class="form-control <?php $__errorArgs = ['nama_kecamatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="namaKecamatanInput" placeholder="Nama Kecamatan"
                                                    value="<?php echo e(old('nama_kecamatan', $config->nama_kecamatan ?? '')); ?>"
                                                    <?php if(Auth::user()->role != 'admin'): ?> readonly <?php endif; ?>>
                                                <label for="namaKecamatanInput">Nama Kecamatan</label>
                                                <?php $__errorArgs = ['nama_kecamatan'];
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
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="kode_kecamatan" class="form-control <?php $__errorArgs = ['kode_kecamatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="kodeKecamatanInput" placeholder="Kode Kecamatan"
                                                    value="<?php echo e(old('kode_kecamatan', $config->kode_kecamatan ?? '')); ?>"
                                                    <?php if(Auth::user()->role != 'admin'): ?> readonly <?php endif; ?>>
                                                <label for="kodeKecamatanInput">Kode Kecamatan</label>
                                                <?php $__errorArgs = ['kode_kecamatan'];
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
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="nama_kepala_camat" class="form-control <?php $__errorArgs = ['nama_kepala_camat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="namaCamatInput" placeholder="Nama Camat"
                                                    value="<?php echo e(old('nama_kepala_camat', $config->nama_kepala_camat ?? '')); ?>"
                                                    <?php if(Auth::user()->role != 'admin'): ?> readonly <?php endif; ?>>
                                                <label for="namaCamatInput">Nama Camat</label>
                                                <?php $__errorArgs = ['nama_kepala_camat'];
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
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="nip_kepala_camat" class="form-control <?php $__errorArgs = ['nip_kepala_camat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="nipCamatInput" placeholder="NIP Camat"
                                                    value="<?php echo e(old('nip_kepala_camat', $config->nip_kepala_camat ?? '')); ?>"
                                                    <?php if(Auth::user()->role != 'admin'): ?> readonly <?php endif; ?>>
                                                <label for="nipCamatInput">NIP Camat</label>
                                                <?php $__errorArgs = ['nip_kepala_camat'];
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
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="nama_kabupaten" class="form-control <?php $__errorArgs = ['nama_kabupaten'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="namaKabupatenInput" placeholder="Nama Kabupaten"
                                                    value="<?php echo e(old('nama_kabupaten', $config->nama_kabupaten ?? '')); ?>"
                                                    <?php if(Auth::user()->role != 'admin'): ?> readonly <?php endif; ?>>
                                                <label for="namaKabupatenInput">Nama Kabupaten</label>
                                                <?php $__errorArgs = ['nama_kabupaten'];
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
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="kode_kabupaten" class="form-control <?php $__errorArgs = ['kode_kabupaten'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="kodeKabupatenInput" placeholder="Kode Kabupaten"
                                                    value="<?php echo e(old('kode_kabupaten', $config->kode_kabupaten ?? '')); ?>"
                                                    <?php if(Auth::user()->role != 'admin'): ?> readonly <?php endif; ?>>
                                                <label for="kodeKabupatenInput">Kode Kabupaten</label>
                                                <?php $__errorArgs = ['kode_kabupaten'];
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
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="nama_propinsi" class="form-control <?php $__errorArgs = ['nama_propinsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="namaProvinsiInput" placeholder="Nama Provinsi"
                                                    value="<?php echo e(old('nama_propinsi', $config->nama_propinsi ?? '')); ?>"
                                                    <?php if(Auth::user()->role != 'admin'): ?> readonly <?php endif; ?>>
                                                <label for="namaProvinsiInput">Nama Provinsi</label>
                                                <?php $__errorArgs = ['nama_propinsi'];
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
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="kode_propinsi" class="form-control <?php $__errorArgs = ['kode_propinsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="kodeProvinsiInput" placeholder="Kode Provinsi"
                                                    value="<?php echo e(old('kode_propinsi', $config->kode_propinsi ?? '')); ?>"
                                                    <?php if(Auth::user()->role != 'admin'): ?> readonly <?php endif; ?>>
                                                <label for="kodeProvinsiInput">Kode Provinsi</label>
                                                <?php $__errorArgs = ['kode_propinsi'];
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
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="email" name="email_desa" class="form-control <?php $__errorArgs = ['email_desa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="emailDesaInput" placeholder="Email Desa"
                                                    value="<?php echo e(old('email_desa', $config->email_desa ?? '')); ?>"
                                                    <?php if(Auth::user()->role != 'admin'): ?> readonly <?php endif; ?>>
                                                <label for="emailDesaInput">Email Desa</label>
                                                <?php $__errorArgs = ['email_desa'];
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
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="nomor_operator" class="form-control <?php $__errorArgs = ['nomor_operator'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="nomorOperatorInput" placeholder="Nomor Operator"
                                                    value="<?php echo e(old('nomor_operator', $config->nomor_operator ?? '')); ?>"
                                                    <?php if(Auth::user()->role != 'admin'): ?> readonly <?php endif; ?>>
                                                <label for="nomorOperatorInput">Nomor Operator</label>
                                                <?php $__errorArgs = ['nomor_operator'];
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
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="telepon" class="form-control <?php $__errorArgs = ['telepon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="teleponInput" placeholder="Telepon"
                                                    value="<?php echo e(old('telepon', $config->telepon ?? '')); ?>"
                                                    <?php if(Auth::user()->role != 'admin'): ?> readonly <?php endif; ?>>
                                                <label for="teleponInput">Telepon</label>
                                                <?php $__errorArgs = ['telepon'];
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
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Logo</label>
                                            <?php if(Auth::user()->role == 'admin'): ?>
                                                <div class="input-group">
                                                    <input type="file" name="logo" class="form-control <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                    <span class="input-group-text"><i class='bx bx-upload'></i></span>
                                                </div>
                                                <?php if($config->logo): ?>
                                                    <div class="mt-2">
                                                        <img src="<?php echo e(asset('storage/' . $config->logo)); ?>" alt="Logo Saat Ini" 
                                                            class="img-thumbnail" style="max-height: 80px;">
                                                        <small class="d-block text-muted mt-1">Logo Saat Ini</small>
                                                    </div>
                                                <?php endif; ?>
                                                <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <?php else: ?>
                                                <input type="text" class="form-control" value="<?php echo e($config->logo); ?>" readonly>
                                                <small class="text-muted">Hanya admin yang dapat mengubah logo.</small>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <textarea name="alamat_kantor" class="form-control <?php $__errorArgs = ['alamat_kantor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                    id="alamatKantorInput" placeholder="Alamat Kantor" style="height: 100px;"
                                                    <?php if(Auth::user()->role != 'admin'): ?> readonly <?php endif; ?>><?php echo e(old('alamat_kantor', $config->alamat_kantor ?? '')); ?></textarea>
                                                <label for="alamatKantorInput">Alamat Kantor</label>
                                                <?php $__errorArgs = ['alamat_kantor'];
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
                                        
                                        <div class="col-12 text-end">
                                            <hr>
                                            <?php if(Auth::user()->role == 'admin'): ?>
                                                <button type="submit" class="btn btn-primary px-4">
                                                    <i class='bx bx-save me-1'></i> Save Changes
                                                </button>
                                            <?php endif; ?>
                                            <a href="<?php echo e(route('config.index')); ?>" class="btn btn-light ms-2">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- User Details Tab -->
                            <div class="tab-pane fade show active" id="pengunaUser" role="tabpanel">
                                <div class="user-info-box mb-4">
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="user-info-item">
                                                <div class="user-info-label">Full Name</div>
                                                <div class="user-info-value"><?php echo e(Auth::user()->name); ?></div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="user-info-item">
                                                <div class="user-info-label">Email Address</div>
                                                <div class="user-info-value"><?php echo e(Auth::user()->email); ?></div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="user-info-item">
                                                <div class="user-info-label">Position</div>
                                                <div class="user-info-value"><?php echo e(Auth::user()->jabatan); ?></div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="user-info-item">
                                                <div class="user-info-label">Role</div>
                                                <div class="user-info-value">
                                                    <span class="badge bg-primary-subtle text-primary"><?php echo e(Auth::user()->role); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="user-info-item">
                                                <div class="user-info-label">NIP</div>
                                                <div class="user-info-value"><?php echo e(Auth::user()->nip); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-transparent">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xs">
                                                    <div class="avatar-title bg-primary-subtle text-primary rounded-circle">
                                                        <i class='bx bx-shield-quarter'></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="card-title mb-0">Account Information</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <div class="border rounded p-3 text-center">
                                                    <div class="avatar-sm bg-success-subtle text-success rounded-circle mx-auto mb-2">
                                                        <i class='bx bx-check fs-4'></i>
                                                    </div>
                                                    <h6 class="mb-1">Account Status</h6>
                                                    <span class="badge bg-success-subtle text-success">Active</span>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="border rounded p-3 text-center">
                                                    <div class="avatar-sm bg-primary-subtle text-primary rounded-circle mx-auto mb-2">
                                                        <i class='bx bx-time fs-4'></i>
                                                    </div>
                                                    <h6 class="mb-1">Last Login</h6>
                                                    <p class="text-muted small mb-0"><?php echo e(date('d F Y, H:i')); ?> WIB</p>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="border rounded p-3 text-center">
                                                    <div class="avatar-sm bg-info-subtle text-info rounded-circle mx-auto mb-2">
                                                        <i class='bx bx-calendar-check fs-4'></i>
                                                    </div>
                                                    <h6 class="mb-1">Account Created</h6>
                                                    <p class="text-muted small mb-0"><?php echo e(Auth::user()->created_at ? Auth::user()->created_at->format('d F Y') : '-'); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="card border-0 shadow-sm mt-4">
                                    <div class="card-header bg-transparent">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xs">
                                                    <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                        <i class='bx bx-history'></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="card-title mb-0">Recent Activities</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <a href="#" class="btn btn-sm btn-link text-muted">View All</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card-body p-0">
                                        <div class="p-3 border-bottom">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-light text-primary rounded-circle">
                                                            <i class='bx bx-log-in-circle'></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Login from new device</h6>
                                                    <p class="text-muted mb-0 small">Today, 10:30 AM</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="p-3 border-bottom">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-light text-warning rounded-circle">
                                                            <i class='bx bx-edit'></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Profile information updated</h6>
                                                    <p class="text-muted mb-0 small">Yesterday, 4:15 PM</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="p-3">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-light text-success rounded-circle">
                                                            <i class='bx bx-shield-alt-2'></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Security scan completed</h6>
                                                    <p class="text-muted mb-0 small">3 days ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end tab-pane-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Profile cover image change
        const profileCoverInput = document.getElementById('profile-foreground-img-file-input');
        if (profileCoverInput) {
            profileCoverInput.addEventListener('change', function(e) {
                if (e.target.files.length > 0) {
                    const file = e.target.files[0];
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.querySelector('.profile-header img').src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
        
        // Floating labels animation
        const floatingInputs = document.querySelectorAll('.form-floating input, .form-floating textarea');
        floatingInputs.forEach(input => {
            if (input.value.trim() !== '') {
                input.classList.add('filled');
            }
            
            input.addEventListener('focus', () => {
                input.classList.add('filled');
            });
            
            input.addEventListener('blur', () => {
                if (input.value.trim() === '') {
                    input.classList.remove('filled');
                }
            });
        });
        
        // Tab switching animation
        const tabLinks = document.querySelectorAll('.nav-tabs-custom .nav-link');
        tabLinks.forEach(link => {
            link.addEventListener('click', function() {
                tabLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
    </script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/pages-profile-settings.blade.php ENDPATH**/ ?>
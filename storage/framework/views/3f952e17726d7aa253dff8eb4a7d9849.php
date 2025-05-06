<?php $__env->startSection('title'); ?> Profil Saya <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/css/sub.menu.pengajuan.surat.min.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-header animate-fadeIn">
        <a href="<?php echo e(route('warga.menu')); ?>" class="back-button">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h1>
            <a href="<?php echo e(route('warga.menu')); ?>">Profile Saya</a>
        </h1>
        <p class="text-black">Kelola data pribadi Anda</p>
    </div>

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <!-- Kartu Profil Ringkas -->
                <div class="content-card text-center animate-fadeIn">
                    <div class="profile-avatar">
                        <img src="<?php echo e(URL::asset('build/images/job-profile2.png')); ?>" alt="Avatar" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                    </div>
                    <h5 class="mb-1"><?php echo e(auth()->user()->nama ?? 'Nama Pengguna'); ?></h5>
                    <p class="text-muted">NIK: <?php echo e(auth()->user()->nik ?? '123456789'); ?></p>
                    
                    
                    
                    <hr class="my-4">
                    
                    <div class="text-start">
                        <div class="d-flex align-items-center mb-3">
                            <div class="d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background-color: rgba(78, 115, 223, 0.1); border-radius: 10px;">
                                <i class="bi bi-envelope text-primary"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Email</small>
                                <span><?php echo e(auth()->user()->email ?? 'email@example.com'); ?></span>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background-color: rgba(78, 115, 223, 0.1); border-radius: 10px;">
                                <i class="bi bi-check-circle text-primary"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Status Verifikasi</small>
                                <span class="text-success">
                                    <i class="bi bi-patch-check-fill me-1"></i> Terverifikasi
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-8">
                <!-- Informasi Detail Profil -->
                <div class="content-card animate-fadeIn">
                    <div class="card-title">
                        <i class="bi bi-person-circle"></i> Informasi Pribadi
                    </div>
                    
                    <div class="profile-info">
                        <div class="profile-field">
                            <label>Nama Lengkap</label>
                            <p><?php echo e(auth()->user()->nama ?? 'Nama Lengkap Pengguna'); ?></p>
                        </div>
                        
                        <div class="profile-field">
                            <label>NIK</label>
                            <p><?php echo e(auth()->user()->nik ?? '123456789012345'); ?></p>
                        </div>
                        
                        <div class="profile-field">
                            <label>Alamat</label>
                            <p><?php echo e(auth()->user()->alamat ?? 'Jl. Contoh No. 123, RT 001/RW 002, Kelurahan Contoh, Kecamatan Contoh, Kota Contoh, Provinsi Contoh'); ?></p>
                        </div>
                        
                        <div class="profile-field">
                            <label>Email</label>
                            <p><?php echo e(auth()->user()->email ?? 'email@example.com'); ?></p>
                        </div>
                    </div>
                </div>
                
                <!-- Form Edit Profil (Default hidden) -->
                <div class="content-card mt-4 animate-fadeIn" id="editProfileForm" style="display: none;">
                    <div class="card-title">
                        <i class="bi bi-pencil-square"></i> Edit Informasi Pribadi
                    </div>
                    
                    
                        
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo e(auth()->user()->nama ?? ''); ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo e(auth()->user()->alamat ?? ''); ?></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo e(auth()->user()->email ?? ''); ?>">
                        </div>
                        
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-secondary" id="cancelEdit">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    
                </div>

                <!-- Riwayat Aktivitas -->
                <div class="content-card mt-4 animate-fadeIn">
                    <div class="card-title">
                        <i class="bi bi-activity"></i> Aktivitas Terbaru
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Jenis Surat</th>
                                    <th>Keperluan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $latestActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($activity->tanggal_pengajuan->format('d M Y')); ?></td>
                                        <td><?php echo e($activity->jenisSurat->nama ?? '-'); ?></td>
                                        <td><?php echo e($activity->keperluan); ?></td>
                                        <td>
                                            <?php if($activity->status == \App\Enums\Status::DIPROSES): ?>
                                                <span class="badge bg-primary">Diproses</span>
                                            <?php elseif($activity->status == \App\Enums\Status::SELESAI): ?>
                                                <span class="badge bg-success">Selesai</span>
                                            <?php elseif($activity->status == \App\Enums\Status::DITOLAK): ?>
                                                <span class="badge bg-danger">Ditolak</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary"><?php echo e($activity->status->value); ?></span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr><td colspan="4" class="text-center">Tidak ada aktivitas terbaru.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        // Script untuk menangani tampilan edit profil
        document.addEventListener('DOMContentLoaded', function() {
            const editButton = document.querySelector('.edit-button');
            const editForm = document.getElementById('editProfileForm');
            const cancelButton = document.getElementById('cancelEdit');
            
            if (editButton && editForm && cancelButton) {
                editButton.addEventListener('click', function() {
                    editForm.style.display = 'block';
                    editButton.parentElement.scrollIntoView({ behavior: 'smooth' });
                });
                
                cancelButton.addEventListener('click', function() {
                    editForm.style.display = 'none';
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-without-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/dashboardwarga/profile.blade.php ENDPATH**/ ?>
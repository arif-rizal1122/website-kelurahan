<?php $__env->startSection('title'); ?>
    Pengajuan Surat Selesai
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('build/css/email.pages.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <div class="status-icon success">
                                    <i class="bx bx-check-circle"></i>
                                </div>
                                <h4 class="page-title text-success">Pengajuan Surat Selesai</h4>
                                <p class="page-subtitle">Informasi status pengajuan surat Anda.</p>
                            </div>
                            
                            <div class="alert alert-success" role="alert">
                                <i class="bx bx-check-circle"></i>
                                <span>Pengajuan surat Anda telah selesai diproses.</span>
                            </div>
                            
                            <div class="mt-3">
                                <p class="mb-3"><span class="fw-bold">Yth. Bapak/Ibu</span> <?php echo e($nama_warga); ?>,</p>
                                <p class="mb-3">
                                    Kami informasikan dengan hormat bahwa pengajuan surat Anda dengan detail sebagai berikut telah selesai diproses:
                                </p>
                                
                                <div class="detail-list mb-4">
                                    <div class="detail-item">
                                        <span class="detail-label">Jenis Surat:</span>
                                        <span class="detail-value"><?php echo e($jenis_surat); ?></span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">Nomor Pengajuan:</span>
                                        <span class="detail-value"><?php echo e($nomor_pengajuan); ?></span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">Tanggal Pengajuan:</span>
                                        <span class="detail-value"><?php echo e($tanggal_pengajuan); ?></span>
                                    </div>
                                </div>
                                
                                <p class="mb-3">
                                    Anda dapat mengambil surat yang telah selesai di kantor kami pada jam kerja. Mohon membawa bukti pengajuan atau identitas diri.
                                </p>
                            </div>
                            
                            <div class="signature-box">
                                <p>Hormat kami,<br>Tim Administrasi Kelurahan/Desa</p>
                            </div>
                            
                            <div class="disclaimer-box">
                                <p class="mb-0">
                                    Ini adalah email pemberitahuan otomatis. Mohon tidak membalas email ini. Jika Anda memiliki pertanyaan, silakan hubungi kantor kami langsung.
                                </p>
                            </div>
                            
                            <div class="mt-4 text-center">
                                <a href="<?php echo e(route('warga.login.form')); ?>" class="btn btn-primary w-100">
                                    <i class="bx bx-menu me-2"></i>Kembali ke Menu Utama
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-without-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/emails/pengajuan_selesai.blade.php ENDPATH**/ ?>
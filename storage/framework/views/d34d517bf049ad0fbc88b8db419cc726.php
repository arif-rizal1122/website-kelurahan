<?php $__env->startSection('title'); ?>
    Pengajuan Surat Diproses
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
                                <div class="status-icon info">
                                    <i class="bx bx-info-circle"></i>
                                </div>
                                <h4 class="page-title">Pengajuan Surat Diproses</h4>
                                <p class="page-subtitle">Informasi status pengajuan surat Anda.</p>
                            </div>
                            
                            <div class="alert alert-info" role="alert">
                                <i class="bx bx-info-circle"></i>
                                <span>Pengajuan surat Anda sedang dalam proses.</span>
                            </div>
                            
                            <div class="mt-3">
                                <p class="mb-3"><span class="fw-bold">Yth. Bapak/Ibu</span> <?php echo e($nama_warga); ?>,</p>
                                <p class="mb-3">
                                    Kami informasikan bahwa pengajuan surat Anda dengan detail sebagai berikut sedang dalam proses:
                                </p>
                                
                                <div class="detail-list mb-4">
                                    <div class="detail-item">
                                        <span class="detail-label">Jenis Surat:</span>
                                        <span class="detail-value"><?php echo e($jenis_surat); ?></span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">Tanggal Pengajuan:</span>
                                        <span class="detail-value"><?php echo e($tanggal_pengajuan); ?></span>
                                    </div>
                                </div>
                                
                                <p class="mb-2">
                                    Kami akan memberitahu Anda kembali setelah proses selesai. Mohon untuk menunggu pemberitahuan selanjutnya.
                                </p>
                            </div>
                            
                            <div class="signature-box">
                                <p>Terima kasih atas kesabaran Anda,<br>Tim Administrasi</p>
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
<?php echo $__env->make('layouts.master-without-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/emails/pengajuan_diproses.blade.php ENDPATH**/ ?>
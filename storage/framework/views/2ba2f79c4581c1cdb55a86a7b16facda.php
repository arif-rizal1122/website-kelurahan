<?php $__env->startSection('title'); ?> SMART LURAH <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
<style>
    /* Gaya dasar email */
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        color: #333;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .header {
        background-color: #f8f8f8;
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }
    .content {
        padding: 20px 0;
    }
    .greeting {
        margin-bottom: 15px;
    }
    .info {
        margin-bottom: 10px;
    }
    .regards {
        margin-top: 20px;
        text-align: right;
    }
    .important {
        font-weight: bold;
        color: #2c3e50;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 

    <div class="container">
        <div class="header">
            <h2 class="important">Pemberitahuan Pengajuan Surat Diproses</h2>
        </div>
        <div class="content">
            <p class="greeting">Yth. Bapak/Ibu <?php echo e($nama_warga); ?>,</p>
            <p>
                Kami informasikan bahwa pengajuan surat Anda dengan detail sebagai berikut sedang dalam proses:
            </p>
            <ul style="list-style: none; padding-left: 0;">
                <li class="info"><span class="important">Jenis Surat:</span> <?php echo e($jenis_surat); ?></li>
                <li class="info"><span class="important">Nomor Pengajuan:</span> <?php echo e($nomor_pengajuan); ?></li>
                <li class="info"><span class="important">Tanggal Pengajuan:</span> <?php echo e($tanggal_pengajuan); ?></li> </ul>
            <p>
                Kami akan memberitahu Anda kembali setelah proses selesai.  Mohon untuk menunggu pemberitahuan selanjutnya.
            </p>
            <p>
                Terima kasih atas kesabaran Anda.
            </p>
            <div class="regards">
                Hormat kami,<br>
                Tim Administrasi
            </div>
        </div>
    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/emails/pengajuan_diproses.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?> Cetak Pengajuan #<?php echo e($pengajuan->id); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 12pt;
            line-height: 1.5;
            margin: 1in;
        }
        h2 {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            margin-bottom: 0.2in;
        }
        h3 {
            text-align: center;
            font-size: 12pt;
            font-style: italic;
            margin-bottom: 0.3in;
        }
        .section {
            margin-bottom: 0.3in;
        }
        .label-word {
            font-weight: bold;
            width: 150px;
            vertical-align: top;
            display: inline-block;
        }
        .colon {
            width: 20px;
            text-align: center;
            vertical-align: top;
            display: inline-block;
        }
        .value {
            display: inline-block;
            vertical-align: top;
        }
        .indented {
            margin-left: 0.5in;
        }
        .signature {
            text-align: right;
            margin-top: 0.5in;
        }
        .underline {
            text-decoration: underline;
        }
        .header-container {
            text-align: center;
            margin-bottom: 15px;
        }
        .header-line {
            border-top: 1px solid black;
            margin-top: 2px;
            margin-bottom: 2px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="header-container">
            <?php if(file_exists(public_path('images/logo.png'))): ?>
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" style="width: 80px; height: 80px; margin-bottom: 10px;">
            <?php endif; ?>
            <p style="font-weight: bold; font-size: 14pt; text-transform: uppercase; margin-bottom: 5px;">PEMERINTAH <?php echo e(strtoupper($config->nama_kabupaten ?? 'KABUPATEN')); ?></p>
            <p style="font-weight: bold; font-size: 14pt; text-transform: uppercase; margin-bottom: 5px;">KECAMATAN <?php echo e(strtoupper($config->nama_kecamatan ?? 'KECAMATAN')); ?></p>
            <p style="font-weight: bold; font-size: 16pt; text-transform: uppercase; margin-bottom: 5px;">DESA <?php echo e(strtoupper($config->nama_kelurahan ?? 'DESA')); ?></p>
            <p style="font-size: 11pt; margin-bottom: 10px;">Jl. Raya <?php echo e($config->nama_kelurahan ?? 'Desa'); ?> Km <?php echo e($config->km_jalan ?? '10'); ?> <?php echo e($config->nama_dusun ?? 'Kerandangan'); ?> Kode Pos : <?php echo e($config->kode_pos ?? '83355'); ?></p>
            <div class="header-line" style="border-top-width: 3px;"></div>
            <div class="header-line"></div>
        </div>

        <div style="text-align: center; margin-bottom: 20px;">
            <h2><u><?php echo e(strtoupper($pengajuan->jenisSurat->nama ?? 'SURAT KETERANGAN')); ?></u></h2>
            <?php if($pengajuan->id): ?>
                <h3>Nomor: <?php echo e($pengajuan->id); ?>/<?php echo e(now()->format('Y')); ?>/<?php echo e($pengajuan->jenisSurat->code ?? '...'); ?></h3>
            <?php endif; ?>
        </div>

        <div class="section">
            <p>Yang bertanda tangan di bawah ini:</p>
            <p><span class="label-word">Nama</span><span class="colon">:</span><span class="value"><?php echo e(Auth::user()->name ?? '-'); ?></span></p>
            <p><span class="label-word">Jabatan</span><span class="colon">:</span><span class="value"><?php echo e(Auth::user()->jabatan ?? 'Petugas Kelurahan'); ?></span></p>
            <p><span class="label-word">Alamat</span><span class="colon">:</span><span class="value"><?php echo e($config->alamat_kantor ?? '-'); ?></span></p>
        </div>

        <div class="section">
            <p>Menerangkan dengan sesungguhnya bahwa:</p>
            <p><span class="label-word">Nama</span><span class="colon">:</span><span class="value"><?php echo e($pengajuan->warga->nama ?? '-'); ?></span></p>
            <p><span class="label-word">NIK</span><span class="colon">:</span><span class="value"><?php echo e($pengajuan->warga->nik ?? '-'); ?></span></p>
            <?php if($pengajuan->warga->tempat_lahir || $pengajuan->warga->tanggal_lahir): ?>
                <p><span class="label-word">Tempat/Tgl. Lahir</span><span class="colon">:</span><span class="value"><?php echo e($pengajuan->warga->tempat_lahir ?? '-'); ?>, <?php echo e($pengajuan->warga->tanggal_lahir ? \Carbon\Carbon::parse($pengajuan->warga->tanggal_lahir)->format('d F Y') : '-'); ?></span></p>
            <?php endif; ?>
            <p><span class="label-word">Jenis Kelamin</span><span class="colon">:</span><span class="value"><?php echo e($pengajuan->warga->jenis_kelamin ?? '-'); ?></span></p>
            <p><span class="label-word">Agama</span><span class="colon">:</span><span class="value"><?php echo e($pengajuan->warga->agama ?? '-'); ?></span></p>
            <p><span class="label-word">Alamat</span><span class="colon">:</span><span class="value"><?php echo e($pengajuan->warga->alamat ?? '-'); ?></span></p>
            <?php if($pengajuan->jenisSurat->has_template && $pengajuan->jenisSurat->template_fields): ?>
                <?php
                    $templateFields = json_decode($pengajuan->jenisSurat->template_fields, true);
                ?>
                <?php if(is_array($templateFields)): ?>
                    <?php $__currentLoopData = $templateFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($pengajuan->data[$field])): ?>
                            <p><span class="label-word"><?php echo e($label); ?></span><span class="colon">:</span><span class="value"><?php echo e($pengajuan->data[$field] ?? '-'); ?></span></p>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>


        <div class="section">
            <?php if(!empty($pengajuan->jenisSurat->template_surat)): ?>
                <?php
                    $templateText = nl2br(e($pengajuan->jenisSurat->template_surat));
                    $templateText = str_replace("\n", "</p><p>", $templateText);
                ?>
                <p><?php echo e($templateText); ?></p>
            <?php else: ?>
                <p>Demikian surat keterangan ini dibuat dengan sebenarnya dan untuk dapat dipergunakan sebagaimana mestinya.</p>
            <?php endif; ?>
        </div>

        <div class="signature">
            <p><?php echo e($config->nama_kelurahan ?? 'Kelurahan'); ?>, <?php echo e(now()->format('d F Y')); ?></p>
            <p><?php echo e($config->jabatan_penandatangan ?? 'Petugas yang Berwenang'); ?>,</p>
            <br><br><br>
            <p class="underline"><?php echo e($pengajuan->user->name ?? '-'); ?></p>
            <?php if($pengajuan->user->nip): ?>
                <p>NIP. <?php echo e($pengajuan->user->nip); ?></p>
            <?php endif; ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-without-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/dashboardwarga/pdf.blade.php ENDPATH**/ ?>
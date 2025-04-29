<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pengajuan Surat</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-hover: #3a56d4;
            --light-bg: #f8f9fa;
            --border-radius: 10px;
            --shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        body {
            background-color: #f0f3f9;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        .page-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
        }

        .form-header {
            background: linear-gradient(45deg, var(--primary-color), #5e7ce2);
            color: white;
            border-bottom: none;
        }

        .card-body {
            padding: 2rem;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #444;
        }

        .form-control, .form-select {
            padding: 0.75rem 1rem;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
            transform: translateY(-2px);
        }

        .btn-outline-secondary:hover {
            background-color: #f0f0f0;
            transform: translateY(-2px);
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
        }

        .accordion {
            border-radius: var(--border-radius);
            overflow: hidden;
        }

        .accordion-item {
            border: none;
            margin-bottom: 0.5rem;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }

        .accordion-button {
            padding: 1rem 1.5rem;
            font-weight: 500;
            background-color: rgba(67, 97, 238, 0.03);
        }

        .accordion-button:not(.collapsed) {
            background-color: rgba(67, 97, 238, 0.08);
            color: var(--primary-color);
        }

        .accordion-button:focus {
            box-shadow: none;
            border-color: transparent;
        }

        .alert {
            border-radius: 8px;
            border: none;
        }

        .alert-info {
            background-color: rgba(67, 97, 238, 0.08);
            color: #2d3b80;
        }

        .floating-container {
            position: relative;
        }

        .floating-label {
            position: absolute;
            top: 0;
            left: 12px;
            transform: translateY(-50%);
            background-color: white;
            padding: 0 8px;
            font-size: 0.8rem;
            color: #666;
            pointer-events: none;
        }

        .step-indicator {
            display: flex;
            margin: 2rem 0;
        }

        .step {
            flex: 1;
            text-align: center;
            position: relative;
        }

        .step::before {
            content: '';
            height: 2px;
            background-color: #e0e0e0;
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
            z-index: 1;
        }

        .step:first-child::before {
            left: 50%;
        }

        .step:last-child::before {
            right: 50%;
        }

        .step-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: white;
            border: 2px solid #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .step-text {
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: #666;
        }

        .step.active .step-icon {
            border-color: var(--primary-color);
            background-color: var(--primary-color);
            color: white;
        }

        .step.active .step-text {
            color: var(--primary-color);
            font-weight: 500;
        }

        .file-upload {
            border: 2px dashed #e0e0e0;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
        }

        .file-upload:hover {
            border-color: var(--primary-color);
        }

        .file-upload i {
            font-size: 2rem;
            color: #999;
            margin-bottom: 1rem;
        }

        #file_pendukung {
            display: none;
        }
    </style>
</head>
<body>
    <div class="page-container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="card mb-4">
                    <div class="card-header form-header">
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper bg-white bg-opacity-25 p-2 rounded-circle me-3">
                                <i class="bi bi-file-earmark-text fs-4"></i>
                            </div>
                            <div>
                                <h4 class="mb-0">Form Pengajuan Surat</h4>
                                <p class="mb-0 opacity-75 small">Silakan lengkapi data untuk mengajukan surat</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <form id="formPengajuanSurat" enctype="multipart/form-data" method="POST" action="<?php echo e(route('pengajuan-surat.store')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <h5 class="text-primary mb-4">Informasi Pemohon</h5>

                                    <div class="mb-4">
                                        <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white">
                                                <i class="bi bi-calendar-event"></i>
                                            </span>
                                            <input type="text" class="form-control bg-light" id="tanggal_pengajuan" value="<?php echo date('d-m-Y H:i'); ?>" readonly name="tanggal_pengajuan">
                                        </div>
                                        <small class="text-muted fst-italic">Tanggal diisi otomatis oleh sistem</small>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label d-block">File Pendukung</label>
                                        <div class="file-upload <?php $__errorArgs = ['file_pendukung'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="fileUploadWrapper">
                                            <i class="bi bi-cloud-arrow-up"></i>
                                            <h6>Unggah file pendukung</h6>
                                            <p class="text-muted small">Klik atau seret file di sini (PDF, JPG, PNG; Maks: 2MB)</p>
                                            <input class="form-control" type="file" id="file_pendukung" name="file_pendukung">
                                        </div>
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
                                </div>

                                <div class="col-md-6">
                                    <h5 class="text-primary mb-4">Detail Pengajuan</h5>

                                    <div class="mb-4">
                                        <label for="jenis_surat_id" class="form-label">Jenis Surat <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white">
                                                <i class="bi bi-envelope-paper"></i>
                                            </span>
                                            <select class="form-select <?php $__errorArgs = ['jenis_surat_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="jenis_surat_id" name="jenis_surat_id" required>
                                                <option value="" selected disabled>Pilih jenis surat</option>
                                                <?php $__currentLoopData = $jenisSurats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenisSurat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($jenisSurat->id); ?>" <?php echo e(old('jenis_surat_id') == $jenisSurat->id ? 'selected' : ''); ?>><?php echo e($jenisSurat->nama); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
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

                                    <div class="mb-4">
                                        <label for="status" class="form-label">Status</label>
                                        <input type="text" class="form-control bg-light" id="status" value="Diajukan" readonly name="status">
                                        <small class="text-muted fst-italic">Status awal pengajuan</small>
                                    </div>

                                    <div class="mb-4">
                                        <label for="keperluan" class="form-label">Keperluan <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white">
                                                <i class="bi bi-chat-left-text"></i>
                                            </span>
                                            <textarea class="form-control <?php $__errorArgs = ['keperluan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="keperluan" name="keperluan" rows="4" placeholder="Jelaskan keperluan pengajuan surat Anda secara detail" required><?php echo e(old('keperluan')); ?></textarea>
                                        </div>
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

                                <input type="hidden" id="user_id" name="user_id">
                                <input type="hidden" id="tanggal_diproses" name="tanggal_diproses">
                                <input type="hidden" id="tanggal_selesai" name="tanggal_selesai">
                                <input type="hidden" id="keterangan_penolakan" name="keterangan_penolakan">

                                <div class="col-12">
                                    <div class="alert alert-info d-flex" role="alert">
                                        <i class="bi bi-info-circle-fill me-3 fs-4"></i>
                                        <div>
                                            <strong>Informasi Proses Pengajuan:</strong>
                                            <p class="mb-0">Pengajuan Anda akan diproses dalam waktu 1-3 hari kerja. Anda akan menerima notifikasi ketika status pengajuan berubah.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <div class="d-flex gap-3">
                                        <button type="submit" class="btn btn-warning flex-grow-sm-1" id="btnKirimPengajuan">
                                            <i class="bi bi-send me-2"></i>Kirim
                                        </button>
                                        <button type="reset" class="btn btn-outline-secondary">
                                            <i class="bi bi-x-circle me-2"></i>Reset
                                        </button>
                                        <a href="<?php echo e(route('menu.warga')); ?>" class="btn btn-primary">
                                            <i class="bi bi-arrow-left-circle me-2"></i>Kembali
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0 d-flex align-items-center">
                            <i class="bi bi-lightbulb text-warning me-2"></i>
                            Panduan Pengajuan
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="accordionPanduan">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                        <i class="bi bi-check-circle me-2 text-success"></i>
                                        Persyaratan Pengajuan
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionPanduan">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex align-items-center">
                                                <i class="bi bi-check-circle-fill text-success me-3"></i>
                                                Identitas warga harus terdaftar dalam sistem
                                            </li>
                                            <li class="list-group-item d-flex align-items-center">
                                                <i class="bi bi-check-circle-fill text-success me-3"></i>
                                                Pastikan data yang diisi sudah benar
                                            </li>
                                            <li class="list-group-item d-flex align-items-center">
                                                <i class="bi bi-check-circle-fill text-success me-3"></i>
                                                Lampirkan file pendukung (jika diperlukan)
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                        <i class="bi bi-arrow-repeat me-2 text-primary"></i>
                                        Proses Penyelesaian
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionPanduan">
                                    <div class="accordion-body">
                                        <div class="d-flex align-items-center mb-3 p-2 bg-light rounded">
                                            <span class="badge bg-info me-3 status-badge">Diajukan</span>
                                            <span>Pengajuan berhasil dikirim dan menunggu proses</span>
                                        </div>
                                        <div class="d-flex align-items-center mb-3 p-2 bg-light rounded">
                                            <span class="badge bg-warning me-3 status-badge">Diproses</span>
                                            <span>Pengajuan sedang ditinjau oleh petugas</span>
                                        </div>
                                        <div class="d-flex align-items-center mb-3 p-2 bg-light rounded">
                                            <span class="badge bg-success me-3 status-badge">Selesai</span>
                                            <span>Pengajuan telah selesai dan dokumen siap diambil</span>
                                        </div>
                                        <div class="d-flex align-items-center p-2 bg-light rounded">
                                            <span class="badge bg-danger me-3 status-badge">Ditolak</span>
                                            <span>Pengajuan ditolak dengan alasan tertentu</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
       document.getElementById('formPengajuanSurat').addEventListener('submit', function(event) {

            const btnKirimPengajuan = document.getElementById('btnKirimPengajuan');
            btnKirimPengajuan.classList.remove('btn-warning');
            btnKirimPengajuan.classList.add('btn-primary');
            btnKirimPengajuan.innerHTML = '<i class="bi bi-check-circle-fill me-2"></i>Mengirim...';

        });


    // Get file upload elements
const fileUploadWrapper = document.getElementById('fileUploadWrapper');
const fileInput = document.getElementById('file_pendukung');

// Make the custom file upload area clickable
fileUploadWrapper.addEventListener('click', function() {
    fileInput.click();
});

// Show file name when selected
fileInput.addEventListener('change', function() {
    if (this.files && this.files[0]) {
        const fileName = this.files[0].name;
        fileUploadWrapper.innerHTML = `
            <i class="bi bi-file-earmark-check text-success"></i>
            <h6>${fileName}</h6>
            <p class="text-muted small">Klik untuk mengubah file</p>
        `;
    }
});

// Optional: Add drag and drop functionality
fileUploadWrapper.addEventListener('dragover', function(e) {
    e.preventDefault();
    this.classList.add('border-primary');
});

fileUploadWrapper.addEventListener('dragleave', function(e) {
    e.preventDefault();
    this.classList.remove('border-primary');
});

fileUploadWrapper.addEventListener('drop', function(e) {
    e.preventDefault();
    this.classList.remove('border-primary');
    
    if (e.dataTransfer.files && e.dataTransfer.files[0]) {
        fileInput.files = e.dataTransfer.files;
        const fileName = e.dataTransfer.files[0].name;
        fileUploadWrapper.innerHTML = `
            <i class="bi bi-file-earmark-check text-success"></i>
            <h6>${fileName}</h6>
            <p class="text-muted small">Klik untuk mengubah file</p>
        `;
    }
});
    </script>


</body>
</html><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/formulir.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?> Riwayat Pengajuan <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/css/sub.menu.pengajuan.surat.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/css/custom.formulir.warga.css')); ?>">
    <style>
        .animate__fadeIn {
            animation-duration: 0.5s;
            animation-name: fadeIn;
        }
    
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
    
            to {
                opacity: 1;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header bg-light py-5 animate__animated animate__fadeIn">
    <div class="container">
        <div class="d-flex flex-column align-items-start">
            <a href="<?php echo e(route('warga.menu')); ?>" class="logo d-flex align-items-center mb-2 text-decoration-none">
                <img src="assets/img/logo.png" alt="" height="30" class="me-2">
                <h1 class="sitename text-primary fw-bold mb-0">SMART<b>LURAH</b></h1>
            </a>
            <p class="text-muted fw-semibold mb-0">Form Pengisian Formulir</p>
        </div>
    </div>
</div>





    <div class="page-container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class='bx bx-check-circle fs-5 align-middle me-2'></i> <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="card mb-4">
                    <div class="card-header form-header">
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper bg-white bg-opacity-25 p-2 rounded-circle me-3">
                                <i class='bx bxs-file-doc fs-4'></i>
                            </div>
                            <div>
                                <h4 class="mb-0">Form Pengajuan Surat</h4>
                                <p class="mb-0 opacity-75 small">Silakan lengkapi data untuk mengajukan surat</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <form id="formPengajuanSurat" method="POST" action="<?php echo e(route('warga.pengajuan')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="container">
                                <div class="row g-4">
                                  <!-- Kolom Kiri -->
                                  <div class="col-md-6">
                                    <div class="card shadow-sm">
                                      <div class="card-header bg-white">
                                        <h5 class="text-primary mb-0">Informasi Pemohon</h5>
                                      </div>
                                      <div class="card-body">
                                        <!-- Tanggal Pengajuan -->
                                        <div class="mb-3">
                                          <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
                                          <div class="input-group">
                                            <span class="input-group-text">
                                              <i class='bx bx-calendar-event'></i>
                                            </span>
                                            <input type="text" class="form-control bg-light" id="tanggal_pengajuan" value="<?php echo date('d-m-Y H:i'); ?>" readonly name="tanggal_pengajuan">
                                          </div>
                                          <small class="text-muted fst-italic">Tanggal diisi otomatis oleh sistem</small>
                                        </div>
                                        
                                        <!-- File Pendukung -->
                                        <div class="mb-3">
                                          <label class="form-label">File Pendukung</label>
                                          <div class="mb-2">
                                            <button type="button" class="btn btn-sm btn-info text-white w-100" data-bs-toggle="modal" data-bs-target="#filePendukungModal">
                                              <i class='bx bx-info-circle me-1'></i> Klik untuk informasi file pendukung
                                            </button>
                                          </div>
                                          <div class="border rounded p-3 text-center bg-light">
                                            <i class='bx bx-cloud-upload fs-3'></i>
                                            <h6 class="mt-2">Unggah file pendukung</h6>
                                            <p class="text-muted small">Klik atau seret file di sini</p>
                                            <input class="form-control" type="file" id="file_pendukung" name="file_pendukung">
                                          </div>
                                        </div>
                                        
                                        <!-- Status -->
                                       
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <!-- Kolom Kanan -->
                                  <div class="col-md-6">
                                    <div class="card shadow-sm">
                                      <div class="card-header bg-white">
                                        <h5 class="text-primary mb-0">Detail Pengajuan</h5>
                                      </div>
                                      <div class="card-body">
                                        <!-- Jenis Surat -->
                                        <div class="mb-3">
                                          <label for="jenis_surat_id" class="form-label">
                                            Jenis Surat <span class="text-danger">*</span>
                                          </label>
                                          <div class="input-group">
                                            <span class="input-group-text">
                                                <i class='bx bxs-envelope-open'></i>
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
                                            <label for="status" class="form-label">Status</label>
                                            <input type="text" class="form-control bg-light" id="statuss" value="Diajukan" readonly name="status">
                                            <small class="text-muted fst-italic">Status awal pengajuan</small>
                                          </div>
                                        
                                        <!-- Keterangan Pengajuan -->
                                        
                                      </div>
                                    </div>
                                  </div>


                                  <div class="mb-3">
                                    <label class="form-label fw-semibold">Keterangan Pengajuan</label>
                                    <div class="alert alert-light border mb-3">
                                      <p class="small mb-0 text-muted">
                                        Silakan lengkapi keterangan ini untuk memperjelas pengajuan Anda.
                                        Informasi yang lengkap akan mempercepat proses persetujuan.
                                      </p>
                                    </div>
                                    
                                    <!-- Apa -->
                                    <div class="mb-3">
                                      <label for="apa" class="form-label">Apa <span class="text-danger">*</span></label>
                                      <textarea class="form-control" id="apa" name="apa" rows="2" placeholder="Apa yang Anda ajukan?" required data-bs-toggle="modal" data-bs-target="#apaModal"></textarea>
                                    </div>
                                    
                                    <!-- Mengapa -->
                                    <div class="mb-3">
                                      <label for="mengapa" class="form-label">Mengapa <span class="text-danger">*</span></label>
                                      <textarea class="form-control" id="mengapa" name="mengapa" rows="2" placeholder="Mengapa Anda mengajukan surat ini?" required data-bs-toggle="modal" data-bs-target="#mengapaModal"></textarea>
                                    </div>
                                    
                                    
                                    </div>
                                  </div>
                                  <!-- Kapan dan Dimana -->
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="mb-3">
                                        <label for="kapan" class="form-label">Kapan</label>
                                        <textarea class="form-control" id="kapan" name="kapan" rows="2" placeholder="Kapan peristiwa terjadi?" required data-bs-toggle="modal" data-bs-target="#kapanModal"></textarea>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="mb-3">
                                        <label for="di_mana" class="form-label">Di Mana</label>
                                        <textarea class="form-control" id="di_mana" name="di_mana" rows="2" placeholder="Lokasi peristiwa" required data-bs-toggle="modal" data-bs-target="#diManaModal"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <!-- Siapa dan Bagaimana -->
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="mb-3">
                                        <label for="siapa" class="form-label">Siapa</label>
                                        <textarea class="form-control" id="siapa" name="siapa" rows="2" placeholder="Pihak yang terlibat" required data-bs-toggle="modal" data-bs-target="#siapaModal"></textarea>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="mb-3">
                                        <label for="bagaimana" class="form-label">Bagaimana</label>
                                        <textarea class="form-control" id="bagaimana" name="bagaimana" rows="2" placeholder="Proses/kronologi" required data-bs-toggle="modal" data-bs-target="#bagaimanaModal"></textarea>
                                      </div>
                                    </div>
                                  
                                  <!-- Hidden fields -->
                                  <input type="hidden" id="user_id" name="user_id">
                                  <input type="hidden" id="tanggal_diproses" name="tanggal_diproses">
                                  <input type="hidden" id="tanggal_selesai" name="tanggal_selesai">
                                  <input type="hidden" id="keterangan_penolakan" name="keterangan_penolakan">
                                  
                                  <!-- Info Alert -->
                                  <div class="col-12">
                                    <div class="alert alert-info d-flex" role="alert">
                                      <i class='bx bx-info-circle fs-5 align-middle me-3'></i>
                                      <div>
                                        <strong>Informasi Proses Pengajuan:</strong>
                                        <p class="mb-0">Pengajuan Anda akan diproses dalam waktu 1-3 hari kerja. Anda akan menerima notifikasi ketika status pengajuan berubah.</p>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <!-- Buttons -->
                                  <div class="col-12 mb-4">
                                    <div class="d-flex gap-2">
                                      <button type="submit" class="btn btn-warning" id="btnKirimPengajuan">
                                        <i class='bx bx-send me-2'></i>Kirim
                                      </button>
                                      <button type="reset" class="btn btn-outline-secondary">
                                        <i class='bx bx-x-circle me-2'></i>Reset
                                      </button>
                                      <a href="<?php echo e(route('warga.menu')); ?>" class="btn btn-primary ms-auto">
                                        <i class='bx bx-arrow-back-circle me-2'></i>Kembali
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </form>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0 d-flex align-items-center">
                            <i class='bx bx-bulb text-warning me-2'></i>
                            Panduan Pengajuan
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="accordionPanduan">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                        <i class='bx bx-check-circle me-2 text-success'></i>
                                        Persyaratan Pengajuan
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionPanduan">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex align-items-center">
                                                <i class='bx bx-check-circle-alt text-success me-3'></i>
                                                Identitas warga harus terdaftar dalam sistem
                                            </li>
                                            <li class="list-group-item d-flex align-items-center">
                                                <i class='bx bx-check-circle-alt text-success me-3'></i>
                                                Pastikan data yang diisi sudah benar
                                            </li>
                                            <li class="list-group-item d-flex align-items-center">
                                                <i class='bx bx-check-circle-alt text-success me-3'></i>
                                                Lampirkan file pendukung (jika diperlukan)
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                        <i class='bx bx-refresh me-2 text-primary'></i>
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



    <?php echo $__env->make('dashboardwarga.modalFormulir', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // File Upload Handler
            const fileInput = document.getElementById('file_pendukung');
            const fileUploadWrapper = document.getElementById('fileUploadWrapper');
            fileInput.addEventListener('change', function() {
                if (this.files.length > 0) {
                    const fileName = this.files[0].name;
                    const fileSize = Math.round(this.files[0].size / 1024); // KB

                    fileUploadWrapper.classList.add('has-file');
                    // Menampilkan nama file
                    const infoElement = document.createElement('p');
                    infoElement.className = 'file-info';
                    infoElement.textContent = `File: ${fileName} (${fileSize} KB)`;
                    // Hapus info sebelumnya jika ada
                    const oldInfo = fileUploadWrapper.querySelector('.file-info');
                    if (oldInfo) {
                        fileUploadWrapper.removeChild(oldInfo);
                    }
                    fileUploadWrapper.appendChild(infoElement);
                } else {
                    fileUploadWrapper.classList.remove('has-file');
                    const oldInfo = fileUploadWrapper.querySelector('.file-info');
                    if (oldInfo) {
                        fileUploadWrapper.removeChild(oldInfo);
                    }
                }
            });

            // Show tooltip for info buttons
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
 
            document.getElementById('fileUploadWrapper').addEventListener('click', function(e) {
                // Only show the modal if they click on the wrapper, not specifically the file input
                if (e.target !== fileInput) {
                    const modal = new bootstrap.Modal(document.getElementById('filePendukungModal'));
                    modal.show();
                }
            });
            
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-without-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/dashboardwarga/formulir.blade.php ENDPATH**/ ?>
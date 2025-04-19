<div class="modal fade" id="createSuratMasukModal" tabindex="-1" aria-labelledby="createSuratMasukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="<?php echo e(route('surat-masuk.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="createSuratMasukModalLabel">Tambah Surat Masuk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nomor_surat" class="form-label text-secondary">Nomor Surat (Wajib)</label>
                            <input type="text" name="nomor_surat" class="form-control" id="nomor_surat" value="<?php echo e(old('nomor_surat')); ?>" placeholder="Masukkan Nomor Surat" required>
                            <?php $__errorArgs = ['nomor_surat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="kode_surat" class="form-label text-secondary">Kode Surat (Wajib)</label>
                            <input type="text" name="kode_surat" class="form-control" id="kode_surat" value="<?php echo e(old('kode_surat')); ?>" placeholder="Masukkan Kode Surat" required>
                            <?php $__errorArgs = ['kode_surat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="dari" class="form-label text-secondary">Dari (Wajib)</label>
                        <input type="text" name="dari" class="form-control" id="dari" value="<?php echo e(old('dari')); ?>" placeholder="Masukkan Nama Pengirim" required>
                        <?php $__errorArgs = ['dari'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label for="tujuan" class="form-label text-secondary">Tujuan (Wajib)</label>
                        <input type="text" name="tujuan" class="form-control" id="tujuan" value="<?php echo e(old('tujuan')); ?>" placeholder="Masukkan Tujuan Surat" required>
                        <?php $__errorArgs = ['tujuan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_surat" class="form-label text-secondary">Tanggal Surat (Wajib)</label>
                            <input type="date" name="tanggal_surat" class="form-control" id="tanggal_surat" value="<?php echo e(old('tanggal_surat')); ?>" required>
                            <?php $__errorArgs = ['tanggal_surat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="tanggal_diterima" class="form-label text-secondary">Tanggal Diterima (Wajib)</label>
                            <input type="date" name="tanggal_diterima" class="form-control" id="tanggal_diterima" value="<?php echo e(old('tanggal_diterima')); ?>" required>
                            <?php $__errorArgs = ['tanggal_diterima'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="catatan" class="form-label text-secondary">Catatan (Opsional)</label>
                        <textarea name="catatan" class="form-control" id="catatan" rows="2" placeholder="Masukkan catatan tambahan jika ada"><?php echo e(old('catatan')); ?></textarea>
                        <?php $__errorArgs = ['catatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label for="ringkasan" class="form-label text-secondary">Ringkasan (Wajib)</label>
                        <textarea name="ringkasan" class="form-control" id="ringkasan" rows="2" placeholder="Masukkan ringkasan surat jika ada" required><?php echo e(old('ringkasan')); ?></textarea>
                        <?php $__errorArgs = ['ringkasan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>


                    <div class="mb-3">
                        <label for="attachments" class="form-label text-secondary">File Lampiran</label>
                        <input type="file" name="attachments[]" class="form-control" id="attachments" multiple required>
                        <?php $__errorArgs = ['attachments'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php $__errorArgs = ['attachments.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <small class="text-muted">Format file yang diizinkan: pdf. Maksimal ukuran per file: 2MB.</small>
                    </div>

                    
                    <input type="hidden" name="tipe_surat" value="<?php echo e(\App\Enums\Surat::MASUK->value); ?>">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if($errors->any()): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            <?php if($errors->hasAny(['nomor_surat', 'dari', 'tujuan', 'tanggal_surat', 'tanggal_diterima', 'catatan', 'ringkasan', 'ekspedisi', 'attachments'])): ?>
                var createModal = new bootstrap.Modal(document.getElementById('createSuratMasukModal'));
                createModal.show();
            <?php elseif($errors->has('id')): ?>
                var editModal = new bootstrap.Modal(document.getElementById('editSuratMasukModal'));
                editModal.show();
            <?php endif; ?>
        });
    </script>
<?php endif; ?>
<?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/surat/masuk/create.blade.php ENDPATH**/ ?>
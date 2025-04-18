<div class="modal fade" id="editSuratKeluarModal" tabindex="-1" aria-labelledby="editSuratMasukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="editSuratKeluarForm" method="POST" action="">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="editSuratKeluarModalLabel">Edit Surat Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_nomor_surat" class="form-label text-secondary">Nomor Surat</label>
                            <input type="text" name="nomor_surat" class="form-control" id="edit_nomor_surat" required value="<?php echo e(old('nomor_surat')); ?>" placeholder="Masukkan Nomor Surat">
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
                            <label for="edit_pengirim" class="form-label text-secondary">Pengirim</label>
                            <input type="text" name="pengirim" class="form-control" id="edit_pengirim" required value="<?php echo e(old('pengirim')); ?>" placeholder="Masukkan Nama Pengirim">
                            <?php $__errorArgs = ['pengirim'];
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
                        <label for="edit_perihal" class="form-label text-secondary">Perihal</label>
                        <input type="text" name="perihal" class="form-control" id="edit_perihal" required value="<?php echo e(old('perihal')); ?>" placeholder="Masukkan Perihal Surat">
                        <?php $__errorArgs = ['perihal'];
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
                            <label for="edit_tanggal_surat" class="form-label text-secondary">Tanggal Surat</label>
                            <input type="date" name="tanggal_surat" class="form-control" id="edit_tanggal_surat" required value="<?php echo e(old('tanggal_surat')); ?>">
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
                            <label for="edit_tanggal_diterima" class="form-label text-secondary">Tanggal Diterima</label>
                            <input type="date" name="tanggal_diterima" class="form-control" id="edit_tanggal_diterima" required value="<?php echo e(old('tanggal_diterima')); ?>">
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
                        <label for="edit_lampiran" class="form-label text-secondary">File Lampiran (Kosongkan jika tidak ingin diubah)</label>
                        <input type="file" name="lampiran" class="form-control" id="edit_lampiran">
                        <?php $__errorArgs = ['lampiran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <small class="text-muted">Format file yang diizinkan: pdf, doc, docx. Maksimal ukuran: 2MB.</small>
                        <p class="mt-1">File saat ini: <span id="current_lampiran"></span></p>
                    </div>

                    <div class="mb-3">
                        <label for="edit_keterangan" class="form-label text-secondary">Keterangan (Opsional)</label>
                        <textarea name="keterangan" class="form-control" id="edit_keterangan" rows="2" placeholder="Masukkan keterangan tambahan jika ada"><?php echo e(old('keterangan')); ?></textarea>
                        <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if($errors->any()): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modal = new bootstrap.Modal(document.getElementById('editSuratKeluarModal'));
            modal.show();
        });
    </script>
<?php endif; ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editSuratKeluarModal = document.getElementById('editSuratKeluarModal');
        if (editSuratKeluarModal) {
            editSuratKeluarModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                const nomorSurat = button.getAttribute('data-nomor_surat');
                const pengirim = button.getAttribute('data-pengirim');
                const perihal = button.getAttribute('data-perihal');
                const tanggalSurat = button.getAttribute('data-tanggal_surat');
                const tanggalDiterima = button.getAttribute('data-tanggal_diterima');
                const lampiran = button.getAttribute('data-lampiran'); // Nama file saja

                const modalForm = editSuratKeluarModal.querySelector('#editSuratKeluarForm');
                const modalId = editSuratKeluarModal.querySelector('#edit_id');
                const modalNomorSurat = editSuratKeluarModal.querySelector('#edit_nomor_surat');
                const modalPengirim = editSuratKeluarModal.querySelector('#edit_pengirim');
                const modalPerihal = editSuratKeluarModal.querySelector('#edit_perihal');
                const modalTanggalSurat = editSuratKeluarModal.querySelector('#edit_tanggal_surat');
                const modalTanggalDiterima = editSuratKeluarModal.querySelector('#edit_tanggal_diterima');
                const currentLampiranSpan = editSuratKeluarModal.querySelector('#current_lampiran');

                modalForm.action = `/surat-keluar/${id}`; // Set URL edit yang benar
                modalId.value = id;
                modalNomorSurat.value = nomorSurat;
                modalPengirim.value = pengirim;
                modalPerihal.value = perihal;
                modalTanggalSurat.value = tanggalSurat;
                modalTanggalDiterima.value = tanggalDiterima;
                currentLampiranSpan.textContent = lampiran ? lampiran.split('/').pop() : 'Tidak ada file'; // Tampilkan nama file saja
            });
        }
    });
</script><?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/surat/keluar/edit.blade.php ENDPATH**/ ?>
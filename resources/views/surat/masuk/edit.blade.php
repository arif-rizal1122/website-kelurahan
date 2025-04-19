<div class="modal fade" id="editSuratMasukModal" tabindex="-1" aria-labelledby="editSuratMasukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="editSuratMasukForm" method="POST" action="" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editSuratMasukModalLabel">Edit Surat Masuk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_nomor_surat" class="form-label text-secondary">Nomor Surat (Wajib)</label>
                            <input type="text" name="nomor_surat" class="form-control" id="edit_nomor_surat" value="" placeholder="Masukkan Nomor Surat" required>
                            @error('nomor_surat') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_kode_surat" class="form-label text-secondary">Kode Surat (Wajib)</label>
                            <input type="text" name="kode_surat" class="form-control" id="edit_kode_surat" value="" placeholder="Masukkan Kode Surat" required>
                            @error('kode_surat') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_dari" class="form-label text-secondary">Dari (Wajib)</label>
                        <input type="text" name="dari" class="form-control" id="edit_dari" value="" placeholder="Masukkan Nama Pengirim" required>
                        @error('dari') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="edit_tujuan" class="form-label text-secondary">Tujuan (Wajib)</label>
                        <input type="text" name="tujuan" class="form-control" id="edit_tujuan" value="" placeholder="Masukkan Tujuan Surat" required>
                        @error('tujuan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_tanggal_surat" class="form-label text-secondary">Tanggal Surat (Wajib)</label>
                            <input type="date" name="tanggal_surat" class="form-control" id="edit_tanggal_surat" value="" required>
                            @error('tanggal_surat') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_tanggal_diterima" class="form-label text-secondary">Tanggal Diterima (Wajib)</label>
                            <input type="date" name="tanggal_diterima" class="form-control" id="edit_tanggal_diterima" value="" required>
                            @error('tanggal_diterima') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_catatan" class="form-label text-secondary">Catatan (Opsional)</label>
                        <textarea name="catatan" class="form-control" id="edit_catatan" rows="2" placeholder="Masukkan catatan tambahan jika ada"></textarea>
                        @error('catatan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="edit_ringkasan" class="form-label text-secondary">Ringkasan (Wajib)</label>
                        <textarea name="ringkasan" class="form-control" id="edit_ringkasan" rows="2" placeholder="Masukkan ringkasan surat jika ada" required></textarea>
                        @error('ringkasan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="existing_attachments" class="form-label text-secondary">Lampiran Saat Ini</label>
                        <div class="existing-attachments">
                            <!-- Akan diisi melalui JavaScript -->
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_attachments" class="form-label text-secondary">Ubah/Tambah File Lampiran</label>
                        <input type="file" name="attachments[]" class="form-control" id="edit_attachments" multiple>
                        @error('attachments') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        @error('attachments.*') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        <small class="text-muted">Format file yang diizinkan: pdf. Maksimal ukuran per file: 2MB. Anda dapat memilih beberapa file.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if ($errors->hasAny(['nomor_surat', 'dari', 'tujuan', 'tanggal_surat', 'tanggal_diterima', 'catatan', 'ringkasan', 'attachments', 'removed_attachments']))
                var editModal = new bootstrap.Modal(document.getElementById('editSuratMasukModal'));
                editModal.show();
            @endif
        });
    </script>
@endif
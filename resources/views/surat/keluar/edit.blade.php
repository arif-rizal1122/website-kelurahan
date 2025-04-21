<div class="modal fade" id="editSuratKeluarModal" tabindex="-1" aria-labelledby="editSuratMasukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="editSuratKeluarForm" method="POST" action="" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editSuratKeluarModalLabel">Edit Surat Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_nomor_surat" class="form-label text-secondary">Nomor Surat</label>
                            <input type="text" name="nomor_surat" class="form-control" id="edit_nomor_surat" required value="{{ old('nomor_surat') }}" placeholder="Masukkan Nomor Surat">
                            @error('nomor_surat') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_dari" class="form-label text-secondary">Pengirim</label>
                            <input type="text" name="dari" class="form-control" id="edit_dari" required value="{{ old('dari') }}" placeholder="Masukkan Nama Pengirim">
                            @error('dari') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_tujuan" class="form-label text-secondary">Tujuan</label>
                            <input type="text" name="tujuan" class="form-control" id="edit_tujuan" required value="{{ old('tujuan') }}" placeholder="Masukkan Tujuan Surat">
                            @error('tujuan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_tanggal_surat" class="form-label text-secondary">Tanggal Surat</label>
                            <input type="date" name="tanggal_surat" class="form-control" id="edit_tanggal_surat" required value="{{ old('tanggal_surat') }}">
                            @error('tanggal_surat') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_tanggal_pengiriman" class="form-label text-secondary">Tanggal Pengiriman</label>
                            <input type="date" name="tanggal_pengiriman" class="form-control" id="edit_tanggal_pengiriman" required value="{{ old('tanggal_pengiriman') }}">
                            @error('tanggal_pengiriman') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="edit_attachments" class="form-label text-secondary">Ubah/Tambah File Lampiran</label>
                            <input type="file" name="attachments[]" class="form-control" id="edit_attachments" multiple>
                            @error('attachments') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                            @error('attachments.*') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                            <small class="text-muted">Format file yang diizinkan: pdf. Maksimal ukuran per file: 2MB. Anda dapat memilih beberapa file.</small>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="existing_attachments" class="form-label text-secondary">Lampiran Saat Ini</label>
                        <div class="existing-attachments">
                            <!-- Akan diisi melalui JavaScript -->
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_isi_surat" class="form-label text-secondary">Isi Surat</label>
                        <textarea name="isi_surat" class="form-control" id="edit_isi_surat" rows="5" required placeholder="Masukkan Isi Surat">{{ old('isi_surat') }}</textarea>
                        @error('isi_surat') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="edit_catatan" class="form-label text-secondary">Catatan</label>
                        <textarea name="catatan" class="form-control" id="edit_catatan" rows="3" required placeholder="Masukkan Catatan">{{ old('catatan') }}</textarea>
                        @error('catatan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
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

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modal = new bootstrap.Modal(document.getElementById('editSuratKeluarModal'));
            modal.show();
        });
    </script>
@endif
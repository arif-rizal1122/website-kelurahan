<div class="modal fade" id="createSuratKeluarModal" tabindex="-1" aria-labelledby="createSuratMasukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('surat-keluar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createSuratKeluarModalLabel">Tambah Surat Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nomor_surat" class="form-label text-secondary">Nomor Surat</label>
                            <input type="text" name="nomor_surat" class="form-control" id="nomor_surat" required value="{{ old('nomor_surat') }}" placeholder="Masukkan Nomor Surat">
                            @error('nomor_surat') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="pengirim" class="form-label text-secondary">Pengirim</label>
                            <input type="text" name="pengirim" class="form-control" id="pengirim" required value="{{ old('pengirim') }}" placeholder="Masukkan Nama Pengirim">
                            @error('pengirim') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="perihal" class="form-label text-secondary">Perihal</label>
                        <input type="text" name="perihal" class="form-control" id="perihal" required value="{{ old('perihal') }}" placeholder="Masukkan Perihal Surat">
                        @error('perihal') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_surat" class="form-label text-secondary">Tanggal Surat</label>
                            <input type="date" name="tanggal_surat" class="form-control" id="tanggal_surat" required value="{{ old('tanggal_surat') }}">
                            @error('tanggal_surat') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="tanggal_diterima" class="form-label text-secondary">Tanggal Diterima</label>
                            <input type="date" name="tanggal_diterima" class="form-control" id="tanggal_diterima" required value="{{ old('tanggal_diterima') }}">
                            @error('tanggal_diterima') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="lampiran" class="form-label text-secondary">File Lampiran</label>
                        <input type="file" name="lampiran" class="form-control" id="lampiran" required>
                        @error('lampiran') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        <small class="text-muted">Format file yang diizinkan: pdf, doc, docx. Maksimal ukuran: 2MB.</small>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label text-secondary">Keterangan (Opsional)</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" rows="2" placeholder="Masukkan keterangan tambahan jika ada">{{ old('keterangan') }}</textarea>
                        @error('keterangan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modal = new bootstrap.Modal(document.getElementById('createSuratKeluarModal'));
            modal.show();
        });
    </script>
@endif
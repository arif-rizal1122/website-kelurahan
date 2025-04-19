<div class="modal fade" id="createSuratMasukModal" tabindex="-1" aria-labelledby="createSuratMasukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('surat-masuk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createSuratMasukModalLabel">Tambah Surat Masuk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nomor_surat" class="form-label text-secondary">Nomor Surat (Wajib)</label>
                            <input type="text" name="nomor_surat" class="form-control" id="nomor_surat" value="{{ old('nomor_surat') }}" placeholder="Masukkan Nomor Surat" required>
                            @error('nomor_surat') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="kode_surat" class="form-label text-secondary">Kode Surat (Wajib)</label>
                            <input type="text" name="kode_surat" class="form-control" id="kode_surat" value="{{ old('kode_surat') }}" placeholder="Masukkan Kode Surat" required>
                            @error('kode_surat') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="dari" class="form-label text-secondary">Dari (Wajib)</label>
                        <input type="text" name="dari" class="form-control" id="dari" value="{{ old('dari') }}" placeholder="Masukkan Nama Pengirim" required>
                        @error('dari') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tujuan" class="form-label text-secondary">Tujuan (Wajib)</label>
                        <input type="text" name="tujuan" class="form-control" id="tujuan" value="{{ old('tujuan') }}" placeholder="Masukkan Tujuan Surat" required>
                        @error('tujuan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_surat" class="form-label text-secondary">Tanggal Surat (Wajib)</label>
                            <input type="date" name="tanggal_surat" class="form-control" id="tanggal_surat" value="{{ old('tanggal_surat') }}" required>
                            @error('tanggal_surat') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="tanggal_diterima" class="form-label text-secondary">Tanggal Diterima (Wajib)</label>
                            <input type="date" name="tanggal_diterima" class="form-control" id="tanggal_diterima" value="{{ old('tanggal_diterima') }}" required>
                            @error('tanggal_diterima') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="catatan" class="form-label text-secondary">Catatan (Opsional)</label>
                        <textarea name="catatan" class="form-control" id="catatan" rows="2" placeholder="Masukkan catatan tambahan jika ada">{{ old('catatan') }}</textarea>
                        @error('catatan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="ringkasan" class="form-label text-secondary">Ringkasan (Wajib)</label>
                        <textarea name="ringkasan" class="form-control" id="ringkasan" rows="2" placeholder="Masukkan ringkasan surat jika ada" required>{{ old('ringkasan') }}</textarea>
                        @error('ringkasan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>


                    <div class="mb-3">
                        <label for="attachments" class="form-label text-secondary">File Lampiran</label>
                        <input type="file" name="attachments[]" class="form-control" id="attachments" multiple required>
                        @error('attachments') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        @error('attachments.*') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        <small class="text-muted">Format file yang diizinkan: pdf. Maksimal ukuran per file: 2MB.</small>
                    </div>

                    {{-- Field 'surat' akan diisi otomatis di controller --}}
                    <input type="hidden" name="tipe_surat" value="{{ \App\Enums\Surat::MASUK->value }}">

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
            @if ($errors->hasAny(['nomor_surat', 'dari', 'tujuan', 'tanggal_surat', 'tanggal_diterima', 'catatan', 'ringkasan', 'ekspedisi', 'attachments']))
                var createModal = new bootstrap.Modal(document.getElementById('createSuratMasukModal'));
                createModal.show();
            @elseif ($errors->has('id'))
                var editModal = new bootstrap.Modal(document.getElementById('editSuratMasukModal'));
                editModal.show();
            @endif
        });
    </script>
@endif

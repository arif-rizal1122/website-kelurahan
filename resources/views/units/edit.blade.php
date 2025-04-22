<div class="modal fade" id="editUnitModal" tabindex="-1" aria-labelledby="editUnitModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="editUnitForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editUnitModalLabel">Edit Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="mb-3">
                        <label for="edit_nama" class="form-label text-secondary">Nama Unit (Wajib)</label>
                        <input type="text" name="nama" class="form-control" id="edit_nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Unit" required>
                        @error('nama') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="edit_kode" class="form-label text-secondary">Kode Unit (Opsional)</label>
                        <input type="text" name="kode" class="form-control" id="edit_kode" value="{{ old('kode') }}" placeholder="Masukkan Kode Unit">
                        @error('kode') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="edit_deskripsi" class="form-label text-secondary">Deskripsi (Opsional)</label>
                        <textarea name="deskripsi" class="form-control" id="edit_deskripsi" rows="3" placeholder="Masukkan Deskripsi Unit">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="edit_kepala_unit_id" class="form-label text-secondary">Kepala Unit (Opsional)</label>
                        <select class="form-select" id="edit_kepala_unit_id" name="kepala_unit_id">
                            <option value="">Pilih Kepala Unit</option>
                            @foreach (\App\Models\User::all() as $user)
                                <option value="{{ $user->id }}" {{ old('kepala_unit_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('kepala_unit_id') <div class="text-danger mt-1">{{ $message }}</div> @enderror
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
            @if ($errors->hasAny(['nama', 'kode', 'deskripsi', 'kepala_unit_id']) && session('edit_modal'))
                var editModal = new bootstrap.Modal(document.getElementById('editUnitModal'));
                editModal.show();
            @endif
        });
    </script>
@endif
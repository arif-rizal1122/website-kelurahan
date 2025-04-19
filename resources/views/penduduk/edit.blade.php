<div class="modal fade" id="editPendudukModal" tabindex="-1" aria-labelledby="editPendudukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="editPendudukForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_id" name="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPendudukModalLabel">Edit Data Penduduk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_nik" class="form-label text-secondary">NIK</label>
                            <input type="text" name="nik" class="form-control" id="edit_nik" required placeholder="Masukkan 16 digit NIK">
                            @error('nik') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_no_kk_sebelumnya" class="form-label text-secondary">No KK Sebelumnya</label>
                            <input type="text" name="no_kk_sebelumnya" class="form-control" id="edit_no_kk_sebelumnya" placeholder="Masukkan nomor KK sebelumnya jika ada">
                            @error('no_kk_sebelumnya') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_nama" class="form-label text-secondary">Nama</label>
                            <input type="text" name="nama" class="form-control" id="edit_nama" required placeholder="Masukkan nama lengkap">
                            @error('nama') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_jenis_kelamin" class="form-label text-secondary">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" id="edit_jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                @foreach (\App\Enums\JenisKelamin::cases() as $jenisKelamin)
                                    <option value="{{ $jenisKelamin->value }}">
                                        {{ $jenisKelamin->value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis_kelamin') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_email" class="form-label text-secondary">Email</label>
                            <input type="email" name="email" class="form-control" id="edit_email" required placeholder="nama@contoh.com">
                            @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_agama" class="form-label text-secondary">Agama</label>
                            <select name="agama" class="form-select" id="edit_agama" required>
                                <option value="">Pilih Agama</option>
                                @foreach (\App\Enums\Agama::cases() as $agama)
                                    <option value="{{ $agama->value }}">
                                        {{ $agama->value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('agama') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_tempat_lahir" class="form-label text-secondary">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" id="edit_tempat_lahir" required placeholder="Masukkan kota kelahiran">
                            @error('tempat_lahir') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_tanggal_lahir" class="form-label text-secondary">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" id="edit_tanggal_lahir" required>
                            @error('tanggal_lahir') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_status_kawin" class="form-label text-secondary">Status Kawin</label>
                            <select name="status_kawin" class="form-select" id="edit_status_kawin" required>
                                <option value="">Pilih Status Kawin</option>
                                @foreach (\App\Enums\StatusKawin::cases() as $statusKawin)
                                    <option value="{{ $statusKawin->value }}">
                                        {{ $statusKawin->value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status_kawin') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_status_keadaan" class="form-label text-secondary">Status Keadaan</label>
                            <select name="status_keadaan" class="form-select" id="edit_status_keadaan" required>
                                <option value="">Pilih Status Keadaan</option>
                                @foreach (\App\Enums\StatusKeadaan::cases() as $statusKeadaan)
                                    <option value="{{ $statusKeadaan->value }}">
                                        {{ $statusKeadaan->value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status_keadaan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_warga_negara" class="form-label text-secondary">Warga Negara</label>
                            <input type="text" name="warga_negara" class="form-control" id="edit_warga_negara" required placeholder="Contoh: WNI/WNA">
                            @error('warga_negara') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_pendidikan_terakhir" class="form-label text-secondary">Pendidikan Terakhir</label>
                            <select name="pendidikan_terakhir" class="form-select" id="edit_pendidikan_terakhir" required>
                                <option value="">Pilih Pendidikan Terakhir</option>
                                @foreach (\App\Enums\Pendidikan::cases() as $pendidikan)
                                    <option value="{{ $pendidikan->value }}">
                                        {{ $pendidikan->value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('pendidikan_terakhir') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_ayah_nik" class="form-label text-secondary">NIK Ayah</label>
                            <input type="text" name="ayah_nik" class="form-control" id="edit_ayah_nik" placeholder="Masukkan 16 digit NIK ayah jika ada">
                            @error('ayah_nik') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_ibu_nik" class="form-label text-secondary">NIK Ibu</label>
                            <input type="text" name="ibu_nik" class="form-control" id="edit_ibu_nik" placeholder="Masukkan 16 digit NIK ibu jika ada">
                            @error('ibu_nik') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_nama_ayah" class="form-label text-secondary">Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control" id="edit_nama_ayah" required placeholder="Masukkan nama lengkap ayah">
                            @error('nama_ayah') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_nama_ibu" class="form-label text-secondary">Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control" id="edit_nama_ibu" required placeholder="Masukkan nama lengkap ibu">
                            @error('nama_ibu') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_hubungan_warga" class="form-label text-secondary">Hubungan Warga</label>
                            <select name="hubungan_warga" class="form-select" id="edit_hubungan_warga" required>
                                <option value="">Pilih Hubungan Warga</option>
                                @foreach (\App\Enums\HubunganWarga::cases() as $hubunganWarga)
                                    <option value="{{ $hubunganWarga->value }}">
                                        {{ $hubunganWarga->value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('hubungan_warga') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_golongan_darah" class="form-label text-secondary">Golongan Darah</label>
                            <select name="golongan_darah" class="form-select" id="edit_golongan_darah" required>
                                <option value="">Pilih Golongan Darah</option>
                                @foreach (\App\Enums\GolonganDarah::cases() as $golonganDarah)
                                    <option value="{{ $golonganDarah->value }}">
                                        {{ $golonganDarah->value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('golongan_darah') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_suku" class="form-label text-secondary">Suku</label>
                            <select name="suku" class="form-select" id="edit_suku" required>
                                <option value="">Pilih Suku</option>
                                @foreach ($suku as $sukuItem)
                                    <option value="{{ $sukuItem->value }}">
                                        {{ $sukuItem->value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('suku') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_status_rekam" class="form-label text-secondary">Status Rekam</label>
                            <select name="status_rekam" class="form-select" id="edit_status_rekam" required>
                                <option value="">Pilih Status Rekam</option>
                                @foreach (\App\Enums\StatusRekam::cases() as $statusRekam)
                                    <option value="{{ $statusRekam->value }}">
                                        {{ $statusRekam->value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status_rekam') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_ktp_el" class="form-label text-secondary">KTP Elektronik</label>
                            <select name="ktp_el" class="form-select" id="edit_ktp_el" required>
                                <option value="">Pilih KTP Elektronik</option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                            @error('ktp_el') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit_tempat_cetak_ktp" class="form-label text-secondary">Tempat Cetak KTP</label>
                            <input type="text" name="tempat_cetak_ktp" class="form-control" id="edit_tempat_cetak_ktp" placeholder="Contoh: Kantor Kecamatan Setiabudi">
                            @error('tempat_cetak_ktp') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_tanggal_cetak_ktp" class="form-label text-secondary">Cetak KTP</label>
                            <input type="date" name="tanggal_cetak_ktp" class="form-control" id="edit_tanggal_cetak_ktp">
                            @error('tanggal_cetak_ktp') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_pekerjaan" class="form-label text-secondary">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" id="edit_pekerjaan" required placeholder="Contoh: Guru, Wiraswasta, PNS, dll">
                            @error('pekerjaan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_alamat_sekarang" class="form-label text-secondary">Alamat Sekarang</label>
                        <textarea name="alamat_sekarang" class="form-control" id="edit_alamat_sekarang" rows="2" required placeholder="Masukkan alamat lengkap tempat tinggal saat ini"></textarea>
                        @error('alamat_sekarang') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="edit_alamat_sebelumnya" class="form-label text-secondary">Alamat Sebelumnya</label>
                        <textarea name="alamat_sebelumnya" class="form-control" id="edit_alamat_sebelumnya" rows="2" placeholder="Masukkan alamat tempat tinggal sebelumnya jika ada"></textarea>
                        @error('alamat_sebelumnya') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="edit_note" class="form-label text-secondary">Catatan</label>
                        <textarea name="note" class="form-control" id="edit_note" rows="2" placeholder="Informasi tambahan lainnya (opsional)"></textarea>
                        @error('note') <div class="text-danger mt-1">{{ $message }}</div> @enderror
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
            var modal = new bootstrap.Modal(document.getElementById('editPendudukModal'));
            modal.show();
        });
    </script>
@endif
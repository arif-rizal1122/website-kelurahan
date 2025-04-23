@extends('layouts.master')

@section('title')
    @lang('translation.edit') Edit Data Penduduk
@endsection

@section('css')
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Penduduk @endslot
        @slot('title') Edit Data Penduduk @endslot
    @endcomponent
    
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-user-edit font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">Form Edit Penduduk</h4>
                    </div>
                </div>

                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('penduduk.update', $penduduk->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="penduduk" value="{{ $penduduk->id }}">

                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2"><i class="bx bx-user-circle me-1"></i>Data Pribadi</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nama" class="form-label fw-bold text-primary">
                                        <i class="bx bx-user me-1"></i>Nama Lengkap <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('nama') is-invalid @enderror"
                                           id="nama"
                                           name="nama"
                                           value="{{ old('nama', $penduduk->nama) }}"
                                           placeholder="Masukkan nama lengkap"
                                           maxlength="100"
                                           required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nik" class="form-label fw-bold text-primary">
                                        <i class="bx bx-id-card me-1"></i>NIK <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('nik') is-invalid @enderror"
                                           id="nik"
                                           name="nik"
                                           value="{{ old('nik', $penduduk->nik) }}"
                                           placeholder="Masukkan NIK"
                                           maxlength="16"
                                           required>
                                    @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="email" class="form-label fw-bold text-primary">
                                        <i class="bx bx-envelope me-1"></i>Email <span class="text-danger">*</span>
                                    </label>
                                    <input type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           id="email"
                                           name="email"
                                           value="{{ old('email', $penduduk->email) }}"
                                           placeholder="Masukkan email"
                                           required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="jenis_kelamin" class="form-label fw-bold text-primary">
                                        <i class="bx bx-male-female me-1"></i>Jenis Kelamin <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                            id="jenis_kelamin"
                                            name="jenis_kelamin"
                                            required>
                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                        @foreach(\App\Enums\JenisKelamin::cases() as $jenisKelamin)
                                            <option value="{{ $jenisKelamin->value }}"
                                                    {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == $jenisKelamin->value ? 'selected' : '' }}>
                                                {{ $jenisKelamin->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="tempat_lahir" class="form-label fw-bold text-primary">
                                        <i class="bx bx-map-pin me-1"></i>Tempat Lahir <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('tempat_lahir') is-invalid @enderror"
                                           id="tempat_lahir"
                                           name="tempat_lahir"
                                           value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}"
                                           placeholder="Masukkan tempat lahir"
                                           maxlength="100"
                                           required>
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="tanggal_lahir" class="form-label fw-bold text-primary">
                                        <i class="bx bx-calendar me-1"></i>Tanggal Lahir <span class="text-danger">*</span>
                                    </label>
                                    <input type="date"
                                           class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                           id="tanggal_lahir"
                                           name="tanggal_lahir"
                                           value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir) }}"
                                           required>
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="agama" class="form-label fw-bold text-primary">
                                        <i class="bx bx-church me-1"></i>Agama <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('agama') is-invalid @enderror"
                                            id="agama"
                                            name="agama"
                                            required>
                                        <option value="" selected disabled>Pilih Agama</option>
                                        @foreach(\App\Enums\Agama::cases() as $agama)
                                            <option value="{{ $agama->value }}"
                                                    {{ old('agama', $penduduk->agama) == $agama->value ? 'selected' : '' }}>
                                                {{ $agama->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('agama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="status_kawin" class="form-label fw-bold text-primary">
                                        <i class="bx bx-heart me-1"></i>Status Perkawinan <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('status_kawin') is-invalid @enderror"
                                            id="status_kawin"
                                            name="status_kawin"
                                            required>
                                        <option value="" selected disabled>Pilih Status Perkawinan</option>
                                        @foreach(\App\Enums\StatusKawin::cases() as $statusKawin)
                                            <option value="{{ $statusKawin->value }}"
                                                    {{ old('status_kawin', $penduduk->status_kawin) == $statusKawin->value ? 'selected' : '' }}>
                                                {{ $statusKawin->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status_kawin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="warga_negara" class="form-label fw-bold text-primary">
                                        <i class="bx bx-flag me-1"></i>Warga Negara <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('warga_negara') is-invalid @enderror"
                                           id="warga_negara"
                                           name="warga_negara"
                                           value="{{ old('warga_negara', $penduduk->warga_negara) }}"
                                           placeholder="Masukkan kewarganegaraan"
                                           maxlength="50"
                                           required>
                                    @error('warga_negara')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4 mt-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2"><i class="bx bx-buildings me-1"></i>Pendidikan & Pekerjaan</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="pendidikan_terakhir" class="form-label fw-bold text-primary">
                                        <i class="bx bx-book-open me-1"></i>Pendidikan Terakhir <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('pendidikan_terakhir') is-invalid @enderror"
                                            id="pendidikan_terakhir"
                                            name="pendidikan_terakhir"
                                            required>
                                        <option value="" selected disabled>Pilih Pendidikan Terakhir</option>
                                        @foreach(\App\Enums\Pendidikan::cases() as $pendidikan)
                                            <option value="{{ $pendidikan->value }}"
                                                    {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == $pendidikan->value ? 'selected' : '' }}>
                                                {{ $pendidikan->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pendidikan_terakhir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="pekerjaan" class="form-label fw-bold text-primary">
                                        <i class="bx bx-briefcase me-1"></i>Pekerjaan <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('pekerjaan') is-invalid @enderror"
                                           id="pekerjaan"
                                           name="pekerjaan"
                                           value="{{ old('pekerjaan', $penduduk->pekerjaan) }}"
                                           placeholder="Masukkan pekerjaan"
                                           maxlength="100"
                                           required>
                                    @error('pekerjaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4 mt-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2"><i class="bx bx-home me-1"></i>Alamat</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="alamat_sekarang" class="form-label fw-bold text-primary">
                                        <i class="bx bx-map me-1"></i>Alamat Sekarang <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control @error('alamat_sekarang') is-invalid @enderror"
                                              id="alamat_sekarang"
                                              name="alamat_sekarang"
                                              rows="3"
                                              placeholder="Masukkan alamat sekarang"
                                              maxlength="200"
                                              required>{{ old('alamat_sekarang', $penduduk->alamat_sekarang) }}</textarea>
                                    @error('alamat_sekarang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="alamat_sebelumnya" class="form-label fw-bold text-primary">
                                        <i class="bx bx-map-alt me-1"></i>Alamat Sebelumnya
                                    </label>
                                    <textarea class="form-control @error('alamat_sebelumnya') is-invalid @enderror"
                                              id="alamat_sebelumnya"
                                              name="alamat_sebelumnya"
                                              rows="3"
                                              placeholder="Masukkan alamat sebelumnya (jika ada)"
                                              maxlength="200">{{ old('alamat_sebelumnya', $penduduk->alamat_sebelumnya) }}</textarea>
                                    @error('alamat_sebelumnya')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4 mt-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2"><i class="bx bx-group me-1"></i>Data Orang Tua</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nama_ayah" class="form-label fw-bold text-primary">
                                        <i class="bx bx-male me-1"></i>Nama Ayah <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('nama_ayah') is-invalid @enderror"
                                           id="nama_ayah"
                                           name="nama_ayah"
                                           value="{{ old('nama_ayah', $penduduk->nama_ayah) }}"
                                           placeholder="Masukkan nama ayah"
                                           maxlength="100"
                                           required>
                                    @error('nama_ayah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="ayah_nik" class="form-label fw-bold text-primary">
                                        <i class="bx bx-id-card me-1"></i>NIK Ayah
                                    </label>
                                    <input type="text"
                                           class="form-control @error('ayah_nik') is-invalid @enderror"
                                           id="ayah_nik"
                                           name="ayah_nik"
                                           value="{{ old('ayah_nik', $penduduk->ayah_nik) }}"
                                           placeholder="Masukkan NIK ayah (jika ada)"
                                           maxlength="16">
                                    @error('ayah_nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nama_ibu" class="form-label fw-bold text-primary">
                                        <i class="bx bx-female me-1"></i>Nama Ibu <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('nama_ibu') is-invalid @enderror"
                                           id="nama_ibu"
                                           name="nama_ibu"
                                           value="{{ old('nama_ibu', $penduduk->nama_ibu) }}"
                                           placeholder="Masukkan nama ibu"
                                           maxlength="100"
                                           required>
                                    @error('nama_ibu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="ibu_nik" class="form-label fw-bold text-primary">
                                        <i class="bx bx-id-card me-1"></i>NIK Ibu
                                    </label>
                                    <input type="text"
                                           class="form-control @error('ibu_nik') is-invalid @enderror"
                                           id="ibu_nik"
                                           name="ibu_nik"
                                           value="{{ old('ibu_nik', $penduduk->ibu_nik) }}"
                                           placeholder="Masukkan NIK ibu (jika ada)"
                                           maxlength="16">
                                    @error('ibu_nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4 mt-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2"><i class="bx bx-detail me-1"></i>Informasi Tambahan</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="hubungan_warga" class="form-label fw-bold text-primary">
                                        <i class="bx bx-link me-1"></i>Hubungan Warga <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('hubungan_warga') is-invalid @enderror"
                                            id="hubungan_warga"
                                            name="hubungan_warga"
                                            required>
                                        <option value="" selected disabled>Pilih Hubungan Warga</option>
                                        @foreach(\App\Enums\HubunganWarga::cases() as $hubunganWarga)
                                            <option value="{{ $hubunganWarga->value }}"
                                                    {{ old('hubungan_warga', $penduduk->hubungan_warga) == $hubunganWarga->value ? 'selected' : '' }}>
                                                {{ $hubunganWarga->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('hubungan_warga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="no_kk_sebelumnya" class="form-label fw-bold text-primary">
                                        <i class="bx bx-file me-1"></i>No. KK Sebelumnya
                                    </label>
                                    <input type="text"
                                           class="form-control @error('no_kk_sebelumnya') is-invalid @enderror"
                                           id="no_kk_sebelumnya"
                                           name="no_kk_sebelumnya"
                                           value="{{ old('no_kk_sebelumnya', $penduduk->no_kk_sebelumnya) }}"
                                           placeholder="Masukkan nomor KK sebelumnya (jika ada)"
                                           maxlength="30">
                                    @error('no_kk_sebelumnya')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="golongan_darah" class="form-label fw-bold text-primary">
                                        <i class="bx bx-donate-blood me-1"></i>Golongan Darah <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('golongan_darah') is-invalid @enderror"
                                            id="golongan_darah"
                                            name="golongan_darah"
                                            required>
                                        <option value="" selected disabled>Pilih Golongan Darah</option>
                                        @foreach(\App\Enums\GolonganDarah::cases() as $golonganDarah)
                                            <option value="{{ $golonganDarah->value }}"
                                                    {{ old('golongan_darah', $penduduk->golongan_darah) == $golonganDarah->value ? 'selected' : '' }}>
                                                {{ $golonganDarah->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('golongan_darah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-8 mb-3">
                                <div class="form-group">
                                    <label for="suku" class="form-label fw-bold text-primary">
                                        <i class="bx bx-user-voice me-1"></i>Suku <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('suku') is-invalid @enderror"
                                            id="suku"
                                            name="suku"
                                            required>
                                        <option value="" selected disabled>Pilih Suku</option>
                                        @foreach(\App\Enums\Suku::cases() as $suku)
                                            <option value="{{ $suku->value }}"
                                                    {{ old('suku', $penduduk->suku) == $suku->value ? 'selected' : '' }}>
                                                {{ $suku->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('suku')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4 mt-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2"><i class="bx bx-id-card me-1"></i>Informasi KTP</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label fw-bold text-primary">
                                        <i class="bx bx-check-square me-1"></i>KTP Elektronik <span class="text-danger">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" 
                                                   type="radio" 
                                                   name="ktp_el" 
                                                   id="ktp_el_1" 
                                                   value="1" 
                                                   {{ old('ktp_el', $penduduk->ktp_el) == '1' ? 'checked' : '' }} 
                                                   required>
                                            <label class="form-check-label" for="ktp_el_1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" 
                                                   type="radio" 
                                                   name="ktp_el" 
                                                   id="ktp_el_0" 
                                                   value="0" 
                                                   {{ old('ktp_el', $penduduk->ktp_el) == '0' ? 'checked' : '' }} 
                                                   required>
                                            <label class="form-check-label" for="ktp_el_0">Tidak</label>
                                        </div>
                                    </div>
                                    @error('ktp_el')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-8 mb-3">
                                <div class="form-group">
                                    <label for="status_rekam" class="form-label fw-bold text-primary">
                                        <i class="bx bx-fingerprint me-1"></i>Status Rekam <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('status_rekam') is-invalid @enderror"
                                            id="status_rekam"
                                            name="status_rekam"
                                            required>
                                        <option value="" selected disabled>Pilih Status Rekam</option>
                                        @foreach(\App\Enums\StatusRekam::cases() as $statusRekam)
                                            <option value="{{ $statusRekam->value }}"
                                                    {{ old('status_rekam', $penduduk->status_rekam) == $statusRekam->value ? 'selected' : '' }}>
                                                {{ $statusRekam->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status_rekam')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="tempat_cetak_ktp" class="form-label fw-bold text-primary">
                                        <i class="bx bx-printer me-1"></i>Tempat Cetak KTP
                                    </label>
                                    <input type="text"
                                           class="form-control @error('tempat_cetak_ktp') is-invalid @enderror"
                                           id="tempat_cetak_ktp"
                                           name="tempat_cetak_ktp"
                                           value="{{ old('tempat_cetak_ktp', $penduduk->tempat_cetak_ktp) }}"
                                           placeholder="Masukkan tempat cetak KTP (jika ada)"
                                           maxlength="100">
                                    @error('tempat_cetak_ktp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="tanggal_cetak_ktp" class="form-label fw-bold text-primary">
                                        <i class="bx bx-calendar-event me-1"></i>Tanggal Cetak KTP
                                    </label>
                                    <input type="date"
                                           class="form-control @error('tanggal_cetak_ktp') is-invalid @enderror"
                                           id="tanggal_cetak_ktp"
                                           name="tanggal_cetak_ktp"
                                           value="{{ old('tanggal_cetak_ktp', $penduduk->tanggal_cetak_ktp) }}">
                                    @error('tanggal_cetak_ktp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="status_keadaan" class="form-label fw-bold text-primary">
                                            <i class="bx bx-health me-1"></i>Status Keadaan <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select @error('status_keadaan') is-invalid @enderror"
                                                id="status_keadaan"
                                                name="status_keadaan"
                                                required>
                                            <option value="" selected disabled>Pilih Status Keadaan</option>
                                            @foreach(\App\Enums\StatusKeadaan::cases() as $statusKeadaan)
                                                <option value="{{ $statusKeadaan->value }}"
                                                        {{ old('status_keadaan', $penduduk->status_keadaan) == $statusKeadaan->value ? 'selected' : '' }}>
                                                    {{ $statusKeadaan->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('status_keadaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="note" class="form-label fw-bold text-primary">
                                            <i class="bx bx-note me-1"></i>Catatan
                                        </label>
                                        <textarea class="form-control @error('note') is-invalid @enderror"
                                                  id="note"
                                                  name="note"
                                                  rows="3"
                                                  placeholder="Masukkan catatan (jika ada)">{{ old('note', $penduduk->note) }}</textarea>
                                        @error('note')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('penduduk.index') }}" class="btn btn-secondary">
                                    <i class="bx bx-arrow-back me-1"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-save me-1"></i> Simpan Perubahan
                                </button>
                            </div>
                            </form>
                            </div>
                            </div>
                            </div>
                            @endsection
                            
                            @section('script')
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                            <script src="{{ URL::asset('build/js/app.js') }}"></script>
                            
                            <script>
                            $(document).ready(function() {
                                // Default tanggal hari ini untuk tanggal lahir
                                var today = new Date().toISOString().split('T')[0];
                                // Jika tanggal lahir belum diisi, default ke 18 tahun yang lalu
                                if (!$('#tanggal_lahir').val()) {
                                    var defaultDate = new Date();
                                    defaultDate.setFullYear(defaultDate.getFullYear() - 18);
                                    $('#tanggal_lahir').val(defaultDate.toISOString().split('T')[0]);
                                }
                            });
                            </script>
                            @endsection
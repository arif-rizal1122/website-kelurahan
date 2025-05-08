@extends('layouts.master')
@section('title')
    Edit Pengajuan Surat
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Surat
        @endslot
        @slot('title')
            Edit Pengajuan Surat
        @endslot
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-info text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-edit font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">Form Edit Pengajuan Surat</h4>
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

                    <form action="{{ route('pengajuan-surat.update', $pengajuanSurat->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="warga_id" class="form-label fw-bold text-info">
                                <i class="bx bx-user me-1"></i>Warga <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select2 @error('warga_id') is-invalid @enderror"
                                id="warga_id"
                                name="warga_id"
                                required>
                                <option value="">Pilih Warga</option>
                                @foreach ($wargas as $warga)
                                    <option value="{{ $warga->id }}" {{ old('warga_id', $pengajuanSurat->warga_id) == $warga->id ? 'selected' : '' }}>
                                        {{ $warga->nama }} - {{ $warga->nik }}
                                    </option>
                                @endforeach
                            </select>
                            @error('warga_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jenis_surat_id" class="form-label fw-bold text-info">
                                <i class="bx bx-file me-1"></i>Jenis Surat <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select2 @error('jenis_surat_id') is-invalid @enderror"
                                id="jenis_surat_id"
                                name="jenis_surat_id"
                                required>
                                <option value="">Pilih Jenis Surat</option>
                                @foreach ($jenisSurats as $jenisSurat)
                                    <option value="{{ $jenisSurat->id }}" {{ old('jenis_surat_id', $pengajuanSurat->jenis_surat_id) == $jenisSurat->id ? 'selected' : '' }}>
                                        {{ $jenisSurat->nama }}
                                    </option>
                                @endforeach
                        </select>
                            @error('jenis_surat_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_pengajuan" class="form-label fw-bold text-info">
                                <i class="bx bx-calendar me-1"></i>Tanggal Pengajuan
                            </label>
                            <input type="date"
                                class="form-control @error('tanggal_pengajuan') is-invalid @enderror"
                                id="tanggal_pengajuan"
                                name="tanggal_pengajuan"
                                value="{{ old('tanggal_pengajuan', $pengajuanSurat->tanggal_pengajuan ? $pengajuanSurat->tanggal_pengajuan->toDateString() : null) }}">
                            @error('tanggal_pengajuan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Field-field Keterangan untuk Update --}}
                        <div class="mt-4">
                            <h5>Edit Keterangan Tambahan</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="apa" class="form-label">Apa</label>
                                        <textarea class="form-control @error('apa') is-invalid @enderror" id="apa" name="apa">{{ old('apa', $pengajuanSurat->keterangan->apa ?? '') }}</textarea>
                                        @error('apa')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="mengapa" class="form-label">Mengapa</label>
                                        <textarea class="form-control @error('mengapa') is-invalid @enderror" id="mengapa" name="mengapa">{{ old('mengapa', $pengajuanSurat->keterangan->mengapa ?? '') }}</textarea>
                                        @error('mengapa')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="kapan" class="form-label">Kapan</label>
                                        <input type="text" class="form-control @error('kapan') is-invalid @enderror" id="kapan" name="kapan"
                                               value="{{ old('kapan', $pengajuanSurat->keterangan->kapan ? \Carbon\Carbon::parse($pengajuanSurat->keterangan->kapan)->format('Y-m-d') : '') }}">
                                        @error('kapan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="di_mana" class="form-label">Di Mana</label>
                                        <textarea class="form-control @error('di_mana') is-invalid @enderror" id="di_mana" name="di_mana">{{ old('di_mana', $pengajuanSurat->keterangan->di_mana ?? '') }}</textarea>
                                        @error('di_mana')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="siapa" class="form-label">Siapa</label>
                                        <textarea class="form-control @error('siapa') is-invalid @enderror" id="siapa" name="siapa">{{ old('siapa', $pengajuanSurat->keterangan->siapa ?? '') }}</textarea>
                                        @error('siapa')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="bagaimana" class="form-label">Bagaimana</label>
                                        <textarea class="form-control @error('bagaimana') is-invalid @enderror" id="bagaimana" name="bagaimana">{{ old('bagaimana', $pengajuanSurat->keterangan->bagaimana ?? '') }}</textarea>
                                        @error('bagaimana')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label for="file_pendukung" class="form-label fw-bold text-info">
                                <i class="bx bx-upload me-1"></i>File Pendukung (PDF, DOC, DOCX, Max: 2MB)
                            </label>
                            <input type="file"
                                class="form-control @error('file_pendukung') is-invalid @enderror"
                                id="file_pendukung"
                                name="file_pendukung"
                                accept=".pdf,.doc,.docx">
                            @if ($pengajuanSurat->file_pendukung)
                                <small class="text-muted">File saat ini: <a href="{{ asset('storage/' . $pengajuanSurat->file_pendukung) }}" target="_blank">Lihat File</a></small>
                            @endif
                            @error('file_pendukung')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="status_pengajuan" class="form-label fw-bold text-info">
                                <i class="bx bx-label me-1"></i>Status <span class="text-danger">*</span>
                            </label>
                            <select class="form-control @error('status') is-invalid @enderror"
                                id="status_pengajuan"
                                name="status"
                                required>
                                <option value="">Pilih Status</option>
                                @foreach (\App\Enums\Status::cases() as $status)
                                    <option value="{{ $status->value }}" {{ old('status', $pengajuanSurat->status?->value) == $status->value ? 'selected' : '' }}>
                                        {{ $status->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="user_id" class="form-label fw-bold text-info">
                                <i class="bx bx-user-check me-1"></i>User yang Memproses
                            </label>
                            <select class="form-control select2 @error('user_id') is-invalid @enderror"
                                id="user_id"
                                name="user_id">
                                <option value="">Pilih User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id', $pengajuanSurat->user_id) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_diproses" class="form-label fw-bold text-info">
                                <i class="bx bx-calendar-check me-1"></i>Tanggal Diproses
                            </label>
                            <input type="date"
                                class="form-control @error('tanggal_diproses') is-invalid @enderror"
                                id="tanggal_diproses"
                                name="tanggal_diproses"
                                value="{{ old('tanggal_diproses', $pengajuanSurat->tanggal_diproses ? $pengajuanSurat->tanggal_diproses->toDateString() : null) }}">
                            @error('tanggal_diproses')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_selesai" class="form-label fw-bold text-info">
                                <i class="bx bx-calendar-check me-1"></i>Tanggal Selesai
                            </label>
                            <input type="date"
                                class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                id="tanggal_selesai"
                                name="tanggal_selesai"
                                value="{{ old('tanggal_selesai', $pengajuanSurat->tanggal_selesai ? $pengajuanSurat->tanggal_selesai->toDateString() : null) }}">
                            @error('tanggal_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="keterangan_penolakan" class="form-label fw-bold text-info">
                                <i class="bx bx-message-alt-error me-1"></i>Keterangan Penolakan
                            </label>
                            <textarea class="form-control @error('keterangan_penolakan') is-invalid @enderror"
                                id="keterangan_penolakan"
                                name="keterangan_penolakan"
                                rows="3"
                                placeholder="Alasan penolakan (jika ditolak)">{{ old('keterangan_penolakan', $pengajuanSurat->keterangan_penolakan) }}</textarea>
                            @error('keterangan_penolakan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex flex-wrap justify-content-between align-items-center mt-4 gap-2">
                            <a href="{{ route('pengajuan-surat.index') }}" class="btn btn-sm btn-secondary flex-grow-1 flex-md-grow-0">
                                <i class="bx bx-arrow-back me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-sm btn-primary flex-grow-1 flex-md-grow-0">
                                <i class="bx bx-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
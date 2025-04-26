@extends('layouts.master')
 @section('title')
     Tambah Pengajuan Surat
 @endsection
 @section('css')
     <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
     <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
     <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
 @endsection
 @section('content')
     @component('components.breadcrumb')
         @slot('li_1')
             Pengajuan Surat
         @endslot
         @slot('title')
             Tambah Pengajuan Surat
         @endslot
     @endcomponent

     <div class="row justify-content-center">
         <div class="col-lg-10">
             <div class="card shadow-lg border-0">
                 <div class="card-header bg-success text-white">
                     <div class="d-flex align-items-center">
                         <i class="bx bx-envelope-open font-size-24 me-2"></i>
                         <h4 class="card-title mb-0">Form Tambah Pengajuan Surat</h4>
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

                     <form action="{{ route('pengajuan-surat.store') }}" method="POST" enctype="multipart/form-data">
                         @csrf

                         <div class="mb-3">
                             <div class="form-group">
                                 <label for="warga_id" class="form-label fw-bold text-success">
                                     <i class="bx bx-user me-1"></i>Warga <span class="text-danger">*</span>
                                 </label>
                                 <select class="form-control @error('warga_id') is-invalid @enderror"
                                     id="warga_id"
                                     name="warga_id"
                                     required>
                                     <option value="">Pilih Warga</option>
                                     @foreach (\App\Models\Warga::all() as $warga)
                                         <option value="{{ $warga->id }}" {{ old('warga_id') == $warga->id ? 'selected' : '' }}>
                                             {{ $warga->nama }}
                                         </option>
                                     @endforeach
                                 </select>
                                 @error('warga_id')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                             </div>
                         </div>

                         <div class="mb-3">
                             <div class="form-group">
                                 <label for="jenis_surat_id" class="form-label fw-bold text-success">
                                     <i class="bx bx-file me-1"></i>Jenis Surat <span class="text-danger">*</span>
                                 </label>
                                 <select class="form-control @error('jenis_surat_id') is-invalid @enderror"
                                     id="jenis_surat_id"
                                     name="jenis_surat_id"
                                     required>
                                     <option value="">Pilih Jenis Surat</option>
                                     @foreach (\App\Models\JenisSurat::all() as $jenisSurat)
                                         <option value="{{ $jenisSurat->id }}" {{ old('jenis_surat_id') == $jenisSurat->id ? 'selected' : '' }}>
                                             {{ $jenisSurat->nama }}
                                         </option>
                                     @endforeach
                                 </select>
                                 @error('jenis_surat_id')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                             </div>
                         </div>

                         <div class="mb-3">
                             <div class="form-group">
                                 <label for="tanggal_pengajuan" class="form-label fw-bold text-success">
                                     <i class="bx bx-calendar me-1"></i>Tanggal Pengajuan
                                 </label>
                                 <input type="date"
                                     class="form-control @error('tanggal_pengajuan') is-invalid @enderror"
                                     id="tanggal_pengajuan"
                                     name="tanggal_pengajuan"
                                     value="{{ old('tanggal_pengajuan') }}">
                                 @error('tanggal_pengajuan')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                             </div>
                         </div>

                         <div class="mb-3">
                             <div class="form-group">
                                 <label for="keperluan" class="form-label fw-bold text-success">
                                     <i class="bx bx-note me-1"></i>Keperluan
                                 </label>
                                 <textarea class="form-control @error('keperluan') is-invalid @enderror"
                                     id="keperluan"
                                     name="keperluan"
                                     rows="3"
                                     placeholder="Masukkan keperluan">{{ old('keperluan') }}</textarea>
                                 @error('keperluan')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                             </div>
                         </div>

                         <div class="mb-3">
                             <div class="form-group">
                                 <label for="status" class="form-label fw-bold text-success">
                                     <i class="bx bx-label me-1"></i>Status <span class="text-danger">*</span>
                                 </label>
                                 <select class="form-control @error('status') is-invalid @enderror"
                                     id="status"
                                     name="status"
                                     required>
                                     <option value="">Pilih Status</option>
                                     @foreach (\App\Enums\Status::cases() as $statusOption)
                                         <option value="{{ $statusOption->value }}" {{ old('status') == $statusOption->value ? 'selected' : '' }}>
                                             {{ $statusOption->name }}
                                         </option>
                                     @endforeach
                                 </select>
                                 @error('status')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                             </div>
                         </div>

                         <div class="mb-3">
                             <div class="form-group">
                                 <label for="tanggal_diproses" class="form-label fw-bold text-success">
                                     <i class="bx bx-calendar-check me-1"></i>Tanggal Diproses
                                 </label>
                                 <input type="date"
                                     class="form-control @error('tanggal_diproses') is-invalid @enderror"
                                     id="tanggal_diproses"
                                     name="tanggal_diproses"
                                     value="{{ old('tanggal_diproses') }}">
                                 @error('tanggal_diproses')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                             </div>
                         </div>

                         <div class="mb-3">
                             <div class="form-group">
                                 <label for="user_id" class="form-label fw-bold text-success">
                                     <i class="bx bx-user-check me-1"></i>Petugas yang Memproses
                                 </label>
                                 <select class="form-control @error('user_id') is-invalid @enderror"
                                     id="user_id"
                                     name="user_id">
                                     <option value="">Pilih Petugas</option>
                                     @foreach (\App\Models\User::all() as $user)
                                         <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                             {{ $user->name }}
                                         </option>
                                     @endforeach
                                 </select>
                                 @error('user_id')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                             </div>
                         </div>

                         <div class="mb-3">
                             <div class="form-group">
                                 <label for="tanggal_selesai" class="form-label fw-bold text-success">
                                     <i class="bx bx-calendar-x me-1"></i>Tanggal Selesai
                                 </label>
                                 <input type="date"
                                     class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                     id="tanggal_selesai"
                                     name="tanggal_selesai"
                                     value="{{ old('tanggal_selesai') }}">
                                 @error('tanggal_selesai')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                             </div>
                         </div>

                         <div class="mb-3">
                             <div class="form-group">
                                 <label for="keterangan_penolakan" class="form-label fw-bold text-success">
                                     <i class="bx bx-message-error me-1"></i>Keterangan Penolakan
                                 </label>
                                 <textarea class="form-control @error('keterangan_penolakan') is-invalid @enderror"
                                     id="keterangan_penolakan"
                                     name="keterangan_penolakan"
                                     rows="3"
                                     placeholder="Masukkan keterangan penolakan (jika ada)">{{ old('keterangan_penolakan') }}</textarea>
                                 @error('keterangan_penolakan')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                             </div>
                         </div>

                         <div class="mb-4">
                             <div class="form-group">
                                 <label for="file_pendukung" class="form-label fw-bold text-success">
                                     <i class="bx bx-file-plus me-1"></i>File Pendukung
                                 </label>
                                 <div class="card shadow-none border">
                                     <div class="card-body">
                                         <div class="dropzone-wrapper">
                                             <div class="dropzone-desc">
                                                 <i class="bx bx-upload font-size-24 mb-2 d-block text-muted"></i>
                                                 <p class="text-muted mb-1">Klik atau seret file ke sini untuk mengunggah</p>
                                                 <p class="small text-muted mb-0">Format file yang diizinkan: PDF, DOC, DOCX (Maks:
                                                     2MB)</p>
                                             </div>
                                             <input type="file"
                                                 class="form-control dropzone-input"
                                                 id="file_pendukung"
                                                 name="file_pendukung"
                                                 accept=".pdf,.doc,.docx">
                                         </div>
                                         @error('file_pendukung')
                                             <div class="text-danger small mt-2">{{ $message }}</div>
                                         @enderror
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="d-flex flex-wrap justify-content-between align-items-center mt-4 gap-2">
                             <a href="{{ route('pengajuan-surat.index') }}"
                                 class="btn btn-sm btn-secondary flex-grow-1 flex-md-grow-0">
                                 <i class="bx bx-arrow-back me-1"></i> Kembali
                             </a>
                             <button type="submit" class="btn btn-sm btn-primary flex-grow-1 flex-md-grow-0">
                                 <i class="bx bx-save me-1"></i> Simpan
                             </button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 @endsection

 @section('script')
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

     <script>
         $(document).ready(function() {
             $("#datatable").DataTable({
                 language: {
                     url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
                 },
             });
         });
     </script>
 @endsection
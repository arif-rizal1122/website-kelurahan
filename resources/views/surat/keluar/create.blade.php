@extends('layouts.master')
@section('title') Tambah Surat Keluar @endsection
@section('css')
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Surat @endslot
        @slot('title') Tambah Surat Keluar @endslot
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-envelope font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">Form Surat Keluar</h4>
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

                    <form action="{{ route('surat-keluar.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nomor_surat" class="form-label fw-bold text-primary">
                                        <i class="bx bx-hash me-1"></i>Nomor Surat <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('nomor_surat') is-invalid @enderror" 
                                           id="nomor_surat" 
                                           name="nomor_surat" 
                                           value="{{ old('nomor_surat') }}" 
                                           placeholder="Masukkan nomor surat" 
                                           maxlength="35"
                                           required>
                                    @error('nomor_surat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="tanggal_surat" class="form-label fw-bold text-primary">
                                        <i class="bx bx-calendar me-1"></i>Tanggal Surat <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" 
                                           class="form-control @error('tanggal_surat') is-invalid @enderror" 
                                           id="tanggal_surat" 
                                           name="tanggal_surat" 
                                           value="{{ old('tanggal_surat') }}" 
                                           required>
                                    @error('tanggal_surat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="dari" class="form-label fw-bold text-primary">
                                        <i class="bx bx-user-voice me-1"></i>Dari <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('dari') is-invalid @enderror" 
                                           id="dari" 
                                           name="dari" 
                                           value="{{ old('dari') }}" 
                                           placeholder="Masukkan pengirim surat"
                                           required>
                                    @error('dari')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="tujuan" class="form-label fw-bold text-primary">
                                        <i class="bx bx-target-lock me-1"></i>Tujuan <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('tujuan') is-invalid @enderror" 
                                           id="tujuan" 
                                           name="tujuan" 
                                           value="{{ old('tujuan') }}" 
                                           placeholder="Masukkan tujuan surat"
                                           required>
                                    @error('tujuan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="tanggal_pengiriman" class="form-label fw-bold text-primary">
                                    <i class="bx bx-send me-1"></i>Tanggal Pengiriman <span class="text-danger">*</span>
                                </label>
                                <input type="date" 
                                       class="form-control @error('tanggal_pengiriman') is-invalid @enderror" 
                                       id="tanggal_pengiriman" 
                                       name="tanggal_pengiriman" 
                                       value="{{ old('tanggal_pengiriman') }}" 
                                       required>
                                @error('tanggal_pengiriman')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="isi_surat" class="form-label fw-bold text-primary">
                                    <i class="bx bx-notepad me-1"></i>Isi Surat <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control @error('isi_surat') is-invalid @enderror" 
                                          id="isi_surat" 
                                          name="isi_surat" 
                                          rows="5" 
                                          placeholder="Masukkan isi surat"
                                          required>{{ old('isi_surat') }}</textarea>
                                @error('isi_surat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="catatan" class="form-label fw-bold text-primary">
                                    <i class="bx bx-comment-detail me-1"></i>Catatan <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control @error('catatan') is-invalid @enderror" 
                                          id="catatan" 
                                          name="catatan" 
                                          rows="3" 
                                          placeholder="Masukkan catatan surat"
                                          required>{{ old('catatan') }}</textarea>
                                @error('catatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-group">
                                <label for="attachments" class="form-label fw-bold text-primary">
                                    <i class="bx bx-paperclip me-1"></i>Lampiran
                                </label>
                                <div class="card shadow-none border">
                                    <div class="card-body">
                                        <div class="dropzone-wrapper">
                                            <div class="dropzone-desc">
                                                <i class="bx bx-upload font-size-24 mb-2 d-block text-muted"></i>
                                                <p class="text-muted mb-1">Klik atau seret file ke sini untuk mengunggah</p>
                                                <p class="small text-muted mb-0">Format file yang diizinkan: PDF (Maks: 2MB)</p>
                                            </div>
                                            <input type="file" 
                                                   class="form-control dropzone-input" 
                                                   id="attachments" 
                                                   name="attachments[]" 
                                                   accept="application/pdf"
                                                   multiple>
                                        </div>
                                        @error('attachments.*')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('surat-keluar.index') }}" class="btn btn-secondary">
                                <i class="bx bx-arrow-back me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-paper-plane me-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection




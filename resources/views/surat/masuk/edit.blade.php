@extends('layouts.master')
@section('title') @lang('translation.edit') Edit Surat Masuk @endsection
@section('css')
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Surat @endslot
        @slot('title') Edit Surat Masuk @endslot
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-warning text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-pencil font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">Form Edit Surat Masuk</h4>
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

                    <form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- Metode HTTP untuk update --}}

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nomor_surat" class="form-label fw-bold text-warning">
                                        <i class="bx bx-hash me-1"></i>Nomor Surat <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('nomor_surat') is-invalid @enderror"
                                           id="nomor_surat"
                                           name="nomor_surat"
                                           value="{{ old('nomor_surat', $surat->nomor_surat) }}" {{-- Menampilkan data lama --}}
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
                                    <label for="tanggal_surat" class="form-label fw-bold text-warning">
                                        <i class="bx bx-calendar me-1"></i>Tanggal Surat <span class="text-danger">*</span>
                                    </label>
                                    <input type="date"
                                           class="form-control @error('tanggal_surat') is-invalid @enderror"
                                           id="tanggal_surat"
                                           name="tanggal_surat"
                                           value="{{ old('tanggal_surat', $surat->tanggal_surat ? $surat->tanggal_surat->format('Y-m-d') : '') }}" {{-- Menampilkan data lama --}}
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
                                    <label for="dari" class="form-label fw-bold text-warning">
                                        <i class="bx bx-user-voice me-1"></i>Dari <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('dari') is-invalid @enderror"
                                           id="dari"
                                           name="dari"
                                           value="{{ old('dari', $surat->dari) }}" {{-- Menampilkan data lama --}}
                                           placeholder="Masukkan pengirim surat"
                                           required>
                                    @error('dari')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="tujuan" class="form-label fw-bold text-warning">
                                        <i class="bx bx-target-lock me-1"></i>Tujuan <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('tujuan') is-invalid @enderror"
                                           id="tujuan"
                                           name="tujuan"
                                           value="{{ old('tujuan', $surat->tujuan) }}" {{-- Menampilkan data lama --}}
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
                                <label for="tanggal_diterima" class="form-label fw-bold text-warning">
                                    <i class="bx bx-inbox me-1"></i>Tanggal Diterima <span class="text-danger">*</span>
                                </label>
                                <input type="date"
                                       class="form-control @error('tanggal_diterima') is-invalid @enderror"
                                       id="tanggal_diterima"
                                       name="tanggal_diterima"
                                       value="{{ old('tanggal_diterima', $surat->tanggal_diterima ? $surat->tanggal_diterima->format('Y-m-d') : '') }}" {{-- Menampilkan data lama --}}
                                       required>
                                @error('tanggal_diterima')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="ringkasan" class="form-label fw-bold text-warning">
                                    <i class="bx bx-notepad me-1"></i>Ringkasan <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control @error('ringkasan') is-invalid @enderror"
                                          id="ringkasan"
                                          name="ringkasan"
                                          rows="5"
                                          placeholder="Masukkan ringkasan surat"
                                          required>{{ old('ringkasan', $surat->ringkasan) }}</textarea> {{-- Menampilkan data lama --}}
                                @error('ringkasan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="catatan" class="form-label fw-bold text-warning">
                                    <i class="bx bx-comment-detail me-1"></i>Catatan
                                </label>
                                <textarea class="form-control @error('catatan') is-invalid @enderror"
                                          id="catatan"
                                          name="catatan"
                                          rows="3"
                                          placeholder="Masukkan catatan surat">{{ old('catatan', $surat->catatan) }}</textarea> {{-- Menampilkan data lama --}}
                                @error('catatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-group">
                                <label for="attachments" class="form-label fw-bold text-warning">
                                    <i class="bx bx-paperclip me-1"></i>Lampiran
                                </label>
                                <div class="card shadow-none border">
                                    <div class="card-body">
                                        <div class="dropzone-wrapper">
                                            <div class="dropzone-desc">
                                                <i class="bx bx-upload font-size-24 mb-2 d-block text-muted"></i>
                                                <p class="text-muted mb-1">Klik atau seret file ke sini untuk mengunggah</p>
                                                <p class="small text-muted mb-0">Format file yang diizinkan: PDF (Maks: 2MB)</p>
                                                @if ($surat->attachments->isNotEmpty())
                                            <p class="mt-2 text-muted">Lampiran saat ini:</p>
                                            <ul class="list-unstyled">
                                                @foreach ($surat->attachments as $attachment)
                                                    <li>
                                                        <a href="{{ asset('storage/' . $attachment->path) }}" target="_blank">
                                                            <i class="bx bxs-file-pdf bx-sm me-1"></i> {{ $attachment->filename }}
                                                        </a>
                                                        <div class="form-check form-switch d-inline ms-2">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="remove_attachment_{{ $attachment->id }}" name="removed_attachments[]" value="{{ $attachment->id }}">
                                                            <label class="form-check-label text-danger small" for="remove_attachment_{{ $attachment->id }}">Hapus</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
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
                            <a href="{{ route('surat-masuk.index') }}" class="btn btn-secondary">
                                <i class="bx bx-arrow-back me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bx bx-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
<style>
    .dropzone-wrapper {
        border: 2px dashed #ccc;
        color: #777;
        position: relative;
        min-height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .dropzone-desc {
        position: absolute;
        text-align: center;
        width: 100%;
        transition: all .2s ease;
    }

    .dropzone-input {
        position: absolute;
        opacity: 0;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .dropzone-wrapper:hover {
        border-color: #ffc107; /* Warna kuning untuk edit */
    }

    .font-size-24 {
        font-size: 24px !important;
    }
</style>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Preview filename ketika file dipilih
            $('input[type="file"]').change(function(e) {
                var files = e.target.files;
                if (files.length > 0) {
                    var fileList = '';
                    for (var i = 0; i < files.length; i++) {
                        fileList += '<p class="small mb-1 text-primary">' +
                                    '<i class="bx bxs-file-pdf me-1"></i>' +
                                    files[i].name + '</p>';
                    }
                    $('.dropzone-desc').html('<div class="text-center">' + fileList +
                                           '<p class="small text-muted mt-2">Klik lagi untuk mengganti file</p></div>');
                } else {
                    // Jika tidak ada file baru yang dipilih, kembalikan ke tampilan lampiran saat ini
                    if ($('#existing-attachments').length) {
                        var existingAttachmentsHtml = $('#existing-attachments').clone();
                        $('.dropzone-desc').html(existingAttachmentsHtml);
                    } else {
                        $('.dropzone-desc').html('<i class="bx bx-upload font-size-24 mb-2 d-block text-muted"></i><p class="text-muted mb-1">Klik atau seret file ke sini untuk mengunggah</p><p class="small text-muted mb-0">Format file yang diizinkan: PDF (Maks: 2MB)</p>');
                    }
                }
            });
        });
    </script>
@endsection

@section('script-bottom')
    <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
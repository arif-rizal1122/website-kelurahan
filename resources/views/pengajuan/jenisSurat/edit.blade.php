@extends('layouts.master')
@section('title')
    Edit Jenis Surat
@endsection
@section('css')
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
        type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Surat
        @endslot
        @slot('title')
            Edit Jenis Surat
        @endslot
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-warning text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-pencil font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">
                            Form Edit Jenis Surat
                        </h4>
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

                    <form action="{{ route('jenis-surat.update', $jenisSurat->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- Metode HTTP untuk update --}}

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="nama" class="form-label fw-bold text-warning">
                                    <i class="bx bx-file-alt me-1"></i>Nama Surat <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama"
                                    value="{{ old('nama', $jenisSurat->nama) }}"
                                    placeholder="Masukkan nama surat" maxlength="255" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="code" class="form-label fw-bold text-warning">
                                    <i class="bx bx-file-alt me-1"></i>code Surat <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                    class="form-control @error('code') is-invalid @enderror"
                                    id="code" name="code"
                                    value="{{ old('code', $jenisSurat->code) }}"
                                    placeholder="Masukkan code surat" maxlength="255" required>
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="deskripsi" class="form-label fw-bold text-warning">
                                    <i class="bx bx-notepad me-1"></i>Deskripsi
                                </label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                    name="deskripsi" rows="5" placeholder="Masukkan deskripsi">{{ old('deskripsi', $jenisSurat->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="template_surat" class="form-label fw-bold text-warning">
                                    <i class="bx bx-notepad me-1"></i>Template Surat
                                </label>
                                <textarea class="form-control @error('template_surat') is-invalid @enderror" id="template_surat"
                                    name="template_surat" rows="5" placeholder="Masukkan template_surat">{{ old('template_surat', $jenisSurat->template_surat) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex flex-wrap justify-content-between align-items-center mt-4 gap-2">
                            <a href="{{ route('jenis-surat.index') }}"
                                class="btn btn-sm btn-secondary flex-grow-1 flex-md-grow-0">
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
    <script src="https://cdn.ckeditor.com/ckeditor5/{{ env('CKEDITOR_VERSION', '39.0.1') }}/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            ClassicEditor
                .create(document.querySelector('#template_surat'), {
                    toolbar: {
                        items: [
                            'heading', '|',
                            'bold', 'italic', 'underline', 'strikethrough', '|',
                            'link', '|',
                            'bulletedList', 'numberedList', '|',
                            'outdent', 'indent', '|',
                            'blockQuote', '|',
                            'undo', 'redo'
                        ]
                    },
                    removePlugins: [
                        'CKFinder', 'EasyImage', 'SimpleUploadAdapter', 'Image', 'ImageCaption',
                        'ImageStyle', 'ImageToolbar', 'MediaEmbed', 'Table', 'TableToolbar',
                        'TableProperties', 'TableCellProperties'
                    ]
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
    <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
@endsection


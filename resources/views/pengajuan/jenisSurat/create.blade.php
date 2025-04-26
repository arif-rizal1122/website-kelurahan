@extends('layouts.master')
@section('title')
    Tambah Jenis Surat
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
            Tambah Jenis Surat
        @endslot
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-file-plus font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">
                            Form Jenis Surat
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

                    <form action="{{ route('jenis-surat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="nama" class="form-label fw-bold text-success">
                                    <i class="bx bx-file-alt me-1"></i>Nama Surat <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ old('nama') }}"
                                    placeholder="Masukkan nama surat" maxlength="255" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="deskripsi" class="form-label fw-bold text-success">
                                    <i class="bx bx-notepad me-1"></i>Deskripsi
                                </label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                    name="deskripsi" rows="5" placeholder="Masukkan deskripsi">{{ old('deskripsi') }}</textarea>
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
                                <i class="bx bx-save me-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
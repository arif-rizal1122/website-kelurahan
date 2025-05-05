@extends('layouts.master')
@section('title')
    Detail Jenis Surat
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Surat
        @endslot
        @slot('title')
            Detail Jenis Surat
        @endslot
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-file-text font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">
                            Detail Jenis Surat
                        </h4>
                    </div>
                </div>
                <div class="card-body p-4">

                    <div class="mb-4">

                        <div class="table-responsive">
                            <table class="table table-borderless table-hover">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-primary" style="width: 30%;">
                                            <i class="bx bx-file-alt me-2"></i>Nama Surat
                                        </td>
                                        <td class="text-primary">{{ $jenisSurat->nama ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-primary" style="width: 30%;">
                                            <i class="bx bx-file-alt me-2"></i>Code Surat
                                        </td>
                                        <td class="text-primary">{{ $jenisSurat->code ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-primary">
                                            <i class="bx bx-notepad me-2"></i>Deskripsi
                                        </td>
                                        <td class="text-primary">{{ $jenisSurat->deskripsi ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-primary">
                                            <i class="bx bx-notepad me-2"></i>Template Surat
                                        </td>
                                        <td class="text-primary">{{ $jenisSurat->template_surat ?? '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-4 align-items-center gy-2">
                        <div class="col-12 col-md-auto">
                            <a href="{{ route('jenis-surat.index') }}" class="btn btn-secondary w-100">
                                <i class="bx bx-arrow-back me-1"></i> Kembali
                            </a>
                        </div>
                        <div class="col-12 col-md d-flex justify-content-md-end gap-2 flex-wrap">
                        @if (Auth::user()->role === 'admin')
                            <a href="{{ route('jenis-surat.edit', $jenisSurat->id) }}" class="btn btn-warning">
                                <i class="bx bx-edit me-1"></i> Edit
                            </a>
                        </div>
                        @endif
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
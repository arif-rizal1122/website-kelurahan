// resources/views/pengajuan-surat/reject.blade.php
@extends('layouts.master')
@section('title')
    Tolak Pengajuan Surat
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Pengajuan Surat
        @endslot
        @slot('title')
            Tolak Pengajuan Surat
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Alasan Penolakan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengajuan-surat.storeRejection', $pengajuanSurat->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="keterangan_penolakan" class="form-label">Keterangan Penolakan <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('keterangan_penolakan') is-invalid @enderror" 
                                id="keterangan_penolakan" name="keterangan_penolakan" rows="4" 
                                placeholder="Jelaskan alasan penolakan pengajuan surat" required>{{ old('keterangan_penolakan') }}</textarea>
                            @error('keterangan_penolakan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-danger">
                                <i class="bx bx-x-circle me-1"></i> Tolak Pengajuan
                            </button>
                            <a href="{{ route('pengajuan-surat.index') }}" class="btn btn-light">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
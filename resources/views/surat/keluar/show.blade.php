@extends('layouts.master')
@section('title') @lang('translation.detail') Detail Surat Keluar @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Surat @endslot
        @slot('title') Detail Surat Keluar @endslot
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-envelope-open font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">Detail Surat Keluar</h4>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <div class="p-3 bg-light rounded mb-3">
                            <div class="d-flex justify-content-between">
                                <span class="badge bg-primary">No. {{ $surat->nomor_surat ?? '-' }}</span>
                                <span class="badge bg-info">Tujuan: {{ $surat->tujuan ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-borderless table-hover">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-primary" style="width: 30%;">
                                            <i class="bx bx-user-voice me-2"></i>Dari
                                        </td>
                                        <td class="text-dark">{{ $surat->dari ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-primary">
                                            <i class="bx bx-calendar me-2"></i>Tanggal Surat
                                        </td>
                                        <td class="text-dark">
                                            @if($surat->tanggal_surat)
                                                <span class="badge bg-soft-success text-success">
                                                    {{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d F Y') }}
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-primary">
                                            <i class="bx bx-send me-2"></i>Tanggal Pengiriman
                                        </td>
                                        <td class="text-dark">
                                            @if($surat->tanggal_pengiriman)
                                                <span class="badge bg-soft-info text-info">
                                                    {{ \Carbon\Carbon::parse($surat->tanggal_pengiriman)->format('d F Y') }}
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bx bx-notepad me-2"></i>Isi Surat</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-muted" style="white-space: pre-line;">{{ $surat->isi_surat ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bx bx-comment-detail me-2"></i>Catatan</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-muted" style="white-space: pre-line;">{{ $surat->catatan ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    @if ($surat->attachments->isNotEmpty())
                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bx bx-paperclip me-2"></i>Lampiran</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($surat->attachments as $attachment)
                                    <div class="col-md-6 mb-2">
                                        <div class="p-2 border rounded d-flex align-items-center">
                                            <i class="bx bxs-file-pdf text-danger font-size-24 me-2"></i>
                                            <a href="{{ asset('storage/' . $attachment->path) }}"
                                               class="text-reset text-decoration-none stretched-link"
                                               target="_blank">
                                                {{ $attachment->filename }}
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('surat-keluar.index') }}" class="btn btn-secondary">
                            <i class="bx bx-arrow-back me-1"></i> Kembali
                        </a>
                        <div>
                            <a href="{{ route('surat-keluar.edit', $surat->id) }}" class="btn btn-warning me-2">
                                <i class="bx bx-edit me-1"></i> Edit
                            </a>
                            <button type="button" class="btn btn-primary" onclick="window.print()">
                                <i class="bx bx-printer me-1"></i> Cetak
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
<style>
    .bg-soft-success {
        background-color: rgba(10, 179, 156, 0.18) !important;
    }

    .bg-soft-info {
        background-color: rgba(41, 156, 219, 0.18) !important;
    }

    .font-size-24 {
        font-size: 24px !important;
    }

    @media print {
        .btn, .breadcrumb {
            display: none !important;
        }

        .card {
            border: none !important;
            box-shadow: none !important;
        }

        .card-header {
            background-color: #f8f9fa !important;
            color: #000 !important;
        }
    }
</style>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
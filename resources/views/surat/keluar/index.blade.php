@extends('layouts.master')
@section('title') @lang('translation.datatables') @endsection
@section('css')
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Tables @endslot
        @slot('title')Data Surat Keluar @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Data Surat Keluar</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSuratKeluarModal">
                            Tambah Surat Keluar
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nomor Surat</th>
                                    <th>Pengirim</th>
                                    <th>tujuan surat</th>
                                    <th>Tanggal Surat</th>
                                    <th>Tanggal Pengiriman</th>
                                    <th>Lampiran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surats as $surat)
                                    <tr>
                                        <td>{{ $surat->nomor_surat }}</td>
                                        <td>{{ $surat->dari }}</td>
                                        <td>{{ $surat->tujuan }}</td>
                                        <td>{{ $surat->tanggal_surat ? \Carbon\Carbon::parse($surat->tanggal_surat)->format('d-m-Y') : '-' }}</td>
                                        <td>{{ $surat->tanggal_pengiriman ? \Carbon\Carbon::parse($surat->tanggal_pengiriman)->format('d-m-Y') : '-' }}</td>
                                        <td>
                                            @if ($surat->attachments->isNotEmpty())
                                                @foreach ($surat->attachments as $attachment)
                                                    <a href="{{ asset('storage/' . $attachment->path) }}" target="_blank" style="color: #dc3545;">
                                                        <i class="bx bxs-file-pdf bx-sm"></i>
                                                    </a>
                                                @endforeach
                                            @else
                                                Tidak Ada Lampiran
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex flex-wrap gap-2">
                                                <a href="{{ route('surat-keluar.show', $surat->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                <button class="btn btn-sm btn-warning edit-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editSuratKeluarModal"
                                                    data-id="{{ $surat->id }}"
                                                    data-nomor_surat="{{ $surat->nomor_surat }}"
                                                    data-dari="{{ $surat->dari }}"
                                                    data-tujuan="{{ $surat->tujuan }}"
                                                    data-tanggal_surat="{{ $surat->tanggal_surat ? \Carbon\Carbon::parse($surat->tanggal_surat)->format('Y-m-d') : '' }}"
                                                    data-tanggal_pengiriman="{{ $surat->tanggal_pengiriman ? \Carbon\Carbon::parse($surat->tanggal_pengiriman)->format('Y-m-d') : '' }}"
                                                    data-catatan="{{ $surat->catatan }}"
                                                    data-isi_surat="{{ $surat->isi_surat }}"
                                                    data-attachments="{{ json_encode($surat->attachments) }}">
                                                    Edit
                                                </button>
                                                <form action="{{ route('surat-keluar.destroy', $surat->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-surat-keluar">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('surat.keluar.create')
    @include('surat.keluar.edit')

    <div id="hapus-surat-keluar" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="text-end">
                        <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="mt-2">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" style="width:100px;height:100px"></lord-icon>
                        <h4 class="mt-4">Anda yakin ingin menghapus surat keluar ini?</h4>
                        <p class="text-muted fs-15 mb-4">Data yang sudah dihapus tidak dapat dikembalikan.</p>
                        <div class="hstack gap-3 justify-content-center">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-danger btn-hapus-surat-keluar">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="{{ URL::asset('build/js/pages/datatables.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

@endsection

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if ($errors->hasAny(['nomor_surat', 'dari', 'isi_surat', 'tujuan', 'tanggal_surat', 'tanggal_pengiriman', 'catatan', 'attachments', 'removed_attachments']))
                var editModal = new bootstrap.Modal(document.getElementById('editSuratKeluarModal'));
                editModal.show();
            @endif
        });
    </script>
@endif
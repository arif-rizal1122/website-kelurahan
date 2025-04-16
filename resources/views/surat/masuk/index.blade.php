@extends('layouts.master')
@section('title') @lang('translation.datatables') @endsection
@section('css')
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!--datatable responsive css-->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Tables @endslot
@slot('title')Datatables @endslot
@endcomponent



<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Data Surat Masuk</h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSuratMasukModal">
                    Tambah Surat Masuk
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor Surat</th>
                            <th>Pengirim</th>
                            <th>Perihal</th>
                            <th>Tanggal Surat</th>
                            <th>Tanggal Diterima</th>
                            <th>Lampiran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suratMasuk as $surat)
                        <tr>
                            <td>{{ $surat->nomor_surat }}</td>
                            <td>{{ $surat->pengirim }}</td>
                            <td>{{ $surat->perihal }}</td>
                            <td>{{ $surat->tanggal_surat }}</td>
                            <td>{{ $surat->tanggal_diterima }}</td>
                            <td><a href="{{ asset('storage/' . $surat->lampiran) }}" target="_blank">Lihat</a></td>
                            <td>
                                <a href="{{ route('surat-masuk.show', $surat->id) }}" class="btn btn-info btn-sm">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>        
    </div>
</div>



<!-- Modal Tambah Surat Masuk -->
<div class="modal fade" id="createSuratMasukModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <form action="{{ route('surat-masuk.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Surat Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Nomor Surat</label>
                    <input type="text" name="nomor_surat" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Pengirim</label>
                    <input type="text" name="pengirim" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Perihal</label>
                    <input type="text" name="perihal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Tanggal Surat</label>
                    <input type="date" name="tanggal_surat" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Tanggal Diterima</label>
                    <input type="date" name="tanggal_diterima" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>File Lampiran</label>
                    <input type="file" name="lampiran" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>
    </div>
</div>


<!-- Modal Edit -->
@foreach ($classification->classificationDetails as $detail)
    <div class="modal fade" id="editModal{{ $detail->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $detail->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('classification-details.update', $detail->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $detail->id }}">Edit Detail Klasifikasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <x-input-form label="Kode Detail" name="code" value="{{ $detail->code }}" />
                        <x-input-form label="Deskripsi" name="description" value="{{ $detail->description }}" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endforeach



<!-- Modal Hapus -->
@foreach ($classification->classificationDetails as $detail)
    <div class="modal fade" id="deleteModal{{ $detail->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $detail->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('classification-details.destroy', $detail->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $detail->id }}">Hapus Detail Klasifikasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin ingin menghapus detail <strong>{{ $detail->code }} - {{ $detail->description }}</strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endforeach



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

<script>
    $(document).on('click', '.edit-btn', function () {
    const modal = $('#editPendudukModal');

    modal.find('#edit_id').val($(this).data('id'));
    modal.find('#edit_nik').val($(this).data('nik'));
    modal.find('#edit_nama').val($(this).data('nama'));
    modal.find('#edit_sex').val($(this).data('sex'));
    modal.find('#edit_tempatlahir').val($(this).data('tempatlahir'));
    modal.find('#edit_tanggallahir').val($(this).data('tanggallahir'));
    modal.find('#edit_alamat').val($(this).data('alamat'));
    modal.find('#edit_status').val($(this).data('status'));

    // Ganti action form ke URL update yang sesuai
    modal.find('#editPendudukForm').attr('action', $(this).data('url'));
});


</script>

@endsection
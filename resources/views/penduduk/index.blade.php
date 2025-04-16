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
            <div class="card-header">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Data Penduduk</h5>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPendudukModal">
                        Tambah Penduduk
                    </button>                    
                </div>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat Sekarang</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($penduduks as $penduduk)
                                <tr>
                                    <td>{{ $penduduk->nama }}</td>
                                    <td>{{ $penduduk->nik }}</td>
                                    <td>{{ $penduduk->sex }}</td>
                                    <td>{{ $penduduk->tanggallahir }}</td>
                                    <td>{{ $penduduk->alamat_sekarang }}</td>
                                    <td>{{ $penduduk->email }}</td>
                                    <td>
                                        <a href="{{ route('penduduk.show', $penduduk->id) }}" class="btn btn-sm btn-info">Detail</a>
                                        <button 
                                            class="btn btn-sm btn-warning edit-btn" 
                                            data-id="{{ $penduduk->id }}"
                                            data-nik="{{ $penduduk->nik }}"
                                            data-nama="{{ $penduduk->nama }}"
                                            data-sex="{{ $penduduk->sex }}"
                                            data-tempatlahir="{{ $penduduk->tempatlahir }}"
                                            data-tanggallahir="{{ $penduduk->tanggallahir }}"
                                            data-alamat="{{ $penduduk->alamat_sekarang }}"
                                            data-status="{{ $penduduk->status_dasar }}"
                                            data-url="{{ route('penduduk.update', $penduduk->id) }}"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editPendudukModal"
                                        >
                                            Edit
                                        </button>

                                        <form action="{{ route('penduduk.destroy', $penduduk->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-penduduk">Hapus</button>
                                        </form>
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



<!-- Modal Tambah Penduduk -->
<div class="modal fade" id="createPendudukModal" tabindex="-1" aria-labelledby="createPendudukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('penduduk.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createPendudukModalLabel">Tambah Data Penduduk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <!-- Form Input -->
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" name="nik" class="form-control" id="nik" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="sex" class="form-label">Jenis Kelamin</label>
                        <select name="sex" class="form-select" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tempatlahir" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempatlahir" class="form-control" id="tempatlahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggallahir" class="form-control" id="tanggallahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_sekarang" class="form-label">Alamat Sekarang</label>
                        <textarea name="alamat_sekarang" class="form-control" id="alamat_sekarang" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status_dasar" class="form-label">Status</label>
                        <select name="status_dasar" class="form-select" required>
                            <option value="">Pilih Status</option>
                            <option value="1">Hidup</option>
                            <option value="2">Mati</option>
                            <option value="3">Pindah</option>
                            <option value="4">Hilang</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit Penduduk -->
<div class="modal fade" id="editPendudukModal" tabindex="-1" aria-labelledby="editPendudukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="editPendudukForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editPendudukModalLabel">Edit Data Penduduk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <!-- Form Input sama seperti Tambah -->
                    <input type="hidden" name="id" id="edit_id">
                    <div class="mb-3">
                        <label for="edit_nik" class="form-label">NIK</label>
                        <input type="text" name="nik" class="form-control" id="edit_nik" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="edit_nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_sex" class="form-label">Jenis Kelamin</label>
                        <select name="sex" class="form-select" id="edit_sex" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_tempatlahir" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempatlahir" class="form-control" id="edit_tempatlahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_tanggallahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggallahir" class="form-control" id="edit_tanggallahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_alamat" class="form-label">Alamat Sekarang</label>
                        <textarea name="alamat_sekarang" class="form-control" id="edit_alamat" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_status" class="form-label">Status</label>
                        <select name="status_dasar" class="form-select" id="edit_status" required>
                            <option value="">Pilih Status</option>
                            <option value="1">Hidup</option>
                            <option value="2">Mati</option>
                            <option value="3">Pindah</option>
                            <option value="4">Hilang</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Hapus Penduduk -->
<div id="hapus-penduduk" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <div class="text-end">
                    <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="mt-2">
                    <lord-icon src="https://cdn.lordicon.com/tqywkdcz.json" trigger="hover"
                        style="width:150px;height:150px">
                    </lord-icon>
                    <h4 class="mb-3 mt-4">Your Transaction is Successfull !</h4>
                    <p class="text-muted fs-15 mb-4">Successful transaction is the status of operation whose result is the payment of the amount paid by the customer in favor of the merchant.</p>
                    <div class="hstack gap-2 justify-content-center">
                        <button class="btn btn-primary">New transaction</button>
                        <button class="btn btn-soft-success"><i class="ri-links-line align-bottom"></i> Copy tracking link</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light p-3 justify-content-center">
                <p class="mb-0 text-muted">You like our service? <a href="javascript:void(0)" class="link-secondary fw-semibold">Invite Friends</a></p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
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
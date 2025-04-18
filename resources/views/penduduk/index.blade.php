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
                                    <td>
                                       {{ $penduduk->jenis_kelamin }}
                                    </td>
                                    <td>{{ $penduduk->tanggal_lahir }}</td>
                                    <td>{{ $penduduk->alamat_sekarang }}</td>
                                    <td>{{ $penduduk->email }}</td>
                                    <td>
                                        <a href="{{ route('penduduk.show', $penduduk->id) }}" class="btn btn-sm btn-info">Detail</a>
                                        <button class="btn btn-sm btn-warning edit-btn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editPendudukModal"
                                            data-id="{{ $penduduk->id }}"
                                            data-nik="{{ $penduduk->nik }}"
                                            data-nama="{{ $penduduk->nama }}"
                                            data-email="{{ $penduduk->email }}"
                                            data-jenis_kelamin="{{ $penduduk->jenis_kelamin }}"
                                            data-tempat_lahir="{{ $penduduk->tempat_lahir }}"
                                            data-tanggal_lahir="{{ $penduduk->tanggal_lahir }}"
                                            data-alamat_sekarang="{{ $penduduk->alamat_sekarang }}"
                                            data-alamat_sebelumnya="{{ $penduduk->alamat_sebelumnya }}"
                                            data-agama="{{ $penduduk->agama }}"
                                            data-status_kawin="{{ $penduduk->status_kawin }}"
                                            data-status_keadaan="{{ $penduduk->status_keadaan }}"
                                            data-warga_negara="{{ $penduduk->warga_negara }}"
                                            data-pendidikan_terakhir="{{ $penduduk->pendidikan_terakhir }}"
                                            data-pekerjaan="{{ $penduduk->pekerjaan }}"
                                            data-ayah_nik="{{ $penduduk->ayah_nik }}"
                                            data-ibu_nik="{{ $penduduk->ibu_nik }}"
                                            data-nama_ayah="{{ $penduduk->nama_ayah }}"
                                            data-nama_ibu="{{ $penduduk->nama_ibu }}"
                                            data-hubungan_warga="{{ $penduduk->hubungan_warga }}"
                                            data-no_kk_sebelumnya="{{ $penduduk->no_kk_sebelumnya }}"
                                            data-golongan_darah="{{ $penduduk->golongan_darah }}"
                                            data-suku="{{ $penduduk->suku }}"
                                            data-ktp_el="{{ $penduduk->ktp_el }}"
                                            data-status_rekam="{{ $penduduk->status_rekam }}"
                                            data-tempat_cetak_ktp="{{ $penduduk->tempat_cetak_ktp }}"
                                            data-tanggal_cetak_ktp="{{ $penduduk->tanggal_cetak_ktp }}"
                                            data-note="{{ $penduduk->note }}">
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

@include('penduduk.create')
@include('penduduk.edit')

<div id="hapus-penduduk" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <div class="text-end">
                    <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="mt-2">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" style="width:100px;height:100px"></lord-icon>
                    <h4 class="mt-4">Anda yakin ingin menghapus data ini?</h4>
                    <p class="text-muted fs-15 mb-4">Data yang sudah dihapus tidak dapat dikembalikan.</p>
                    <div class="hstack gap-3 justify-content-center">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger btn-hapus-penduduk">Hapus</button>
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
<script>
$(document).ready(function() {
    $('#editPendudukModal').on('show.bs.modal', function(e) {
        const button = $(e.relatedTarget);
        const penduduk = button.data();

        if (penduduk.id) {
            const updateUrl = `/penduduk/${penduduk.id}`;
            $(this).find('#editPendudukForm').attr('action', updateUrl);
            $(this).find('#edit_id').val(penduduk.id);
            $(this).find('#edit_nik').val(penduduk.nik);
            $(this).find('#edit_nama').val(penduduk.nama);
            $(this).find('#edit_email').val(penduduk.email);
            $(this).find('#edit_jenis_kelamin').val(penduduk.jenis_kelamin);
            $(this).find('#edit_tempat_lahir').val(penduduk.tempat_lahir);
            $(this).find('#edit_tanggal_lahir').val(penduduk.tanggal_lahir);
            $(this).find('#edit_alamat_sekarang').val(penduduk.alamat_sekarang);
            $(this).find('#edit_alamat_sebelumnya').val(penduduk.alamat_sebelumnya || '');
            $(this).find('#edit_ayah_nik').val(penduduk.ayah_nik || '');
            $(this).find('#edit_ibu_nik').val(penduduk.ibu_nik || '');
            $(this).find('#edit_nama_ayah').val(penduduk.nama_ayah || '');
            $(this).find('#edit_nama_ibu').val(penduduk.nama_ibu || '');
            $(this).find('#edit_no_kk_sebelumnya').val(penduduk.no_kk_sebelumnya || '');
            $(this).find('#edit_tempat_cetak_ktp').val(penduduk.tempat_cetak_ktp || '');
            $(this).find('#edit_tanggal_cetak_ktp').val(penduduk.tanggal_cetak_ktp || '');
            $(this).find('#edit_note').val(penduduk.note || '');
            $(this).find('#edit_agama').val(penduduk.agama || '');
            $(this).find('#edit_status_kawin').val(penduduk.status_kawin || '');
            $(this).find('#edit_warga_negara').val(penduduk.warga_negara || '');
            $(this).find('#edit_pendidikan_terakhir').val(penduduk.pendidikan_terakhir || '');
            $(this).find('#edit_pekerjaan').val(penduduk.pekerjaan || '');
            $(this).find('#edit_hubungan_warga').val(penduduk.hubungan_warga || '');
            $(this).find('#edit_golongan_darah').val(penduduk.golongan_darah || '');
            $(this).find('#edit_suku').val(penduduk.suku || '');
            $(this).find('#edit_ktp_el').val(penduduk.ktp_el ? '1' : '0');
            $(this).find('#edit_status_rekam').val(penduduk.status_rekam || '');
            $(this).find('#edit_status_keadaan').val(penduduk.status_keadaan || '');
        } else {
            console.error('ID penduduk tidak ditemukan');
        }
    });

    // Script lainnya tetap sama
});
    flatpickr("#tanggal_cetak_ktp", {
        dateFormat: "Y-m-d"
    });

    flatpickr("#tanggal_lahir", {
        dateFormat: "Y-m-d"
    });

    $(document).ready(function() {
    $('#hapus-penduduk').on('show.bs.modal', function(e) {
        const button = $(e.relatedTarget);
        const form = button.closest('form');
        const action = form.attr('action');

        $(this).find('.btn-hapus-penduduk').off('click').on('click', function() {
            form.submit();
        });
    });
});
</script>
@endsection
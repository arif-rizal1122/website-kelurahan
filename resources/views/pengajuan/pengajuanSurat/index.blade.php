@extends('layouts.master')
@section('title')
  Data Pengajuan Surat
@endsection
@section('css')
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Pengajuan Surat
        @endslot
        @slot('title')
        Semua Data Pengajuan Surat
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route('pengajuan-surat.status', 'diajukan') }}" class="btn btn-sm btn-outline-warning me-1">
                            <i class="bx bxs-inbox me-1"></i> Diajukan
                        </a>
                        <a href="{{ route('pengajuan-surat.status', 'diproses') }}" class="btn btn-sm btn-outline-info me-1">
                            <i class="bx bx-loader-circle me-1"></i> Diproses
                        </a>
                        <a href="{{ route('pengajuan-surat.status', 'selesai') }}" class="btn btn-sm btn-outline-success me-1">
                            <i class="bx bx-check-double me-1"></i> Selesai
                        </a>
                        <a href="{{ route('pengajuan-surat.status', 'ditolak') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="bx bx-x-circle me-1"></i> Ditolak
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Warga</th>
                                    <th>Jenis Surat</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Keperluan</th>
                                    <th>Status</th>
                                    <th>Petugas</th>
                                    <th>File Pendukung</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuanSurats as $pengajuanSurat)
                                    <tr>
                                        <td>{{ $pengajuanSurat->warga->nama ?? '-' }}</td>
                                        <td>{{ $pengajuanSurat->jenisSurat->nama ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pengajuanSurat->tanggal_pengajuan)->format('d-m-Y') }}</td>
                                        <td>{{ $pengajuanSurat->keperluan }}</td>
                                        <td>
                                            @if ($pengajuanSurat->status == \App\Enums\Status::DIAJUKAN)
                                                <span class="badge bg-warning">{{ $pengajuanSurat->status->value }}</span>
                                            @elseif ($pengajuanSurat->status == \App\Enums\Status::DIPROSES)
                                                <span class="badge bg-info">{{ $pengajuanSurat->status->value }}</span>
                                            @elseif ($pengajuanSurat->status == \App\Enums\Status::SELESAI)
                                                <span class="badge bg-success">{{ $pengajuanSurat->status->value }}</span>
                                            @elseif ($pengajuanSurat->status == \App\Enums\Status::DITOLAK)
                                                <span class="badge bg-secondary">{{ $pengajuanSurat->status->value }}</span>
                                            @else
                                                {{ $pengajuanSurat->status->value }}
                                            @endif
                                        </td>
                                        <td>{{ $pengajuanSurat->user->name ?? '-' }}</td>
                                        <td>
                                            @if ($pengajuanSurat->file_pendukung)
                                                <a href="{{ asset('storage/' . $pengajuanSurat->file_pendukung) }}"
                                                   target="_blank"
                                                   class="text-primary"> 
                                                    <i class="bx bxs-file-pdf bx-sm align-middle"></i> 
                                                </a>
                                            @else
                                                Tidak Ada
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex gap-1 overflow-auto">
                                                <a href="{{ route('pengajuan-surat.show', $pengajuanSurat->id) }}"
                                                    class="btn btn-sm btn-info" title="Lihat Detail">
                                                    <i class="bx bx-detail"></i> Detail
                                                </a>
                                        
                                                @if ($pengajuanSurat->status == \App\Enums\Status::DIAJUKAN)
                                                    <form action="{{ route('pengajuan-surat.process', $pengajuanSurat->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm btn-warning" title="Proses Pengajuan"
                                                                data-status="{{ \App\Enums\Status::DIPROSES }}">
                                                            <i class="bx bx-task"></i> Proses
                                                        </button>
                                                    </form>
                                                    <a href="{{ route('pengajuan-surat.reject', $pengajuanSurat->id) }}" class="btn btn-sm btn-secondary">
                                                        <i class="bx bx-x-circle"></i> Tolak
                                                    </a>
                                                @elseif ($pengajuanSurat->status == \App\Enums\Status::DIPROSES)
                                                    <form action="{{ route('pengajuan-surat.complete', $pengajuanSurat->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm btn-success" title="Selesaikan Pengajuan"
                                                                data-status="{{ \App\Enums\Status::SELESAI }}">
                                                            <i class="bx bx-check-circle"></i> Selesaikan
                                                        </button>
                                                    </form>
                                                @elseif ($pengajuanSurat->status == \App\Enums\Status::SELESAI)
                                                    <a href="{{ route('pengajuan-surat.print', $pengajuanSurat->id) }}" class="btn btn-primary btn-sm">
                                                        Cetak Word
                                                    </a>
                                                @elseif ($pengajuanSurat->status == \App\Enums\Status::DITOLAK)
                                                    <button type="button" class="btn btn-sm btn-secondary" disabled>
                                                        <i class="bx bx-info-circle"></i> Ditolak
                                                    </button>
                                                @endif

                                                @auth
                                                @if (Auth::user()->role === 'admin')
                                                <form action="{{ route('pengajuan-surat.destroy', $pengajuanSurat->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-pengajuan-surat">
                                                        <i class="bx bx-trash"></i> Hapus
                                                    </button>
                                                </form>
                                                @endif
                                                @endauth

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

    <div id="hapus-pengajuan-surat" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="text-end">
                        <button type="button" class="btn-close text-end" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="mt-2">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            style="width:100px;height:100px"></lord-icon>
                        <h4 class="mt-4">Anda yakin ingin menghapus pengajuan surat ini?</h4>
                        <p class="text-muted fs-15 mb-4">Data yang sudah dihapus tidak dapat dikembalikan.</p>
                        <div class="hstack gap-3 justify-content-center">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-danger btn-hapus-pengajuan-surat">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('table').on('click', 'button[data-status]', function(e) {
                e.preventDefault();

                var button = $(this);
                var form = button.closest('form');
                var status = button.data('status');
                var title = '';
                var text = '';
                var icon = '';

                if (status === '{{ \App\Enums\Status::DIPROSES }}') {
                    title = 'Proses Pengajuan?';
                    text = 'Anda yakin ingin memproses pengajuan ini?';
                    icon = 'warning';
                } else if (status === '{{ \App\Enums\Status::SELESAI }}') {
                    title = 'Selesaikan Pengajuan?';
                    text = 'Anda yakin ingin menyelesaikan pengajuan ini?';
                    icon = 'success';
                } else if (status === '{{ \App\Enums\Status::DITOLAK }}') {
                    title = 'Tolak Pengajuan?';
                    text = 'Anda yakin ingin menolak pengajuan ini?';
                    icon = 'warning';
                }

                Swal.fire({
                    title: title,
                    text: text,
                    icon: icon,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, lanjutkan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            $('#hapus-pengajuan-surat').on('show.bs.modal', function(e) {
            const button = $(e.relatedTarget);
            const form = button.closest('form');
            const action = form.attr('action');

            $(this).find('.btn-hapus-pengajuan-surat').off('click').on('click', function() {
                form.submit();
            });
          });
        });
    </script>
@endsection

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if ($errors->hasAny(['warga_id', 'jenis_surat_id', 'tanggal_pengajuan', 'keperluan', 'status', 'tanggal_diproses', 'user_id', 'tanggal_selesai', 'keterangan_penolakan', 'file_pendukung']))
                var editModal = new bootstrap.Modal(document.getElementById('editPengajuanSuratModal'));
                editModal.show();
            @endif
        });
    </script>
@endif
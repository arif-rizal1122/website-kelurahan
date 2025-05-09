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
            Data Pengajuan Surat {{ $statusName }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <!-- Statistics Row -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        @php
                            $countDiajukan = isset($allPengajuan) ? $allPengajuan->where('status', 'diajukan')->count() : 0;
                            $countDiproses = isset($allPengajuan) ? $allPengajuan->where('status', 'diproses')->count() : 0;
                            $countSelesai = isset($allPengajuan) ? $allPengajuan->where('status', 'selesai')->count() : 0;
                            $countDitolak = isset($allPengajuan) ? $allPengajuan->where('status', 'ditolak')->count() : 0;
                        @endphp
                        
                        <a href="{{ route('pengajuan-surat.status', 'diajukan') }}" class="btn btn-sm btn-outline-warning me-1">
                            <i class="bx bxs-inbox me-2"></i> Diajukan
                            <span class="badge bg-warning text-black">{{ $countDiajukan }}</span>
                        </a>
                        <a href="{{ route('pengajuan-surat.status', 'diproses') }}" class="btn btn-sm btn-outline-info me-2">
                            <i class="bx bx-loader-circle me-2"></i> Diproses
                            <span class="badge bg-info text-black">{{ $countDiproses }}</span>
                        </a>
                        <a href="{{ route('pengajuan-surat.status', 'selesai') }}" class="btn btn-sm btn-outline-success me-2">
                            <i class="bx bx-check-double me-2"></i> Selesai
                            <span class="badge bg-success text-black">{{ $countSelesai }}</span>
                        </a>
                        <a href="{{ route('pengajuan-surat.status', 'ditolak') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="bx bx-x-circle me-2"></i> Ditolak
                            <span class="badge bg-secondary text-black">{{ $countDitolak }}</span>
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
                                    <th>Status</th>
                                    <th>Petugas</th>
                                    <th>File Pendukung</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuan as $pengajuanSurat)
                                    <tr>
                                        <td>{{ $pengajuanSurat->warga->nama ?? '-' }}</td>
                                        <td>{{ $pengajuanSurat->jenisSurat->nama ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pengajuanSurat->tanggal_pengajuan)->format('d-m-Y') }}</td>
                                        <td>
                                            @php
                                                $statusClass = '';
                                                $statusIcon = '';
                                                
                                                if ($pengajuanSurat->status == \App\Enums\Status::DIAJUKAN) {
                                                    $statusClass = 'status-diajukan';
                                                    $statusIcon = 'bx bxs-inbox';
                                                } elseif ($pengajuanSurat->status == \App\Enums\Status::DIPROSES) {
                                                    $statusClass = 'status-diproses';
                                                    $statusIcon = 'bx bx-loader-circle';
                                                } elseif ($pengajuanSurat->status == \App\Enums\Status::SELESAI) {
                                                    $statusClass = 'status-selesai';
                                                    $statusIcon = 'bx bx-check-double';
                                                } elseif ($pengajuanSurat->status == \App\Enums\Status::DITOLAK) {
                                                    $statusClass = 'status-ditolak';
                                                    $statusIcon = 'bx bx-x-circle';
                                                }
                                            @endphp
                                            
                                            <span class="status-badge {{ $statusClass }}">
                                                <i class="{{ $statusIcon }}"></i> {{ $pengajuanSurat->status->value }}
                                            </span>
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
                                                <span class="text-muted">Tidak Ada</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex gap-1 overflow-auto">
                                                <a href="{{ route('pengajuan-surat.show', $pengajuanSurat->id) }}"
                                                    class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Lihat Detail">
                                                    <i class="bx bx-detail"></i> Detail
                                                </a>
                                        
                                                @if ($pengajuanSurat->status == \App\Enums\Status::DIAJUKAN)
                                                    <button type="button" class="btn btn-sm btn-warning process-btn" 
                                                        data-id="{{ $pengajuanSurat->id }}"
                                                        data-status="{{ \App\Enums\Status::DIPROSES }}"
                                                        data-bs-toggle="tooltip" title="Proses Pengajuan">
                                                        <i class="bx bx-task"></i> Proses
                                                    </button>
                                                    
                                                    <a href="{{ route('pengajuan-surat.reject', $pengajuanSurat->id) }}" 
                                                        class="btn btn-sm btn-secondary reject-btn"
                                                        data-bs-toggle="tooltip" title="Tolak Pengajuan">
                                                        <i class="bx bx-x-circle"></i> Tolak
                                                    </a>
                                                @elseif ($pengajuanSurat->status == \App\Enums\Status::DIPROSES)
                                                    <button type="button" class="btn btn-sm btn-success complete-btn" 
                                                        data-id="{{ $pengajuanSurat->id }}"
                                                        data-status="{{ \App\Enums\Status::SELESAI }}"
                                                        data-bs-toggle="tooltip" title="Selesaikan Pengajuan">
                                                        <i class="bx bx-check-circle"></i> Selesaikan
                                                    </button>
                                                @elseif ($pengajuanSurat->status == \App\Enums\Status::SELESAI)
                                                    <a href="{{ route('pengajuan-surat.print', $pengajuanSurat->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="bx bx-printer"></i> Cetak Word
                                                    </a>
                                                @elseif ($pengajuanSurat->status == \App\Enums\Status::DITOLAK)
                                                    <button type="button" class="btn btn-sm btn-secondary" disabled>
                                                        <i class="bx bx-info-circle"></i> Ditolak
                                                    </button>
                                                @endif

                                                @auth
                                                @if (Auth::user()->role === 'admin')
                                                    <button type="button" class="btn btn-sm btn-danger delete-btn" 
                                                        data-id="{{ $pengajuanSurat->id }}"
                                                        data-bs-toggle="tooltip" title="Hapus Pengajuan">
                                                        <i class="bx bx-trash"></i> Hapus
                                                    </button>
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

    <!-- Modal Konfirmasi Hapus -->
    <div id="delete-modal" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="text-end">
                        <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="mt-2">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" style="width:100px;height:100px"></lord-icon>
                        <h4 class="mt-4">Anda yakin ingin menghapus pengajuan surat ini?</h4>
                        <p class="text-muted fs-15 mb-4">Data yang sudah dihapus tidak dapat dikembalikan.</p>
                        <div class="hstack gap-3 justify-content-center">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-danger" id="confirm-delete">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form processing untuk status update -->
    <form id="process-form" action="" method="POST" style="display: none;">
        @csrf
        @method('PATCH')
    </form>

    <!-- Form delete -->
    <form id="delete-form" action="" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
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
                // Process button click handler
                $('.process-btn').on('click', function() {
                    const id = $(this).data('id');
                    const status = $(this).data('status');
                    
                    Swal.fire({
                        title: 'Proses Pengajuan?',
                        text: 'Anda yakin ingin memproses pengajuan ini?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, proses!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#process-form').attr('action', `/pengajuan-surat/${id}/process`);
                            $('#process-form').submit();
                        }
                    });
                });
                
                // Complete button click handler
                $('.complete-btn').on('click', function() {
                    const id = $(this).data('id');
                    const status = $(this).data('status');
                    
                    Swal.fire({
                        title: 'Selesaikan Pengajuan?',
                        text: 'Anda yakin ingin menyelesaikan pengajuan ini?',
                        icon: 'success',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, selesaikan!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#process-form').attr('action', `/pengajuan-surat/${id}/complete`);
                            $('#process-form').submit();
                        }
                    });
                });
                
                // Reject button click handler
                $('.reject-btn').on('click', function() {
                    const id = $(this).data('id');
                    const status = $(this).data('status');
                    
                    Swal.fire({
                        title: 'Tolak Pengajuan?',
                        text: 'Anda yakin ingin menolak pengajuan ini?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, tolak!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#process-form').attr('action', `/pengajuan-surat/${id}/reject`);
                            $('#process-form').submit();
                        }
                    });
                });
                
                // Delete button click handler
                $('.delete-btn').on('click', function() {
                    const id = $(this).data('id');
                    $('#delete-form').attr('action', `/pengajuan-surat/${id}`);
                    $('#delete-modal').modal('show');
                });
                
                // Confirm delete button
                $('#confirm-delete').on('click', function() {
                    $('#delete-form').submit();
                });
                
                // Initialize tooltips
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                });
            });
    </script>
    
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        });
    </script>
    @endif
    
    @if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                timer: 3000,
                showConfirmButton: false
            });
        });
    </script>
    @endif
@endsection
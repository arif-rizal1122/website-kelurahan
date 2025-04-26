@extends('layouts.master')
@section('title')
    Data Users
@endsection
@section('css')
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Tables
        @endslot
        @slot('title')
            Data Users
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div
                        class="card-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2">
                        <h5 class="card-title mb-0">Data Users</h5>
                        <a href="{{ route('users.create') }}" class="btn btn-primary">
                            Tambah User
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>NIP</th>
                                    <th>Jabatan</th>
                                    <th>Avatar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->nip }}</td>
                                        <td>{{ $user->jabatan }}</td>
                                        <td>
                                            @if ($user->avatar)
                                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar"
                                                    class="rounded-circle" width="50">
                                            @else
                                                No Avatar
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1 overflow-auto">
                                                <a href="{{ route('users.show', $user->id) }}"
                                                    class="btn btn-sm btn-info">Detail</a>
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-sm btn-warning">
                                                    Edit
                                                </a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="modal" data-bs-target="#hapus-user">Hapus</button>
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

    <div id="hapus-user" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
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
                        <h4 class="mt-4">Anda yakin ingin menghapus user ini?</h4>
                        <p class="text-muted fs-15 mb-4">Data yang sudah dihapus tidak dapat dikembalikan.</p>
                        <div class="hstack gap-3 justify-content-center">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-danger btn-hapus-user">Hapus</button>
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

    <script>
        $('#hapus-user').on('show.bs.modal', function(e) {
            const button = $(e.relatedTarget);
            const form = button.closest('form');
            const action = form.attr('action');

            $(this).find('.btn-hapus-user').off('click').on('click', function() {
                form.submit();
            });
        });
    </script>
@endsection

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if ($errors->hasAny(['name', 'email', 'password', 'role', 'nip', 'jabatan', 'avatar']))
                var editModal = new bootstrap.Modal(document.getElementById('editUserModal'));
                editModal.show();
            @endif
        });
    </script>
@endif
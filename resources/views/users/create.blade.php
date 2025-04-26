@extends('layouts.master')
@section('title')
    Tambah User
@endsection
@section('css')
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Users
        @endslot
        @slot('title')
            Tambah User
        @endslot
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-user-plus font-size-24 me-2"></i>
                        <h4 class="card-title mb-0">Form Tambah User</h4>
                    </div>
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label fw-bold text-success">
                                        <i class="bx bx-user me-1"></i>Nama <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                        placeholder="Masukkan nama"
                                        maxlength="100"
                                        required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="email" class="form-label fw-bold text-success">
                                        <i class="bx bx-envelope me-1"></i>Email <span class="text-danger">*</span>
                                    </label>
                                    <input type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="Masukkan email"
                                        maxlength="100"
                                        required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="password" class="form-label fw-bold text-success">
                                        <i class="bx bx-lock me-1"></i>Password <span class="text-danger">*</span>
                                    </label>
                                    <input type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        id="password"
                                        name="password"
                                        placeholder="Masukkan password"
                                        minlength="8"
                                        required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="password_confirmation" class="form-label fw-bold text-success">
                                        <i class="bx bx-lock-open me-1"></i>Konfirmasi Password <span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation"
                                        name="password_confirmation"
                                        placeholder="Konfirmasi password"
                                        minlength="8"
                                        required>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="role" class="form-label fw-bold text-success">
                                    <i class="bx bx-shield me-1"></i>Role <span class="text-danger">*</span>
                                </label>
                                <select class="form-control @error('role') is-invalid @enderror"
                                    id="role"
                                    name="role"
                                    required>
                                    <option value="">Pilih Role</option>
                                    @foreach (\App\Enums\UserEnum::cases() as $role)
                                        <option value="{{ $role }}" {{ old('role') == $role ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nip" class="form-label fw-bold text-success">
                                        <i class="bx bx-id-card me-1"></i>NIP
                                    </label>
                                    <input type="text"
                                        class="form-control @error('nip') is-invalid @enderror"
                                        id="nip"
                                        name="nip"
                                        value="{{ old('nip') }}"
                                        placeholder="Masukkan NIP">
                                    @error('nip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="jabatan" class="form-label fw-bold text-success">
                                        <i class="bx bx-briefcase me-1"></i>Jabatan
                                    </label>
                                    <input type="text"
                                        class="form-control @error('jabatan') is-invalid @enderror"
                                        id="jabatan"
                                        name="jabatan"
                                        value="{{ old('jabatan') }}"
                                        placeholder="Masukkan Jabatan">
                                    @error('jabatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-group">
                                <label for="avatar" class="form-label fw-bold text-success">
                                    <i class="bx bx-image-add me-1"></i>Avatar
                                </label>
                                <div class="card shadow-none border">
                                    <div class="card-body">
                                        <div class="dropzone-wrapper">
                                            <div class="dropzone-desc">
                                                <i class="bx bx-upload font-size-24 mb-2 d-block text-muted"></i>
                                                <p class="text-muted mb-1">Klik atau seret file ke sini untuk mengunggah</p>
                                                <p class="small text-muted mb-0">Format file yang diizinkan: JPG, PNG, JPEG (Maks:
                                                    2MB)</p>
                                            </div>
                                            <input type="file"
                                                class="form-control dropzone-input"
                                                id="avatar"
                                                name="avatar"
                                                accept="image/*">
                                        </div>
                                        @error('avatar')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap justify-content-between align-items-center mt-4 gap-2">
                            <a href="{{ route('users.index') }}"
                                class="btn btn-sm btn-secondary flex-grow-1 flex-md-grow-0">
                                <i class="bx bx-arrow-back me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-sm btn-primary flex-grow-1 flex-md-grow-0">
                                <i class="bx bx-save me-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.master')
@section('title')
    Setting
@endsection
@section('content')
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="{{ URL::asset('build/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
            <div class="overlay-content">
                <div class="text-end p-3">
                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                        <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input">
                        <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                            <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                            <img src="@if (Auth::user()->avatar != '') {{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('build/images/users/avatar-1.jpg') }} @endif"
                                class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light text-body">
                                        <i class="ri-camera-fill"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <h5 class="fs-17 mb-1">Anna Adame</h5>
                        <p class="text-muted mb-0">Lead Designer / Developer</p>
                    </div>
                </div>
            </div>
            <!--end card-->

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Portfolio</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0);" class="badge bg-light text-primary fs-12"><i
                                    class="ri-add-fill align-bottom me-1"></i> Add</a>
                        </div>
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-body text-body">
                                <i class="ri-github-fill"></i>
                            </span>
                        </div>
                        <input type="email" class="form-control" id="gitUsername" placeholder="Username"
                            value="@daveadame">
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-primary">
                                <i class="ri-global-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="websiteInput" placeholder="www.example.com"
                            value="www.velzon.com">
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-success">
                                <i class="ri-dribbble-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="dribbleName" placeholder="Username"
                            value="@dave_adame">
                    </div>
                    <div class="d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-danger">
                                <i class="ri-pinterest-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="pinterestName" placeholder="Username"
                            value="Advance Dave">
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#commonDetails" role="tab">
                                <i class="fas fa-home"></i>
                                Informasi Umum
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#pengunaUser" role="tab">
                                <i class="far fa-envelope"></i>
                                Penguna / User
                            </a>
                        </li>
                        
                    </ul>
                </div>


           {{--  --}}
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="commonDetails" role="tabpanel">

                            <form action="{{ route('config.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                            
                                    <!-- Nama Desa -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="namaDesaInput" class="form-label">Nama Desa</label>
                                            <input type="text" name="nama_desa" class="form-control"
                                                value="{{ old('nama_desa', $config->nama_desa ?? '') }}">
                                        </div>
                                    </div>
                            
                                    <!-- Kode Desa -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="kodeDesaInput" class="form-label">Kode Desa</label>
                                            <input type="text" name="kode_desa" class="form-control"
                                                value="{{ old('kode_desa', $config->kode_desa ?? '') }}">
                                        </div>
                                    </div>
                            
                                    <!-- Nama Kecamatan -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="namaKecamatanInput" class="form-label">Nama Kecamatan</label>
                                            <input type="text" name="nama_kecamatan" class="form-control"
                                                value="{{ old('nama_kecamatan', $config->nama_kecamatan ?? '') }}">
                                        </div>
                                    </div>
                            
                                    <!-- Kode Kecamatan -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="kodeKecamatanInput" class="form-label">Kode Kecamatan</label>
                                            <input type="text" name="kode_kecamatan" class="form-control"
                                                value="{{ old('kode_kecamatan', $config->kode_kecamatan ?? '') }}">
                                        </div>
                                    </div>
                            
                                    <!-- Nama Kepala Camat -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="namaCamatInput" class="form-label">Nama Camat</label>
                                            <input type="text" name="nama_kepala_camat" class="form-control"
                                                value="{{ old('nama_kepala_camat', $config->nama_kepala_camat ?? '') }}">
                                        </div>
                                    </div>
                            
                                    <!-- NIP Kepala Camat -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="nipCamatInput" class="form-label">NIP Camat</label>
                                            <input type="text" name="nip_kepala_camat" class="form-control"
                                                value="{{ old('nip_kepala_camat', $config->nip_kepala_camat ?? '') }}">
                                        </div>
                                    </div>
                            
                                    <!-- Nama Kabupaten -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Kabupaten</label>
                                            <input type="text" name="nama_kabupaten" class="form-control"
                                                value="{{ old('nama_kabupaten', $config->nama_kabupaten ?? '') }}">
                                        </div>
                                    </div>
                            
                                    <!-- Kode Kabupaten -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Kode Kabupaten</label>
                                            <input type="text" name="kode_kabupaten" class="form-control"
                                                value="{{ old('kode_kabupaten', $config->kode_kabupaten ?? '') }}">
                                        </div>
                                    </div>
                            
                                    <!-- Nama Provinsi -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Provinsi</label>
                                            <input type="text" name="nama_propinsi" class="form-control"
                                                value="{{ old('nama_propinsi', $config->nama_propinsi ?? '') }}">
                                        </div>
                                    </div>
                            
                                    <!-- Kode Provinsi -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Kode Provinsi</label>
                                            <input type="text" name="kode_propinsi" class="form-control"
                                                value="{{ old('kode_propinsi', $config->kode_propinsi ?? '') }}">
                                        </div>
                                    </div>
                            

                            
                                    <!-- Email Desa -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email Desa</label>
                                            <input type="email" name="email_desa" class="form-control"
                                                value="{{ old('email_desa', $config->email_desa ?? '') }}">
                                        </div>
                                    </div>
                            
                            
                                    <!-- Nomor Operator -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nomor Operator</label>
                                            <input type="text" name="nomor_operator" class="form-control"
                                                value="{{ old('nomor_operator', $config->nomor_operator ?? '') }}">
                                        </div>
                                    </div>
                            
                                    
                                    <!-- Telepon -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Telepon</label>
                                            <input type="text" name="telepon" class="form-control"
                                                value="{{ old('telepon', $config->telepon ?? '') }}">
                                        </div>
                                    </div>
                            
                                    <!-- Logo Upload -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Logo</label>
                                            <input type="file" name="logo" class="form-control">
                                        </div>
                                    </div>

                                    <!-- Alamat Kantor -->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                        <label class="form-label">Alamat Kantor</label>
                                        <textarea name="alamat_kantor" class="form-control" rows="2">{{ old('alamat_kantor', $config->alamat_kantor ?? '') }}</textarea>
                                        </div>
                                    </div>
                            
                            
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <a href="{{ route('config.index') }}" class="btn btn-soft-secondary">Batal</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                        </div>


                        {{--  --}}
                        <!--end tab-pane-->
                        <div class="tab-pane" id="pengunaUser" role="tabpanel">
                            <div class="table-responsive">
                                <div class="hstack m-2 justify-content-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUser">Tambah</button>
                                </div>
                                <table id="userTable" class="table table-striped table-bordered nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $index => $user)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editUser">Edit</button>
                                                        <form action="" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-user">Hapus</button>
                                                        </form>
                                                    </div>
                                                </td>                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!--end tab-pane-->

                        
                    </div>
                </div>



            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->



    <!--create modal user-->
    <div class="col-xl-4 col-md-6">
        <div id="createUser" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="alert alert-success  rounded-0 mb-0">
                        <p class="mb-0"><span class="fw-semibold">Form Tambah User</span></p>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="emailInput" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="checkTerms">
                                <label class="form-check-label" for="checkTerms">I agree to the <span class="fw-semibold">Terms of Service</span> and Privacy Policy</label>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Sign Up Now</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    <!--end row-->


    <!--edit modal user-->
    <div class="col-xl-4 col-md-6">
        <div id="editUser" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="alert alert-success  rounded-0 mb-0">
                        <p class="mb-0"><span class="fw-semibold">Form Edit User</span></p>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="emailInput" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="checkTerms">
                                <label class="form-check-label" for="checkTerms">I agree to the <span class="fw-semibold">Terms of Service</span> and Privacy Policy</label>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Sign Up Now</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    <!--end row-->


     <!--delete modal user-->
    <div id="hapus-user" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
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
            </div>
        </div>
    </div>
    


@endsection
@section('script')
    <script src="{{ URL::asset('build/js/pages/profile-setting.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    
@endsection
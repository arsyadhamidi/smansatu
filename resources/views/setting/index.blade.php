@extends('dashboard.layout.master')
@section('menuDashboard', 'Active')
@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            @if (Auth()->user()->foto_profile)
                                <img src="{{ asset('storage/' . Auth()->user()->foto_profile) }}"
                                    class="user-image img-circle" alt="User Image" style="width: 150px; height: 150px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/profile.png') }}" class="user-image img-circle" width="150"
                                    alt="User Image">
                            @endif
                            <p class="mt-3">{{ Auth()->user()->name ?? '-' }}</p>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <label>Nama Lengkap</label>
                            <p>{{ Auth()->user()->name ?? '-' }}</p>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <label>Email</label>
                            <p>{{ Auth()->user()->email ?? '-' }}</p>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <label>Password</label>
                            <p>{{ Auth()->user()->duplicate ?? '-' }}</p>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <label>Jabatan</label>
                            <p>{{ Auth()->user()->jabatan ?? '-' }}</p>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <label>Bidang</label>
                            <p>{{ Auth()->user()->bidang ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="mb-3">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="biodata-tab" data-bs-toggle="tab" data-bs-target="#biodata"
                                    type="button" role="tab" aria-controls="biodata" aria-selected="true">Biodata</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="email-tab" data-bs-toggle="tab" data-bs-target="#email"
                                    type="button" role="tab" aria-controls="email" aria-selected="false">Email</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password"
                                    type="button" role="tab" aria-controls="password"
                                    aria-selected="false">Password</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="foto-tab" data-bs-toggle="tab" data-bs-target="#foto"
                                    type="button" role="tab" aria-controls="foto" aria-selected="false">Foto
                                    Profile</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="biodata" role="tabpanel" aria-labelledby="biodata-tab">
                                <form action="{{ route('setting.updateprofile') }}" method="POST">
                                    @csrf
                                    <div class="row mt-4">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Nama Lengkap</label>
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ old('name', $users->name ?? '-') }}"
                                                    placeholder="Masukan nama lengkap">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Jabatan</label>
                                                <input type="text" name="jabatan"
                                                    class="form-control @error('jabatan') is-invalid @enderror"
                                                    value="{{ old('jabatan', $users->jabatan ?? '-') }}"
                                                    placeholder="Masukan jabatan">
                                                @error('jabatan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Bidang</label>
                                                <input type="text" name="bidang"
                                                    class="form-control @error('bidang') is-invalid @enderror"
                                                    value="{{ old('bidang', $users->bidang ?? '-') }}"
                                                    placeholder="Masukan bidang">
                                                @error('bidang')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-save"></i>
                                                    Simpan Data
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
                                <form action="{{ route('setting.updateemail') }}" method="POST">
                                    @csrf
                                    <div class="row mt-4">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Email Baru</label>
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ old('email') }}" placeholder="Masukan email">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-save"></i>
                                                    Simpan Data
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                <form action="{{ route('setting.updatepassword') }}" method="POST">
                                    @csrf
                                    <div class="row mt-4">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label>Password Baru</label>
                                                <input type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    value="{{ old('password') }}" placeholder="Masukan password">
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-save"></i>
                                                    Simpan Data
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="foto" role="tabpanel" aria-labelledby="foto-tab">
                                <form action="{{ route('setting.updategambar') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mt-4">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">File input</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="foto_profile"
                                                                class="custom-file-input @error('foto_profile') is-invalid @enderror"
                                                                id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>
                                                        @error('foto_profile')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-save"></i>
                                                    Simpan Data
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($users->foto_profile)
                <div class="card">
                    <div class="card-body">
                        <h5><b>Hapus Foto Profile</b></h5>
                        <p>Apakah anda yakin untuk menghapus foto profile ini ?</p>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('setting.deletegambar') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk hapus gambar ini?');">
                                <i class="fas fa-times"></i>
                                Hapus Gambar
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

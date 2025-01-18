@extends('dashboard.layout.master')
@section('menuUserRegistrasi', 'active')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <form action="{{ route('data-user.index') }}" method="GET">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <h5 class="card-title"><b>Pencarian Data</b></h5>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <select name="peran" class="form-control" id="selectedSearchPeran"
                                            style="width: 100%">
                                            <option value="" selected>Pilih Peran</option>
                                            <option value="1" {{ request('peran') == '1' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="2" {{ request('peran') == '2' ? 'selected' : '' }}>Pegawai
                                            </option>
                                            <option value="3" {{ request('peran') == '3' ? 'selected' : '' }}>Staff
                                                Tata
                                                Usaha</option>
                                            <option value="4" {{ request('peran') == '4' ? 'selected' : '' }}>Kepala
                                                Tata
                                                Usaha</option>
                                            <option value="5" {{ request('peran') == '5' ? 'selected' : '' }}>Kepala
                                                Sekolah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <button type="submit" class="btn btn-info">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                            <i class="fas fa-plus"></i>
                            Tambah User Registrasi
                        </button>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th style="width: 4%">No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Jabatan</th>
                                    <th>Peran</th>
                                    <th>Foto Profile</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name ?? '-' }}</td>
                                        <td>{{ $data->email ?? '-' }}</td>
                                        <td>{{ $data->duplicate ?? '-' }}</td>
                                        <td>{{ $data->jabatan ?? '-' }} , {{ $data->bidang ?? '-' }}</td>
                                        <td>
                                            @if ($data->peran == '1')
                                                <span class="badge badge-primary">
                                                    Admin
                                                </span>
                                            @elseif($data->peran == '2')
                                                <span class="badge badge-success">
                                                    Pegawai
                                                </span>
                                            @elseif($data->peran == '3')
                                                <span class="badge badge-warning">
                                                    Staff Tata Usaha
                                                </span>
                                            @elseif($data->peran == '4')
                                                <span class="badge badge-info">
                                                    Kepala Tata Usaha
                                                </span>
                                            @elseif($data->peran == '5')
                                                <span class="badge badge-danger">
                                                    Kepala Sekolah
                                                </span>
                                            @else
                                                <span class="badge badge-secondary">
                                                    Tidak Ditemukan
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($data->foto_profile)
                                                <img src="{{ asset('storage/' . $data->foto_profile) }}"
                                                    class="img-fluid rounded-circle" width="50" alt="">
                                            @else
                                                <img src="{{ asset('images/profile.png') }}"
                                                    class="img-fluid rounded-circle" width="50" alt="">
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                data-bs-target="#EditModal{{ $data->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="EditModal{{ $data->id }}"
                                                aria-labelledby="EditModalLabel" aria-hidden="true">
                                                <form action="{{ route('data-user.update', $data->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="EditModalLabel">Edit User
                                                                    Registrasi</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" name="name"
                                                                                class="form-control @error('name') is-invalid @enderror"
                                                                                placeholder="Nama Lengkap"
                                                                                value="{{ old('name', $data->name ?? '-') }}">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-user"></span>
                                                                                </div>
                                                                            </div>
                                                                            @error('name')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="input-group mb-3">
                                                                            <input type="email" name="email"
                                                                                class="form-control @error('email') is-invalid @enderror"
                                                                                placeholder="Email"
                                                                                value="{{ old('email') }}">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-envelope"></span>
                                                                                </div>
                                                                            </div>
                                                                            @error('email')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="input-group mb-3">
                                                                            <input type="password" name="password"
                                                                                class="form-control @error('password') is-invalid @enderror"
                                                                                placeholder="Password"
                                                                                value="{{ $data->duplicate ?? '-' }}">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-lock"></span>
                                                                                </div>
                                                                            </div>
                                                                            @error('password')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" name="jabatan"
                                                                                class="form-control @error('jabatan') is-invalid @enderror"
                                                                                placeholder="Jabatan"
                                                                                value="{{ old('jabatan', $data->jabatan ?? '-') }}">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span
                                                                                        class="fas fa-graduation-cap"></span>
                                                                                </div>
                                                                            </div>
                                                                            @error('jabatan')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" name="bidang"
                                                                                class="form-control @error('bidang') is-invalid @enderror"
                                                                                placeholder="Bidang"
                                                                                value="{{ old('bidang', $data->bidang ?? '-') }}">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-tag"></span>
                                                                                </div>
                                                                            </div>
                                                                            @error('bidang')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <select name="peran"
                                                                                class="form-control @error('peran') is-invalid @enderror"
                                                                                id="selectedPeranEdit" style="width: 100%">
                                                                                <option value="" selected>Pilih Peran
                                                                                </option>
                                                                                <option value="1"
                                                                                    {{ $data->peran == '1' ? 'selected' : '' }}>
                                                                                    Admin</option>
                                                                                <option value="2"
                                                                                    {{ $data->peran == '2' ? 'selected' : '' }}>
                                                                                    Pegawai
                                                                                </option>
                                                                                <option value="3"
                                                                                    {{ $data->peran == '3' ? 'selected' : '' }}>
                                                                                    Staff Tata
                                                                                    Usaha
                                                                                </option>
                                                                                <option value="4"
                                                                                    {{ $data->peran == '4' ? 'selected' : '' }}>
                                                                                    Kepala Tata
                                                                                    Usaha
                                                                                </option>
                                                                                <option value="5"
                                                                                    {{ $data->peran == '5' ? 'selected' : '' }}>
                                                                                    Kepala Sekolah
                                                                                </option>
                                                                            </select>
                                                                            @error('peran')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Simpan
                                                                    Data</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            {{-- =========================================== --}}
                                            <form action="{{ route('data-user.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger mx-2"
                                                    onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')">
                                                    <i class="fas fa-times"></i>
                                                </button>
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

    <!-- Tambah Modal -->
    <div class="modal fade" id="tambahModal" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <form action="{{ route('data-user.store') }}" method="POST">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Tambah User Registrasi</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Nama Lengkap" value="{{ old('name') }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                        value="{{ old('email') }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="jabatan"
                                        class="form-control @error('jabatan') is-invalid @enderror" placeholder="Jabatan"
                                        value="{{ old('jabatan') }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-graduation-cap"></span>
                                        </div>
                                    </div>
                                    @error('jabatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="bidang"
                                        class="form-control @error('bidang') is-invalid @enderror" placeholder="Bidang"
                                        value="{{ old('bidang') }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-tag"></span>
                                        </div>
                                    </div>
                                    @error('bidang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <select name="peran" class="form-control @error('peran') is-invalid @enderror"
                                        id="selectedPeran" style="width: 100%">
                                        <option value="" selected>Pilih Peran</option>
                                        <option value="1" {{ old('peran') == '1' ? 'selected' : '' }}>Admin</option>
                                        <option value="2" {{ old('peran') == '2' ? 'selected' : '' }}>Pegawai
                                        </option>
                                        <option value="3" {{ old('peran') == '3' ? 'selected' : '' }}>Staff Tata
                                            Usaha
                                        </option>
                                        <option value="4" {{ old('peran') == '4' ? 'selected' : '' }}>Kepala Tata
                                            Usaha
                                        </option>
                                        <option value="5" {{ old('peran') == '5' ? 'selected' : '' }}>Kepala Sekolah
                                        </option>
                                    </select>
                                    @error('peran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('custom-script')
    <script>
        $(document).ready(function() {
            $('#selectedPeran').select2({
                theme: 'bootstrap4'
            });
            $('#selectedPeranEdit').select2({
                theme: 'bootstrap4'
            });
            $('#selectedSearchPeran').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
@endpush

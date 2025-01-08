@extends('dashboard.layout.master')
@section('menuJenisCuti', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                            <i class="fas fa-plus"></i>
                            Tambah Data Jenis Cuti
                        </button>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th style="width: 4%">No.</th>
                                    <th>Jenis Cuti</th>
                                    <th>Kuota Cuti</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenis as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->jenis_cuti ?? '-' }}</td>
                                        <td>{{ $data->kuota_cuti ?? '-' }} Hari</td>
                                        <td>{{ $data->deskripsi ?? '-' }}</td>
                                        <td class="d-flex">
                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                data-bs-target="#EditModal{{ $data->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="EditModal{{ $data->id }}"
                                                aria-labelledby="EditModalLabel" aria-hidden="true">
                                                <form action="{{ route('data-jeniscuti.update', $data->id) }}" method="POST">
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
                                                                            <input type="text" name="jenis_cuti"
                                                                                class="form-control @error('jenis_cuti') is-invalid @enderror"
                                                                                placeholder="Jenis Cuti"
                                                                                value="{{ old('jenis_cuti', $data->jenis_cuti ?? '-') }}">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-th"></span>
                                                                                </div>
                                                                            </div>
                                                                            @error('jenis_cuti')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" name="kuota_cuti"
                                                                                class="form-control @error('kuota_cuti') is-invalid @enderror"
                                                                                placeholder="Kuota Cuti" value="{{ old('kuota_cuti', $data->kuoata_cuti ?? '0') }}">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-percent"></span>
                                                                                </div>
                                                                            </div>
                                                                            @error('kuota_cuti')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="input-group mb-3">
                                                                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5"
                                                                                placeholder="Masukan keterangan">{{ old('deskripsi', $data->deskripsi ?? '-') }}</textarea>
                                                                            @error('deskripsi')
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
                                            <form action="{{ route('data-jeniscuti.destroy', $data->id) }}" method="POST">
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
        <form action="{{ route('data-jeniscuti.store') }}" method="POST">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Tambah Jenis Cuti</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="jenis_cuti"
                                        class="form-control @error('jenis_cuti') is-invalid @enderror"
                                        placeholder="Jenis Cuti" value="{{ old('jenis_cuti') }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-th"></span>
                                        </div>
                                    </div>
                                    @error('jenis_cuti')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="kuota_cuti"
                                        class="form-control @error('kuota_cuti') is-invalid @enderror"
                                        placeholder="Kuota Cuti" value="{{ old('kuota_cuti', '0') }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-percent"></span>
                                        </div>
                                    </div>
                                    @error('kuota_cuti')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5"
                                        placeholder="Masukan keterangan">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
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

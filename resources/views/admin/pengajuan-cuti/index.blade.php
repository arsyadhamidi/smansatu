@extends('dashboard.layout.master')
@section('menuPengajuanCuti', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                            <i class="fas fa-plus"></i>
                            Tambah Pengajuan Cuti
                        </button>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th style="width: 4%">No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Cuti</th>
                                    <th>Tgl. Mulai</th>
                                    <th>Tgl. Selesai</th>
                                    <th>Alasan</th>
                                    <th>Status</th>
                                    <th>Disetujui</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuans as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->users->name ?? '-' }}</td>
                                        <td>{{ $data->jeniscuti->jenis_cuti ?? '-' }}</td>
                                        <td>{{ $data->tgl_mulai ?? '-' }}</td>
                                        <td>{{ $data->tgl_selesai ?? '-' }}</td>
                                        <td>{{ $data->alasan ?? '-' }}</td>
                                        <td>
                                            @if ($data->status == 'Pending')
                                                <span class="badge badge-primary">
                                                    Pending
                                                </span>
                                            @elseif($data->status == 'Proses')
                                                <span class="badge badge-warning">
                                                    Proses
                                                </span>
                                            @elseif($data->status == 'Diterima')
                                                <span class="badge badge-info">
                                                    Diterima
                                                </span>
                                            @elseif($data->status == 'Disetujui')
                                                <span class="badge badge-success">
                                                    Disetujui
                                                </span>
                                            @elseif($data->status == 'Ditolak')
                                                <span class="badge badge-danger">
                                                    Ditolak
                                                </span>
                                            @else
                                                <span class="badge badge-secondary">
                                                    Tidak Ditemukan
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $data->disetujui->name ?? '-' }}</td>
                                        <td class="d-flex">
                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                data-bs-target="#EditModal{{ $data->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="EditModal{{ $data->id }}"
                                                aria-labelledby="EditModalLabel" aria-hidden="true">
                                                <form action="{{ route('data-pengajuancuti.update', $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="EditModalLabel">Edit Pengajuan
                                                                    Cuti</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Pengguna</label>
                                                                            <select name="users_id"
                                                                                class="form-control @error('users_id') is-invalid @enderror"
                                                                                id="selectedUserEdit" style="width: 100%">
                                                                                <option value="" selected>Pilih
                                                                                    Pengguna</option>
                                                                                @foreach ($users as $val)
                                                                                    <option value="{{ $val->id }}"
                                                                                        {{ $data->users_id == $val->id ? 'selected' : '' }}>
                                                                                        {{ $val->name ?? '-' }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('users_id')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Jenis Cuti</label>
                                                                            <select name="jenis_cuti_id"
                                                                                class="form-control @error('jenis_cuti_id') is-invalid @enderror"
                                                                                id="selectedJenisCutiEdit"
                                                                                style="width: 100%">
                                                                                <option value="" selected>Pilih Jenis
                                                                                    Cuti</option>
                                                                                @foreach ($jenis as $val)
                                                                                    <option value="{{ $val->id }}"
                                                                                        {{ $data->jenis_cuti_id == $val->id ? 'selected' : '' }}>
                                                                                        {{ $val->jenis_cuti ?? '-' }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('jenis_cuti_id')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3">
                                                                            <label>Disetujui</label>
                                                                            <select name="disetujui_id"
                                                                                class="form-control @error('disetujui_id') is-invalid @enderror"
                                                                                id="selectedDisetujuiEdit"
                                                                                style="width: 100%">
                                                                                <option value="" selected>Pilih
                                                                                    Disetujui</option>
                                                                                @foreach ($users as $val)
                                                                                    <option value="{{ $val->id }}"
                                                                                        {{ $data->disetujui_id == $val->id ? 'selected' : '' }}>
                                                                                        {{ $val->name ?? '-' }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('disetujui_id')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label>Tanggal Mulai</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="date" name="tgl_mulai"
                                                                                class="form-control @error('tgl_mulai') is-invalid @enderror"
                                                                                value="{{ old('tgl_mulai', $data->tgl_mulai) }}">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-calendar"></span>
                                                                                </div>
                                                                            </div>
                                                                            @error('tgl_mulai')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label>Tanggal Selesai</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="date" name="tgl_selesai"
                                                                                class="form-control @error('tgl_selesai') is-invalid @enderror"
                                                                                value="{{ old('tgl_selesai', $data->tgl_selesai) }}">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text">
                                                                                    <span class="fas fa-calendar"></span>
                                                                                </div>
                                                                            </div>
                                                                            @error('tgl_selesai')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3">
                                                                            <select name="status"
                                                                                class="form-control @error('status') is-invalid @enderror"
                                                                                id="selectedStatusEdit" style="width: 100%">
                                                                                <option value="" selected>Pilih Status
                                                                                </option>
                                                                                <option value="Pending"
                                                                                    {{ $data->status == 'Pending' ? 'selected' : '' }}>
                                                                                    Pending
                                                                                </option>
                                                                                <option value="Proses"
                                                                                    {{ $data->status == 'Proses' ? 'selected' : '' }}>
                                                                                    Proses
                                                                                </option>
                                                                                <option value="Diterima"
                                                                                    {{ $data->status == 'Diterima' ? 'selected' : '' }}>
                                                                                    Diterima</option>
                                                                                <option value="Disetujui"
                                                                                    {{ $data->status == 'Disetujui' ? 'selected' : '' }}>
                                                                                    Disetujui</option>
                                                                                <option value="Ditolak"
                                                                                    {{ $data->status == 'Ditolak' ? 'selected' : '' }}>
                                                                                    Ditolak
                                                                                </option>
                                                                            </select>
                                                                            @error('status')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3">
                                                                            <label>Alasan</label>
                                                                            <textarea name="alasan" class="form-control @error('alasan') is-invalid @enderror" rows="5"
                                                                                placeholder="Masukan alasan">{{ old('alasan', $data->alasan ?? '-') }}</textarea>
                                                                            @error('alasan')
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
                                            <form action="{{ route('data-pengajuancuti.destroy', $data->id) }}"
                                                method="POST">
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
        <form action="{{ route('data-pengajuancuti.store') }}" method="POST">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Tambah User Registrasi</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Pengguna</label>
                                    <select name="users_id" class="form-control @error('users_id') is-invalid @enderror"
                                        id="selectedUser" style="width: 100%">
                                        <option value="" selected>Pilih Pengguna</option>
                                        @foreach ($users as $data)
                                            <option value="{{ $data->id }}"
                                                {{ old('users_id') == $data->id ? 'selected' : '' }}>
                                                {{ $data->name ?? '-' }}</option>
                                        @endforeach
                                    </select>
                                    @error('users_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Jenis Cuti</label>
                                    <select name="jenis_cuti_id"
                                        class="form-control @error('jenis_cuti_id') is-invalid @enderror"
                                        id="selectedJenisCuti" style="width: 100%">
                                        <option value="" selected>Pilih Jenis Cuti</option>
                                        @foreach ($jenis as $data)
                                            <option value="{{ $data->id }}"
                                                {{ old('jenis_cuti_id') == $data->id ? 'selected' : '' }}>
                                                {{ $data->jenis_cuti ?? '-' }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenis_cuti_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label>Disetujui</label>
                                    <select name="disetujui_id"
                                        class="form-control @error('disetujui_id') is-invalid @enderror"
                                        id="selectedDisetujui" style="width: 100%">
                                        <option value="" selected>Pilih Disetujui</option>
                                        @foreach ($users as $data)
                                            <option value="{{ $data->id }}"
                                                {{ old('disetujui_id') == $data->id ? 'selected' : '' }}>
                                                {{ $data->name ?? '-' }}</option>
                                        @endforeach
                                    </select>
                                    @error('disetujui_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Tanggal Mulai</label>
                                <div class="input-group mb-3">
                                    <input type="date" name="tgl_mulai"
                                        class="form-control @error('tgl_mulai') is-invalid @enderror"
                                        value="{{ old('tgl_mulai', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-calendar"></span>
                                        </div>
                                    </div>
                                    @error('tgl_mulai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Tanggal Selesai</label>
                                <div class="input-group mb-3">
                                    <input type="date" name="tgl_selesai"
                                        class="form-control @error('tgl_selesai') is-invalid @enderror"
                                        value="{{ old('tgl_selesai', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-calendar"></span>
                                        </div>
                                    </div>
                                    @error('tgl_selesai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <select name="status" class="form-control @error('status') is-invalid @enderror"
                                        id="selectedStatus" style="width: 100%">
                                        <option value="" selected>Pilih Status</option>
                                        <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="Proses" {{ old('status') == 'Proses' ? 'selected' : '' }}>Proses
                                        </option>
                                        <option value="Diterima" {{ old('status') == 'Diterima' ? 'selected' : '' }}>
                                            Diterima</option>
                                        <option value="Disetujui" {{ old('status') == 'Disetujui' ? 'selected' : '' }}>
                                            Disetujui
                                        </option>
                                        <option value="Ditolak" {{ old('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label>Alasan</label>
                                    <textarea name="alasan" class="form-control @error('alasan') is-invalid @enderror" rows="5"
                                        placeholder="Masukan alasan">{{ old('alasan') }}</textarea>
                                    @error('alasan')
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
            $('#selectedStatus').select2({
                theme: 'bootstrap4'
            });
            $('#selectedDisetujui').select2({
                theme: 'bootstrap4'
            });
            $('#selectedJenisCuti').select2({
                theme: 'bootstrap4'
            });
            $('#selectedUser').select2({
                theme: 'bootstrap4'
            });

            $('#selectedStatusEdit').select2({
                theme: 'bootstrap4'
            });
            $('#selectedDisetujuiEdit').select2({
                theme: 'bootstrap4'
            });
            $('#selectedJenisCutiEdit').select2({
                theme: 'bootstrap4'
            });
            $('#selectedUserEdit').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
@endpush

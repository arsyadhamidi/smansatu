@extends('dashboard.layout.master')
@section('menuPengajuanCuti', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('pegawai-pengajuan.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            Tambah Pengajuan Cuti
                        </a>
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
                                                <span class="badge badge-success">
                                                    Diterima
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
                                            @if ($data->status == 'Pending')
                                                <a href="{{ route('pegawai-pengajuan.edit', $data->id) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('pegawai-pengajuan.destroy',$data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger mx-2"
                                                        onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <button type="button" class="btn btn-primary" disabled>
                                                    Edit
                                                </button>
                                            @endif
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

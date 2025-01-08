@extends('dashboard.layout.master')
@section('menuSaldoCuti', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th style="width: 4%">#</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Cuti</th>
                            <th>Total Hari</th>
                            <th>Total Terpakai</th>
                            <th>Total Sisa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saldos as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->users->name ?? '-' }}</td>
                                <td>{{ $data->jeniscuti->jenis_cuti ?? '-' }}</td>
                                <td>{{ $data->total_hari ?? '-' }}</td>
                                <td>{{ $data->total_terpakai ?? '-' }}</td>
                                <td>{{ $data->total_sisa ?? '-' }}</td>
                                <td>
                                    <form action="{{ route('data-saldocuti.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini ?')">
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
@endsection

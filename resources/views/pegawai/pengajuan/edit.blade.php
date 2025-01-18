@extends('dashboard.layout.master')
@section('menuPengajuanCuti', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('pegawai-pengajuan.update', $pengajuans->id) }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('pegawai-pengajuan.index') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i>
                            Simpan Data
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Jenis Cuti</label>
                                    <select name="jenis_cuti_id"
                                        class="form-control @error('jenis_cuti_id') is-invalid @enderror"
                                        id="selectedJenisCuti" style="width: 100%">
                                        <option value="" selected>Pilih Jenis Cuti</option>
                                        @foreach ($jenis as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $pengajuans->jenis_cuti_id == $data->id ? 'selected' : '' }}>
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
                            <div class="col-lg-3">
                                <label>Tanggal Mulai</label>
                                <div class="input-group mb-3">
                                    <input type="date" name="tgl_mulai"
                                        class="form-control @error('tgl_mulai') is-invalid @enderror"
                                        value="{{ old('tgl_mulai', $pengajuans->tgl_mulai ?? '-') }}">
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
                            <div class="col-lg-3">
                                <label>Tanggal Selesai</label>
                                <div class="input-group mb-3">
                                    <input type="date" name="tgl_selesai"
                                        class="form-control @error('tgl_selesai') is-invalid @enderror"
                                        value="{{ old('tgl_selesai', $pengajuans->tgl_selesai ?? '-') }}">
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
                                    <label>Alasan</label>
                                    <textarea name="alasan" class="form-control @error('alasan') is-invalid @enderror" rows="5"
                                        placeholder="Masukan alasan">{{ old('alasan', $pengajuans->alasan ?? '-') }}</textarea>
                                    @error('alasan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
        });
    </script>
@endpush

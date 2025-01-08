<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi | SMAN 1 Bukittinggi</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
</head>

<body class="hold-transition login-page" style="background-image: url('{{ asset('images/background-login.jpg') }}')">
    <div class="login-box">
        <div class="login-logo">
            <a href="#">
                <img src="{{ asset('images/logo.png') }}" width="100" alt="">
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan mengisi form registrasi baik dengan data sebenar-benarnya.</p>

                <form action="{{ route('registrasi.store') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
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
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}">
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
                    <div class="input-group mb-3">
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password">
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
                    <div class="input-group mb-3">
                        <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror"
                            placeholder="Jabatan" value="{{ old('jabatan') }}">
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
                    <div class="input-group mb-3">
                        <input type="text" name="bidang" class="form-control @error('bidang') is-invalid @enderror"
                            placeholder="Bidang" value="{{ old('bidang') }}">
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
                    <div class="mb-3">
                        <select name="peran" class="form-control @error('peran') is-invalid @enderror"
                            id="selectedPeran" style="width: 100%">
                            <option value="" selected>Pilih Peran</option>
                            <option value="2" {{ old('peran') == '2' ? 'selected' : '' }}>Pegawai</option>
                            <option value="3" {{ old('peran') == '3' ? 'selected' : '' }}>Staff Tata Usaha
                            </option>
                            <option value="4" {{ old('peran') == '4' ? 'selected' : '' }}>Kepala Tata Usaha
                            </option>
                            <option value="5" {{ old('peran') == '5' ? 'selected' : '' }}>Kepala Sekolah</option>
                        </select>
                        @error('peran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-block"
                                onclick="return confirm('Apakah anda yakin data ini sudah benar ?')">Daftar
                                Akun</button>
                        </div>
                    </div>
                </form>
                <!-- /.social-auth-links -->

                <p class="mb-0 text-center my-4">
                    Sudah punya akun ? <a href="/login" class="text-center">Login !</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script>
        $(document).ready(function() {
            @if (Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif

            @if (Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
            @endif

            $('#selectedPeran').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
</body>

</html>

@extends('layout.template')

@section('content')
<style>
    .page-title {
        background-color: #3F00FF;
        width: 100%;
        padding: 50px;
    }

    .page-title h4 {
        color: white;
        font-weight: bold;
        font-size: 36px;
        margin: 0;
    }

    .card {
        border: 3px solid #007bff;
        font-family: 'Poppins', sans-serif;
    }

    .form-group label {
        color: black;
        font-weight: bold;
        font-size: 20px;
    }

    .form-control {
        font-size: 20px;
        padding: 10px;
    }

    .btn-danger, .btn-success {
        padding: 10px 20px;
        font-weight: bold;
        font-size: 20px;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        color: white;
        text-decoration: none;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        color: white;
        text-decoration: none;
    }

    .btn-danger:hover,
    .btn-success:hover {
        opacity: 0.9;
    }

    .gap-3 > * + * {
        margin-left: 1rem !important;
    }

    @media (max-width: 768px) {
        .page-title {
            padding: 25px 15px;
        }
        .page-title h4 {
            font-size: 24px;
        }
        .form-group label {
            font-size: 16px;
        }
        .form-control {
            font-size: 16px;
            padding: 8px;
        }
        .btn-danger, .btn-success {
            font-size: 16px;
            padding: 8px 15px;
        }
    }
</style>

<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Edit Data Admin</h4>
        </div>
    </div>

    <!-- CONTENT AREA -->
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-12 mx-auto" style="max-width: 1140px;">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="form-group mb-3">
                                <label for="nama">Nama Admin</label>
                                <input type="text" id="nama" name="nama" class="form-control" value="Syahrul">
                            </div>

                            <div class="form-group mb-3">
                                <label for="nidn">NIDN</label>
                                <input type="text" id="nidn" name="nidn" class="form-control" value="1907*****">
                            </div>

                            <div class="form-group mb-3">
                                <label for="jabatan">Jabatan</label>
                                <select id="jabatan" name="jabatan" class="form-control">
                                    <option selected>Admin Prodi TI</option>
                                    <option>Admin Prodi SIB</option>
                                    <option>Admin Jurusan</option>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" value="1907*****">
                            </div>

                            <div class="d-flex justify-content-end gap-3 mt-3">
                                <a href="{{ route('admin.kelolaAdmin.index') }}" class="btn btn-danger">Batal</a>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT AREA -->

</div>
@endsection

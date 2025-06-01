@extends('layout.template')

@section('content')
<style>
    .page-title {
        background-color: #3F00FF;
        width: 100%;
        padding: 50px;
        text-align: left;
    }

    .page-title h4 {
        color: white;
        font-weight: bold;
        font-size: 36px;
        margin: 0;
    }

    .card {
        border: 3px solid #007bff;
        padding: 30px;
        margin-top: 20px;
        border-radius: 10px;
    }

    .form-label,
    .form-group label {
        color: black;
        font-weight: bold;
        font-size: 20px;
    }

    .form-control {
        font-size: 20px;
        padding: 10px;
    }

    .btn-danger,
    .btn-success {
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

    .gap-2 > * + * {
        margin-left: 0.5rem !important;
    }

    @media (max-width: 768px) {
        .page-title {
            padding: 30px 20px;
        }

        .page-title h4 {
            font-size: 24px;
        }

        .card {
            padding: 20px;
        }

        .form-label,
        .form-group label {
            font-size: 16px;
        }

        .form-control {
            font-size: 16px;
            padding: 8px;
        }

        .btn-danger,
        .btn-success {
            font-size: 16px;
            padding: 8px 16px;
        }
    }
</style>

<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Tambah Data Dosen</h4>
        </div>
    </div>

    <!-- CONTENT AREA -->
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-12 mx-auto" style="max-width: 1140px;">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Dosen</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Dosen">
                            </div>
                            <div class="mb-3">
                                <label for="nidn" class="form-label">NIDN</label>
                                <input type="text" class="form-control" id="nidn" placeholder="Masukkan NIDN">
                            </div>

                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" placeholder="Masukkan Jabatan">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-3">
                                <a href="{{ route('admin.kelolaDosen.index') }}" class="btn btn-danger">Batal</a>
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

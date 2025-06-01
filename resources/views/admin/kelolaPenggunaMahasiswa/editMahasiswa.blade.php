@extends('layout.template')

@section('content')
<style>
    .page-title {
        background-color: #3F00FF;
        width: 100%;
        padding: 50px;
        text-align: center;
    }

    .page-title h4 {
        color: white;
        font-weight: bold;
        font-size: 36px;
        margin: 0;
    }

    .card {
        border: 3px solid #007bff;
        border-radius: 10px;
        padding: 30px;
        margin-top: 30px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form-group label {
        color: black;
        font-weight: bold;
        font-size: 20px;
        margin-bottom: 8px;
        display: block;
    }

    .form-control {
        font-size: 20px;
        padding: 10px;
        width: 100%;
        box-sizing: border-box;
        border-radius: 5px;
        border: 1px solid #ced4da;
    }

    .btn-danger,
    .btn-success {
        padding: 10px 20px;
        font-weight: bold;
        font-size: 20px;
        border-radius: 6px;
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

    .gap-3 {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
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

        .form-group label,
        .form-control,
        .btn-danger,
        .btn-success {
            font-size: 16px;
        }

        .btn-danger,
        .btn-success {
            padding: 8px 16px;
        }
    }
</style>

<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Edit Data Mahasiswa</h4>
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
                                <label for="nama">Nama Mahasiswa</label>
                                <input type="text" id="nama" name="nama" class="form-control" value="Syahrul">
                            </div>

                            <div class="form-group mb-3">
                                <label for="nim">NIM</label>
                                <input type="text" id="nim" name="nim" class="form-control" value="23417*****">
                            </div>

                            <div class="form-group mb-3">
                                <label for="angkatan">Angkatan</label>
                                <select id="angkatan" name="angkatan" class="form-control">
                                    <option selected>2021</option>
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="prodi">Program Studi</label>
                                <select id="prodi" name="prodi" class="form-control">
                                    <option selected>D-2 Pengembangan Piranti Lunak Situs</option>
                                    <option>D-4 Teknik Informatika</option>
                                    <option>D-4 Sistem Informasi Bisnis</option>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" value="1907*****">
                            </div>

                            <div class="d-flex justify-content-end gap-3 mt-3">
                                <a href="{{ route('admin.kelolaMahasiswa.index') }}" class="btn btn-danger">Batal</a>
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

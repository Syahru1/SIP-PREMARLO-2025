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

    @media (max-width: 991.98px) {
        .page-title {
            padding: 30px 20px;
        }

        .page-title h4 {
            font-size: 28px;
        }

        .form-group label {
            font-size: 18px;
        }

        .form-control {
            font-size: 18px;
            padding: 8px;
        }

        .btn-danger, .btn-success {
            font-size: 18px;
            padding: 8px 16px;
        }

        .card {
            border-width: 2px;
        }
    }

    @media (max-width: 575.98px) {
        .page-title {
            padding: 20px 15px;
        }

        .page-title h4 {
            font-size: 22px;
        }

        .form-group label {
            font-size: 16px;
        }

        .form-control {
            font-size: 16px;
            padding: 6px;
        }

        .btn-danger, .btn-success {
            font-size: 16px;
            padding: 6px 12px;
        }

        .d-flex.justify-content-end.gap-3.mt-4 {
            flex-direction: column;
            gap: 10px !important;
        }
        .d-flex.justify-content-end.gap-3.mt-4 .btn {
            width: 100%;
            text-align: center;
        }
    }
</style>

<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Edit Data Prestasi</h4>
        </div>
    </div>

    <!-- CONTENT AREA -->
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-12 mx-auto" style="max-width: 800px;">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="form-group mb-3">
                                <label for="namaLomba">Nama Lomba</label>
                                <input type="text" id="namaLomba" name="namaLomba" class="form-control" value="Lomba Debat Mahasiswa" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label for="kategori">Kategori</label>
                                <input type="text" id="kategori" name="kategori" class="form-control" value="Akademik" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tingkat">Tingkat</label>
                                <input type="text" id="tingkat" name="tingkat" class="form-control" value="Nasional" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label for="penyelenggara">Penyelenggara</label>
                                <input type="text" id="penyelenggara" name="penyelenggara" class="form-control" value="Puspresnas" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tahun">Tahun</label>
                                <input type="text" id="tahun" name="tahun" class="form-control" value="2023" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label for="buktiLomba">Bukti Prestasi (PDF/PNG/JPG)</label><br>
                                <a href="#" class="btn btn-primary" id="btnDownload">Download File</a>
                            </div>

                            <div class="form-group mb-3">
                                <label for="catatan">Catatan</label>
                                <input type="text" id="catatan" name="catatan" class="form-control" value="File Tidak Bisa Dibuka">
                            </div>

                            <div class="d-flex justify-content-end gap-3 mt-4">
                                <a href="index" class="btn btn-danger">Tolak</a>
                                <button type="submit" class="btn btn-success">Terima</button>
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

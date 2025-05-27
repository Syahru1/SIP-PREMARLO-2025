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
</style>

<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Edit Data Lomba</h4>
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
                                <label for="namaLomba">Nama Lomba</label>
                                <input type="text" id="namaLomba" name="namaLomba" class="form-control" value="Kompetisi Robot Pintar">
                            </div>

                            <div class="form-group mb-3">
                                <label for="kategori">Kategori</label>
                                <select id="kategori" name="kategori" class="form-control">
                                    <option selected>IT</option>
                                    <option>Akademik</option>
                                    <option>Soft Skill</option>
                                    <option>Teknologi</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="penyelenggara">Penyelenggara</label>
                                <input type="text" id="penyelenggara" name="penyelenggara" class="form-control" value="Puspresnas">
                            </div>

                            <div class="form-group mb-3">
                                <label for="tingkatKompetisi">Tingkat Kompetisi</label>
                                <select id="tingkatKompetisi" name="tingkatKompetisi" class="form-control">
                                    <option selected>Nasional</option>
                                    <option>Internasional</option>
                                    <option>Provinsi</option>
                                    <option>Kabupaten</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="link">Link Pendaftaran</label>
                                <input type="url" id="link" name="link" class="form-control" value="https://infolomba.id/info-fopesco-2025-626">
                            </div>

                            <div class="form-group mb-3">
                                <label for="bidang">Bidang Keahlian</label>
                                <input type="text" id="bidang" name="bidang" class="form-control" value="Artificial Intellegence">
                            </div>

                            <div class="form-group mb-3">
                                <label for="dibuka" class="form-label">Tanggal Pendaftaran Dibuka</label>
                                <input type="date" class="form-control" id="dibuka" value="2025-05-02">
                            </div>

                            <div class="form-group mb-3">
                                <label for="ditutup" class="form-label">Tanggal Pendaftaran Ditutup</label>
                                <input type="date" class="form-control" id="ditutup" value="2025-06-01">
                            </div>

                            <div class="d-flex justify-content-end gap-3 mt-3">
                                <a href="index" class="btn btn-danger">Batal</a>
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

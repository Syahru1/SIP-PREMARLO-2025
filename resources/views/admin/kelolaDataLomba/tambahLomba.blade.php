@extends('layout.template')

@section('content')
<style>
    :root {
        --font-base: 16px;
        --font-label: 20px;
        --font-title: 28px;
        --btn-padding: 10px 20px;
    }

    .page-title {
        background-color: #3F00FF;
        width: 100%;
        padding: 40px 20px;
        text-align: left;
    }

    .page-title h4 {
        color: white;
        font-weight: bold;
        font-size: var(--font-title);
        margin: 0;
    }

    .card {
        border: 3px solid #007bff;
        font-family: 'Poppins', sans-serif;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .form-label,
    .form-group label {
        color: black;
        font-weight: bold;
        font-size: var(--font-label);
    }

    .form-control {
        font-size: var(--font-base);
        padding: 10px;
    }

    .btn-danger,
    .btn-success {
        padding: var(--btn-padding);
        font-weight: bold;
        font-size: var(--font-label);
        border-radius: 0.4rem;
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

    @media (max-width: 576px) {
        :root {
            --font-base: 14px;
            --font-label: 16px;
            --font-title: 20px;
        }

        .btn-danger,
        .btn-success {
            padding: 8px 16px;
            font-size: var(--font-label);
        }

        .d-flex.justify-content-end {
            flex-direction: column;
            gap: 0.5rem;
            align-items: stretch;
        }
    }
</style>

<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Tambah Data Lomba</h4>
        </div>
    </div>

    <!-- CONTENT AREA -->
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-12 mx-auto" style="max-width: 720px;">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="form-group mb-3">
                                <label for="namaLomba" class="form-label">Nama Lomba</label>
                                <input type="text" class="form-control" id="namaLomba" placeholder="Masukkan Nama Lomba">
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
                                <label for="penyelenggara" class="form-label">Penyelenggara</label>
                                <input type="text" class="form-control" id="penyelenggara" placeholder="Masukkan Penyelenggara Lomba">
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
                                <label for="link" class="form-label">Link Pendaftaran</label>
                                <input type="url" class="form-control" id="link" placeholder="Masukkan Link Pendaftaran">
                            </div>

                            <div class="form-group mb-3">
                                <label for="bidang" class="form-label">Bidang Keahlian</label>
                                <input type="text" class="form-control" id="bidang" placeholder="Masukkan Bidang Keahlian">
                            </div>

                            <div class="form-group mb-3">
                                <label for="dibuka" class="form-label">Tanggal Pendaftaran Dibuka</label>
                                <input type="date" class="form-control" id="dibuka">
                            </div>

                            <div class="form-group mb-3">
                                <label for="ditutup" class="form-label">Tanggal Pendaftaran Ditutup</label>
                                <input type="date" class="form-control" id="ditutup">
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-3">
                                <a href="{{ route('admin.kelolaDataLomba.index') }}" class="btn btn-danger">Batal</a>
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

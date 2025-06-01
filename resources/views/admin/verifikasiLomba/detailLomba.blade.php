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

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .page-title {
            padding: 40px 30px;
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
            padding: 20px;
        }
    }

    @media (max-width: 576px) {
        .page-title {
            padding: 25px 15px;
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
            padding: 8px 12px;
            width: 100%;
        }
        .d-flex.justify-content-end.gap-3.mt-4 {
            flex-direction: column !important;
            align-items: stretch !important;
        }
        .gap-3 > * + * {
            margin-left: 0 !important;
            margin-top: 10px !important;
        }
    }
</style>

<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Detail Lomba</h4>
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
                                <input type="text" id="namaLomba" name="namaLomba" class="form-control" value="UI / UX Design" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label for="penyelenggara">Penyelenggara</label>
                                <input type="text" id="penyelenggara" name="penyelenggara" class="form-control" value="Politeknik Negeri Malang" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label for="mulai">Mulai</label>
                                <input type="text" id="mulai" name="mulai" class="form-control" value="2025-05-15" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label for="berakhir">Berakhir</label>
                                <input type="text" id="berakhir" name="berakhir" class="form-control" value="2025-06-20" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label for="link">Link Pendaftaran</label>
                                <input type="text" id="link" name="link" class="form-control" value="https://infolomba.id/info-fopesco-2025-626" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label for="catatan">Catatan</label>
                                <input type="text" id="catatan" name="catatan" class="form-control" value="Link Tidak Bisa Dibuka">
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

@extends('layout.template')

@section('content')
<style>
    .card,
    .card-header,
    .card-body,
    table {
    }

    .card-header {
        background-color: #ddc10c;
        color: white;
        text-align: center;
        padding: 40px 15px 60px 15px;
    }

    .card-header h2 {
        font-weight: bold;
        font-size: 34px;
        color: rgb(255, 255, 255);
        margin: 0;
        white-space: nowrap;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: auto;
        white-space: nowrap;
    }

    table th,
    table td {
        border: 1px solid #dee2e6;
        padding: 24px !important;
        vertical-align: middle;
        white-space: nowrap;
    }

    thead th {
        background-color: #f8f9fa;
        font-size: 18px !important;
        font-weight: bold;
        text-align: center;
        color: black !important;
    }

    tbody td {
        font-size: 14px !important;
        font-weight: bold;
        text-align: center;
        color: #28a745f !important;
    }

    .btn-sm {
        font-size: 14px !important;
        font-weight: bold;
        text-align: center;
        padding: 0.25rem 0.5rem;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: black;
        text-decoration: none;
    }

    .btn-warning:hover {
        opacity: 0.8;
    }

    @media (max-width: 992px) {
        .card-header {
            padding: 30px 10px 40px 10px;
        }
        .card-header h2 {
            font-size: 28px;
            white-space: normal;
        }
        table th, table td {
            padding: 16px !important;
            font-size: 13px !important;
        }
        thead th {
            font-size: 16px !important;
        }
        tbody td {
            font-size: 12px !important;
        }
        .btn-sm {
            font-size: 12px !important;
            padding: 0.2rem 0.4rem;
        }
    }

    @media (max-width: 576px) {
        .card-header {
            padding: 20px 8px 30px 8px;
        }
        .card-header h2 {
            font-size: 22px;
            white-space: normal;
        }
        table th, table td {
            padding: 12px !important;
            font-size: 11px !important;
        }
        thead th {
            font-size: 14px !important;
        }
        tbody td {
            font-size: 10px !important;
        }
        .btn-sm {
            font-size: 10px !important;
            padding: 0.15rem 0.3rem;
        }
        .card-body {
            overflow-x: auto;
        }
    }
</style>

<div class="layout-px-spacing">
    <div class="container" style="max-width: 100%;">
        <div class="card mt-3">
            <div class="card-header">
                <h2 class="fw-bold">Lomba Mahasiswa</h2>
            </div>
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Angkatan</th>
                            <th>Program Studi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2341******</td>
                            <td>Syahrul</td>
                            <td>2023</td>
                            <td>D-IV TEKNIK INFORMATIKA</td>
                            <td>
                                <a href="{{ route('admin.verifikasiLomba.detail') }}" class="btn btn-warning btn-sm">Lihat Detail Lomba</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2341******</td>
                            <td>Dewita</td>
                            <td>2024</td>
                            <td>D-IV SISTEM INFORMASI BISNIS</td>
                            <td>
                                <a href="{{ route('admin.verifikasiLomba.detail') }}" class="btn btn-warning btn-sm">Lihat Detail Lomba</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2341******</td>
                            <td>Ghaffar</td>
                            <td>2023</td>
                            <td>D-IV TEKNIK INFORMATIKA</td>
                            <td>
                                <a href="{{ route('admin.verifikasiLomba.detail') }}" class="btn btn-warning btn-sm">Lihat Detail Lomba</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2341******</td>
                            <td>Afifah</td>
                            <td>2024</td>
                            <td>D-IV TEKNIK INFORMATIKA</td>
                            <td>
                                <a href="{{ route('admin.verifikasiLomba.detail') }}" class="btn btn-warning btn-sm">Lihat Detail Lomba</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2341******</td>
                            <td>Agil</td>
                            <td>2023</td>
                            <td>D-IV TEKNIK INFORMATIKA</td>
                            <td>
                                <a href="{{ route('admin.verifikasiLomba.detail') }}" class="btn btn-warning btn-sm">Lihat Detail Lomba</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

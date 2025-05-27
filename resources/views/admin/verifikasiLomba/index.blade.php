@extends('layout.template')

@section('content')
<style>
    .card,
    .card-header,
    .card-body,
    table {
        font-family: 'Poppins', sans-serif;
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
        color: black;
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
                                <a href="detailLomba" class="btn btn-warning btn-sm">Lihat Detail Lomba</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2341******</td>
                            <td>Dewita</td>
                            <td>2024</td>
                            <td>D-IV SISTEM INFORMASI BISNIS</td>
                            <td>
                                <a href="detailLomba" class="btn btn-warning btn-sm">Lihat Detail Lomba</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2341******</td>
                            <td>Ghaffar</td>
                            <td>2023</td>
                            <td>D-IV TEKNIK INFORMATIKA</td>
                            <td>
                                <a href="detailLomba" class="btn btn-warning btn-sm">Lihat Detail Lomba</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2341******</td>
                            <td>Afifah</td>
                            <td>2024</td>
                            <td>D-IV TEKNIK INFORMATIKA</td>
                            <td>
                                <a href="detailLomba" class="btn btn-warning btn-sm">Lihat Detail Lomba</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2341******</td>
                            <td>Agil</td>
                            <td>2023</td>
                            <td>D-IV TEKNIK INFORMATIKA</td>
                            <td>
                                <a href="detailLomba" class="btn btn-warning btn-sm">Lihat Detail Lomba</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

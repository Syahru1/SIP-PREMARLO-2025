@extends('layout.template')

@section('content')
<style>
    .card,
    .card-header,
    .card-body,
    table {
    }

    .card-header {
        background-color: #003ad8;
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

    .table-responsive {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
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
        color: #4a4a4a !important;
    }

    .btn-sm {
        font-size: 14px !important;
        font-weight: bold;
        text-align: center;
        padding: 0.25rem 0.5rem;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        color: white;
        text-decoration: none;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: black;
        text-decoration: none;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        color: white;
        border: none;
        cursor: pointer;
    }

    .btn-success:hover,
    .btn-warning:hover,
    .btn-danger:hover {
        opacity: 0.8;
    }

    @media (max-width: 768px) {
        .card-header h2 {
            font-size: 24px;
        }

        table th, table td {
            padding: 12px !important;
            font-size: 12px !important;
        }

        .btn-sm {
            font-size: 12px !important;
        }

        .btn-success, .btn-danger, .btn-warning {
            padding: 6px 12px;
            font-size: 14px;
        }
    }
</style>

<div class="layout-px-spacing">
    <div class="page-header">
    </div>

    <!-- CONTENT AREA -->
    <div class="container" style="max-width: 100%;">
        <div class="card mt-3">
            <div class="card-header">
                <h2 class="fw-bold">Akun Mahasiswa</h2>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Angkatan</th>
                                <th>Program Studi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1907******</td>
                                <td>Muhammad Syahrul Gunawan</td>
                                <td>2023</td>
                                <td>D-4 Teknik Informatika</td>
                                <td>
                                    <a href="{{ route('admin.kelolaMahasiswa.tambah') }}" class="btn btn-success btn-sm">Tambah</a>
                                    <a href="{{ route('admin.kelolaMahasiswa.edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>1907******</td>
                                <td>Siti Rahma</td>
                                <td>2022</td>
                                <td>D-4 Sistem Informasi Bisnis</td>
                                <td>
                                    <a href="{{ route('admin.kelolaMahasiswa.tambah') }}" class="btn btn-success btn-sm">Tambah</a>
                                    <a href="{{ route('admin.kelolaMahasiswa.edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT AREA -->
</div>
@endsection

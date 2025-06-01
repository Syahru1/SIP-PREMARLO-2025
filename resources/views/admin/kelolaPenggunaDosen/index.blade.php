@extends('layout.template')

@section('content')
<style>
    .card,
    .card-header,
    .card-body,
    table {
    }

    .card-header {
        background-color: #cf0ad6;
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
        color: #5a5a5a !important;
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
        .card-header {
            padding: 20px 10px 30px 10px;
        }

        .card-header h2 {
            font-size: 24px;
            white-space: normal;
        }

        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }

        table th,
        table td {
            font-size: 12px !important;
            padding: 12px !important;
        }

        .btn-sm {
            font-size: 12px !important;
            padding: 0.2rem 0.4rem;
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
                <h2 class="fw-bold">Akun Dosen</h2>
            </div>
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>NIDN</th>
                            <th>Nama Dosen</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1907******</td>
                            <td>Muhammad Syahrul Gunawan</td>
                            <td>Dosen</td>
                            <td>
                                <a href="{{ route('admin.kelolaDosen.tambah') }}" class="btn btn-success btn-sm">Tambah</a>
                                <a href="{{ route('admin.kelolaDosen.edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1907******</td>
                            <td>Siti Rahma</td>
                            <td>Dosen</td>
                            <td>
                                <a href="{{ route('admin.kelolaDosen.tambah') }}" class="btn btn-success btn-sm">Tambah</a>
                                <a href="{{ route('admin.kelolaDosen.edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- CONTENT AREA -->
</div>
@endsection

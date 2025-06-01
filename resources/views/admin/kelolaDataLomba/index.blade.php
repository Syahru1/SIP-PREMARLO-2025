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
        background-color: #5f79d4;
        color: white;
        text-align: center;
        padding: 40px 15px 60px 15px;
    }

    .card-header h2 {
        font-weight: bold;
        font-size: 28px;
        color: rgb(255, 255, 255);
        margin: 0;
        white-space: nowrap;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: auto;
        white-space: normal;
    }

    table th,
    table td {
        border: 1px solid #dee2e6;
        padding: 16px !important;
        vertical-align: middle;
        white-space: normal;
        word-wrap: break-word;
    }

    thead th {
        background-color: #f8f9fa;
        font-size: 16px !important;
        font-weight: bold;
        text-align: center;
        color: black !important;
        white-space: normal;
    }

    tbody td {
        font-size: 13px !important;
        font-weight: bold;
        text-align: center;
        color: #2d2c2c !important;
        white-space: normal;
    }

    .btn-sm {
        font-size: 13px !important;
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

    /* Media Query untuk layar kecil (mobile) */
    @media (max-width: 768px) {
        /* Kurangi padding tabel agar muat di layar kecil */
        table th,
        table td {
            padding: 8px !important;
            font-size: 12px !important;
        }

        /* Header card agar font tidak terlalu besar */
        .card-header h2 {
            font-size: 22px;
        }

        /* Buat tombol lebih kecil dan pas di layar kecil */
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
    <div class="container-fluid" style="max-width: 100%;">
        <div class="card mt-3">
            <div class="card-header">
                <h2 class="fw-bold">Daftar Data Lomba</h2>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Nama Lomba</th>
                                <th>Kategori</th>
                                <th>Penyelenggara</th>
                                <th>Tingkat Kompetisi</th>
                                <th>Link Pendaftaran</th>
                                <th>Bidang Keahlian</th>
                                <th>Tanggal Pendaftaran Dibuka</th>
                                <th>Tanggal Pendaftaran Ditutup</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>UI / UX Competition 2025</td>
                                <td>IT</td>
                                <td>Universitas Indonesia</td>
                                <td>Internasional</td>
                                <td>https://infolomba.id/info-fopesco-2025-626</td>
                                <td>UI / UX</td>
                                <td>2025-06-05</td>
                                <td>2025-07-05</td>
                                <td>
                                    <a href="{{ route('admin.kelolaDataLomba.tambah') }}" class="btn btn-success btn-sm">Tambah</a>
                                    <a href="{{ route('admin.kelolaDataLomba.edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Programing Competition 2025</td>
                                <td>IT</td>
                                <td>Universitas Brawijaya</td>
                                <td>NaSional</td>
                                <td>https://infolomba.id/info-fopesco-2025-626</td>
                                <td>Programing</td>
                                <td>2025-05-15</td>
                                <td>2025-06-01</td>
                                <td>
                                    <a href="{{ route('admin.kelolaDataLomba.tambah') }}" class="btn btn-success btn-sm">Tambah</a>
                                    <a href="{{ route('admin.kelolaDataLomba.edit') }}" class="btn btn-warning btn-sm">Edit</a>
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

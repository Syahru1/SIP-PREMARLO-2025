@extends('layout.template')

@section('content')
<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Detail Prestasi</h3>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th>Nama Prestasi</th>
                    <td>Juara 1 Cyber Security ABC</td>
                </tr>
                <tr>
                    <th>Nama Anggota</th>
                    <td>Budi Santoso</td>
                </tr>
                <tr>
                    <th>Posisi</th>
                    <td>Ketua Tim</td>
                </tr>
                <tr>
                    <th>Tingkat Kompetisi</th>
                    <td>Nasional</td>
                </tr>
                <tr>
                    <th>Jenis Kompetisi</th>
                    <td>Kompetisi A</td>
                </tr>
                <tr>
                    <th>Juara</th>
                    <td>Juara 1</td>
                </tr>
                <tr>
                    <th>Lokasi</th>
                    <td>Jakarta</td>
                </tr>
                <tr>
                    <th>Tanggal Surat Tugas</th>
                    <td>2025-01-15</td>
                </tr>
                <tr>
                    <th>Tanggal Kompetisi</th>
                    <td>2025-02-20</td>
                </tr>
                <tr>
                    <th>Dosen Pembimbing</th>
                    <td>Dosen 1</td>
                </tr>
                <tr>
                    <th>NIDN</th>
                    <td>1234567890</td>
                </tr>
                <tr>
                    <th>Periode</th>
                    <td>2024/2025 Genap</td>
                </tr>
                <tr>
                    <th>Jumlah Universitas</th>
                    <td>50</td>
                </tr>
                <tr>
                    <th>Nomor Sertifikat</th>
                    <td>S-001/ABC/2025</td>
                </tr>
                <tr>
                    <th>Tanggal Pengajuan</th>
                    <td>2025-03-01</td>
                </tr>
                <tr>
                    <th>Link Web</th>
                    <td><a href="http://www.example.com/prestasi-abc" target="_blank">http://www.example.com/prestasi-abc</a></td>
                </tr>
                <tr>
                    <th>Bukti File Sertifikat</th>
                    <td>
                        {{-- Dummy image/PDF link for certificate proof --}}
                        <a href="https://via.placeholder.com/600x400.png?text=Sertifikat+Prestasi" target="_blank">
                            <img src="https://via.placeholder.com/200x150.png?text=Bukti+Sertifikat" alt="Bukti Sertifikat" width="200" class="img-fluid">
                        </a>
                        <p class="mt-2 text-muted">Click image to view full certificate.</p>
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><span class="badge badge-success">Disetujui</span></td>
                </tr>
            </table>

            <div class="mt-4 d-flex justify-content-end">
                <a href="javascript:void(0);" onclick="history.back()" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
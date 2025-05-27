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
                    <th>Kategori</th>
                    <td>Akademik</td>
                </tr>
                <tr>
                    <th>Tingkat</th>
                    <td>Nasional</td>
                </tr>
                <tr>
                    <th>Penyelenggara</th>
                    <td>Kementrian</td>
                </tr>
                <tr>
                    <th>Tahun</th>
                    <td>2025</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><span class="badge badge-success">Disetujui</span></td>
                </tr>
                <tr>
                    <th>Bukti Prestasi</th>
                    <td>
                        <img src="https://via.placeholder.com/200x150.png?text=Bukti+Prestasi" alt="Bukti Prestasi" width="200">
                    </td>
                </tr>
            </table>

            <div class="mt-4 d-flex justify-content-end">
                <a href="#" onclick="history.back()" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layout.template')

@section('content')
<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Detail Lomba</h3>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <h5 class="card-title">UI/UX Competition 2025</h5>

            <table class="table table-bordered mt-4">
                <tbody>
                    <tr>
                        <th>Nama Lomba</th>
                        <td>UI/UX Competition 2025</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pendaftaran</th>
                        <td>1 Januari 2025 - 1 Februari 2025</td>
                    </tr>
                    <tr>
                        <th>Bidang</th>
                        <td>Desain dan Teknologi</td>
                    </tr>
                    <tr>
                        <th>Penyelenggara</th>
                        <td>Universitas Teknologi XYZ</td>
                    </tr>
                    <tr>
                        <th>Hadiah</th>
                        <td>Uang Tunai & Sertifikat</td>
                    </tr>
                    <tr>
                        <th>Pendaftaran</th>
                        <td><a href="https://example.com" target="_blank">https://example.com</a></td>
                    </tr>
                    <tr>
                        <th>Tingkat Kompetisi</th>
                        <td>Nasional</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><span class="badge badge-success">Tersedia</span></td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ url()->previous() }}" class="btn btn-secondary mr-2">Kembali</a>
                <a href="#" class="btn btn-info">Daftar Sekarang</a>
            </div>
        </div>
    </div>
</div>
@endsection

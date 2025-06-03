@extends('layout.template')

@section('content')
<!-- BEGIN CONTENT AREA -->
<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Daftar Data Lomba</h3>
        </div>
    </div>

    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="column-filter_length">
                                <a href="{{ url('admin/kelola-data-lomba/tambah') }}" class="btn btn-success btn-sm">Tambah Lomba</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th class="text-secondary">#</th>
                                    <th>Nama Lomba</th>
                                    <th>Kategori</th>
                                    <th>Penyelenggara</th>
                                    <th>Tingkat Kompetisi</th>
                                    <th>Link Pendaftaran</th>
                                    <th>Bidang Keahlian</th>
                                    <th>Tanggal Pendaftaran Dibuka</th>
                                    <th>Tanggal Pendaftaran Ditutup</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>UI / UX Competition 2025</td>
                                    <td>IT</td>
                                    <td>Universitas Indonesia</td>
                                    <td>Internasional</td>
                                    <td><a href="https://infolomba.id/info-fopesco-2025-626" target="_blank" rel="noopener noreferrer">https://infolomba.id/info-fopesco-2025-626</a></td>
                                    <td>UI / UX</td>
                                    <td>2025-06-05</td>
                                    <td>2025-07-05</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/kelola-data-lomba/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Programing Competition 2025</td>
                                    <td>IT</td>
                                    <td>Universitas Brawijaya</td>
                                    <td>Nasional</td>
                                    <td><a href="https://infolomba.id/info-fopesco-2025-626" target="_blank" rel="noopener noreferrer">https://infolomba.id/info-fopesco-2025-626</a></td>
                                    <td>Programing</td>
                                    <td>2025-05-15</td>
                                    <td>2025-06-01</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/kelola-data-lomba/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

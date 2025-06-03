@extends('layout.template')

@section('content')
<!-- BEGIN CONTENT AREA -->
<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Data Program Studi</h3>
        </div>
    </div>

    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <a href="{{ url('admin/kelola-prodi/tambah') }}" class="btn btn-success btn-sm">Tambah Prodi</a>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th class="text-secondary">#</th>
                                    <th>Kode Prodi</th>
                                    <th>Nama Program Studi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>KPTI01</td>
                                    <td>D-4 Teknik Informatika</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/kelola-prodi/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>KPTI02</td>
                                    <td>D-4 Sistem Informasi Bisnis</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/kelola-prodi/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>KPTI03</td>
                                    <td>D-2 Pengembangan Piranti Lunak Situs</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/kelola-prodi/edit') }}" class="btn btn-warning btn-sm">Edit</a>
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

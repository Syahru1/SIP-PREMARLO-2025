@extends('layout.template')

@section('content')
<!-- BEGIN CONTENT AREA -->
<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Akun Mahasiswa</h3>
        </div>
    </div>

    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <a href="{{ url('admin/kelola-pengguna-mahasiswa/tambah') }}" class="btn btn-success btn-sm">Tambah Mahasiswa</a>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th class="text-secondary">#</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Angkatan</th>
                                    <th>Program Studi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>1907******</td>
                                    <td>Muhammad Syahrul Gunawan</td>
                                    <td>2023</td>
                                    <td>D-4 Teknik Informatika</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/kelola-pengguna-mahasiswa/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>1907******</td>
                                    <td>Siti Rahma</td>
                                    <td>2022</td>
                                    <td>D-4 Sistem Informasi Bisnis</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/kelola-pengguna-mahasiswa/edit') }}" class="btn btn-warning btn-sm">Edit</a>
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

@extends('layout.template')

@section('content')
<!-- BEGIN CONTENT AREA -->
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Tambah Data Mahasiswa</h4>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <div class="tab-content" id="lineTabContent-3">
                <div class="tab-pane fade show active" id="tambah-mahasiswa" role="tabpanel" aria-labelledby="tambah-tab">
                    <form>

                        <div class="form-group mb-4">
                            <label class="text-black" for="nama">Nama Mahasiswa</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="nama" name="nama" placeholder="Masukkan Nama Mahasiswa">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="nim">NIM</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="nim" name="nim" placeholder="Masukkan NIM">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="angkatan">Angkatan</label>
                            <select id="angkatan" name="angkatan" class="form-control border border-secondary text-dark bg-white">
                                <option selected>2021</option>
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                                <option>2025</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="prodi">Program Studi</label>
                            <select id="prodi" name="prodi" class="form-control border border-secondary text-dark bg-white">
                                <option selected>D-2 Pengembangan Piranti Lunak Situs</option>
                                <option>D-4 Teknik Informatika</option>
                                <option>D-4 Sistem Informasi Bisnis</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="password">Password</label>
                            <input type="password" class="form-control border border-secondary text-dark bg-white" id="password" name="password" placeholder="Masukkan Password">
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <a href="{{ url('admin/kelola-pengguna-mahasiswa') }}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layout.template')

@section('content')
<!-- BEGIN CONTENT AREA -->
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Tambah Data Dosen</h4>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <div class="tab-content" id="lineTabContent-3">
                <div class="tab-pane fade show active" id="tambah-dosen" role="tabpanel" aria-labelledby="tambah-tab">
                    <form>

                        <div class="form-group mb-4">
                            <label class="text-black" for="nama">Nama Dosen</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="nama" name="nama" placeholder="Masukkan Nama Dosen">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="nidn">NIDN</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="nidn" name="nidn" placeholder="Masukkan NIDN">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="jabatan">Jabatan</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="password">Password</label>
                            <input type="password" class="form-control border border-secondary text-dark bg-white" id="password" name="password" placeholder="Masukkan Password">
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <a href="{{ url('admin/kelola-pengguna-dosen') }}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

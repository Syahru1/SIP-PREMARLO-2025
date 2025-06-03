@extends('layout.template')

@section('content')
<!-- BEGIN CONTENT AREA -->
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Tambah Data Program Studi</h4>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <div class="tab-content" id="lineTabContent-3">
                <div class="tab-pane fade show active" id="tambah-prodi" role="tabpanel" aria-labelledby="tambah-tab">
                    <form action="{{ url('admin/kelola-prodi') }}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label class="text-black" for="kodeProdi">Kode Program Studi</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="kodeProdi" name="kodeProdi" placeholder="Masukkan Kode Program Studi">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="prodi">Nama Program Studi</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="prodi" name="prodi" placeholder="Masukkan Nama Program Studi">
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <a href="{{ url('admin/kelola-prodi') }}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

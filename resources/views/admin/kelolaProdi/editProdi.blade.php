@extends('layout.template')

@section('content')
<!-- BEGIN CONTENT AREA -->
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Edit Data Program Studi</h4>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <div class="tab-content" id="lineTabContent-3">
                <div class="tab-pane fade show active" id="edit-prodi" role="tabpanel" aria-labelledby="edit-tab">
                    <form>
                        <div class="form-group mb-4">
                            <label class="text-black" for="kodeProdi">Kode Program Studi</label>
                            <input type="text" id="kodeProdi" name="kodeProdi" class="form-control border border-secondary text-dark bg-white" value="KPTI01">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="namaProdi">Nama Program Studi</label>
                            <select id="namaProdi" name="namaProdi" class="form-control border border-secondary text-dark bg-white">
                                <option selected>D-4 Teknik Informatika</option>
                                <option>D-4 Sistem Informasi Bisnis</option>
                                <option>D-2 Pengembangan Piranti Lunak Situs</option>
                            </select>
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

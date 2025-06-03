@extends('layout.template')

@section('content')
<!-- BEGIN CONTENT AREA -->
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Tambah Data Periode</h4>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <div class="tab-content" id="lineTabContent-3">
                <div class="tab-pane fade show active" id="tambah-periode" role="tabpanel" aria-labelledby="tambah-tab">
                    <form>
                        <div class="form-group mb-4">
                            <label class="text-black" for="tahunAjaran">Tahun Ajaran</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="tahunAjaran" name="tahunAjaran" placeholder="Masukkan Tahun Ajaran">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="semester">Semester</label>
                            <select id="semester" name="semester" class="form-control border border-secondary text-dark bg-white">
                                <option selected>Ganjil</option>
                                <option>Genap</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <a href="{{ url('admin/kelola-periode') }}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

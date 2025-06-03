@extends('layout.template')

@section('content')
<!-- BEGIN CONTENT AREA -->
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Edit Data Admin</h4>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <div class="tab-content" id="lineTabContent-3">
                <div class="tab-pane fade show active" id="edit-admin" role="tabpanel" aria-labelledby="edit-tab">
                    <form>

                        <div class="form-group mb-4">
                            <label class="text-black" for="nama">Nama Admin</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="nama" name="nama" value="Syahrul">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="nidn">NIDN</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="nidn" name="nidn" value="1907*****">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="jabatan">Jabatan</label>
                            <select class="form-control border border-secondary text-dark bg-white" id="jabatan" name="jabatan">
                                <option selected>Admin Prodi TI</option>
                                <option>Admin Prodi SIB</option>
                                <option>Admin Jurusan</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="password">Password</label>
                            <input type="password" class="form-control border border-secondary text-dark bg-white" id="password" name="password" value="1907*****">
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <a href="{{ route('admin.kelolaAdmin.index') }}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

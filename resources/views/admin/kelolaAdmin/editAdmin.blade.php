@empty($admin)
<!-- Modal jika data tidak ditemukan -->
<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Kesalahan</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                Data Admin tidak ditemukan.
            </div>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Kembali</button>
        </div>
    </div>
</div>
@else
<!-- Modal Form Edit Admin -->
<div class="modal-dialog modal-lg">
    <form method="POST" action="{{ url('admin/kelola-admin/update/' . $admin->id_admin) }}" class="ajax-form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Data Admin</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" value="{{ $admin->username }}" required>
                    <span class="text-danger error-text" id="error-username"></span>
                </div>

                <div class="form-group">
                    <label for="nama_admin">Nama Admin</label>
                    <input type="text" name="nama_admin" class="form-control" value="{{ $admin->nama_admin }}" required>
                    <span class="text-danger error-text" id="error-nama_admin"></span>
                </div>

                <div class="form-group">
                    <label for="password">Password (opsional)</label>
                    <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin ubah password">
                    <span class="text-danger error-text" id="error-password"></span>
                </div>

                <div class="form-group">
                    <label for="foto_admin">Foto (opsional)</label>
                    <input type="file" name="foto_admin" class="form-control">
                    <span class="text-danger error-text" id="error-foto"></span>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </div>

        </div>
    </form>
</div>
@endempty

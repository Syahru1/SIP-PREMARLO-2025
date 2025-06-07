<div class="modal-dialog modal-lg">
  <form method="POST" action="{{ url('admin/kelola-admin/store') }}" enctype="multipart/form-data" class="ajax-form">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Admin</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>

      <div class="modal-body">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" required>
          <span class="text-danger error-text" id="error-username"></span>
        </div>

        <div class="form-group">
          <label for="nama_admin">Nama Admin</label>
          <input type="text" class="form-control" name="nama_admin" required>
          <span class="text-danger error-text" id="error-nama_admin"></span>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" required>
          <span class="text-danger error-text" id="error-password"></span>
        </div>

        <div class="form-group">
          <label for="foto_admin">Foto</label>
          <input type="file" class="form-control" name="foto_admin" accept="image/*">
          <span class="text-danger error-text" id="error-foto"></span>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </form>
</div>

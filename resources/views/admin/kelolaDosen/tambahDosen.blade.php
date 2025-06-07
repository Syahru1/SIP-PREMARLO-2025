<div class="modal-dialog modal-lg">
  <form method="POST" action="{{ url('admin/kelola-dosen/store') }}" enctype="multipart/form-data" class="ajax-form">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Dosen</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>

      <div class="modal-body">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" required autocomplete="off">
          <span class="text-danger error-text" id="error-username"></span>
        </div>

        <div class="form-group">
          <label for="nama_dosen">Nama Dosen</label>
          <input type="text" class="form-control" name="nama_dosen" required>
          <span class="text-danger error-text" id="error-nama_dosen"></span>
        </div>

        <div class="form-group">
          <label for="nidn">NIDN</label>
          <input type="text" class="form-control" name="nidn" required>
          <span class="text-danger error-text" id="error-nidn"></span>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" required>
          <span class="text-danger error-text" id="error-email"></span>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" required autocomplete="off">
          <span class="text-danger error-text" id="error-password"></span>
        </div>

        <div class="form-group">
          <label for="foto">Foto</label>
          <input type="file" class="form-control" name="foto" accept="image/*">
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

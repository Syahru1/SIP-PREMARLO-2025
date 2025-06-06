<div class="modal-dialog modal-lg">
  <form method="POST" action="{{ url('admin/kelola-periode/store') }}" class="ajax-form">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Periode</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="nama_periode">Nama Periode</label>
          <input type="text" class="form-control" name="nama_periode" required>
          <span class="text-danger error-text" id="error-nama_periode"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </form>
</div>

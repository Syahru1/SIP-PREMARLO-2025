<!-- Modal Tambah Admin -->
<div class="modal fade" id="tambahAdminModal" tabindex="-1" aria-labelledby="tambahAdminLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form method="POST" action="{{ url('admin/kelola-pengguna-admin') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahAdminLabel">Tambah Data Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="mb-3">
            <label for="nama" class="form-label">Nama Admin</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Admin" required>
          </div>

          <div class="mb-3">
            <label for="nidn" class="form-label">NIDN</label>
            <input type="text" class="form-control" id="nidn" name="nidn" placeholder="Masukkan NIDN" required>
          </div>

          <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <select id="jabatan" name="jabatan" class="form-control" required>
              <option value="">-- Pilih Jabatan --</option>
              <option value="Admin Prodi TI">Admin Prodi TI</option>
              <option value="Admin Prodi SIB">Admin Prodi SIB</option>
              <option value="Admin Jurusan">Admin Jurusan</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

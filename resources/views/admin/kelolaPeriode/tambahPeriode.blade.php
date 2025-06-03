<!-- Modal Tambah Periode -->
<div class="modal fade" id="tambahPeriodeModal" tabindex="-1" aria-labelledby="tambahPeriodeLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form method="POST" action="{{ url('admin/kelola-periode') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahPeriodeLabel">Tambah Data Periode</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="mb-3">
            <label for="tahunAjaran" class="form-label">Tahun Ajaran</label>
            <input type="text" class="form-control" id="tahunAjaran" name="tahunAjaran" placeholder="Masukkan Tahun Ajaran" required>
          </div>

          <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <select id="semester" name="semester" class="form-control" required>
              <option value="Ganjil" selected>Ganjil</option>
              <option value="Genap">Genap</option>
            </select>
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

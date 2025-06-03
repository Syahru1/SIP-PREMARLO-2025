<!-- Modal Tambah Mahasiswa -->
<div class="modal fade" id="tambahMahasiswaModal" tabindex="-1" aria-labelledby="tambahMahasiswaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form method="POST" action="{{ url('admin/kelola-pengguna-mahasiswa') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahMahasiswaLabel">Tambah Data Mahasiswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Mahasiswa" required>
          </div>

          <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required>
          </div>

          <div class="mb-3">
            <label for="angkatan" class="form-label">Angkatan</label>
            <select id="angkatan" name="angkatan" class="form-control" required>
              <option value="2021" selected>2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="prodi" class="form-label">Program Studi</label>
            <select id="prodi" name="prodi" class="form-control" required>
              <option value="D-2 Pengembangan Piranti Lunak Situs" selected>D-2 Pengembangan Piranti Lunak Situs</option>
              <option value="D-4 Teknik Informatika">D-4 Teknik Informatika</option>
              <option value="D-4 Sistem Informasi Bisnis">D-4 Sistem Informasi Bisnis</option>
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

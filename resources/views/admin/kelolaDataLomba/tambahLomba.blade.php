<div class="modal fade" id="tambahLombaModal" tabindex="-1" aria-labelledby="tambahLombaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form method="POST" action="{{ url('admin/kelola-data-lomba') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahLombaLabel">Tambah Data Lomba</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <div class="modal-body">

          <div class="mb-3">
            <label for="namaLomba" class="form-label">Nama Lomba</label>
            <input type="text" class="form-control" id="namaLomba" name="namaLomba" placeholder="Masukkan Nama Lomba" required>
          </div>

          <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select id="kategori" name="kategori" class="form-control" required>
              <option value="">-- Pilih Kategori --</option>
              <option value="IT">IT</option>
              <option value="Akademik">Akademik</option>
              <option value="Soft Skill">Soft Skill</option>
              <option value="Teknologi">Teknologi</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="penyelenggara" class="form-label">Penyelenggara</label>
            <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" placeholder="Masukkan Penyelenggara Lomba" required>
          </div>

          <div class="mb-3">
            <label for="tingkatKompetisi" class="form-label">Tingkat Kompetisi</label>
            <select id="tingkatKompetisi" name="tingkatKompetisi" class="form-control" required>
              <option value="">-- Pilih Tingkat Kompetisi --</option>
              <option value="Nasional">Nasional</option>
              <option value="Internasional">Internasional</option>
              <option value="Provinsi">Provinsi</option>
              <option value="Kabupaten">Kabupaten</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="link" class="form-label">Link Pendaftaran</label>
            <input type="url" class="form-control" id="link" name="link" placeholder="Masukkan Link Pendaftaran" required>
          </div>

          <div class="mb-3">
            <label for="bidang" class="form-label">Bidang Keahlian</label>
            <input type="text" class="form-control" id="bidang" name="bidang" placeholder="Masukkan Bidang Keahlian" required>
          </div>

          <div class="mb-3">
            <label for="dibuka" class="form-label">Tanggal Pendaftaran Dibuka</label>
            <input type="date" class="form-control" id="dibuka" name="dibuka" required>
          </div>

          <div class="mb-3">
            <label for="ditutup" class="form-label">Tanggal Pendaftaran Ditutup</label>
            <input type="date" class="form-control" id="ditutup" name="ditutup" required>
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

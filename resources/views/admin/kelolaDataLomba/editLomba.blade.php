<div class="modal fade" id="editLombaModal{{ $lomba->id }}" tabindex="-1" role="dialog" aria-labelledby="editLombaLabel{{ $lomba->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ url('admin/kelola-data-lomba/' . $lomba->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Lomba</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label style="text-align:left; display:block;">Nama Lomba</label>
                        <input type="text" name="nama_lomba" class="form-control" value="{{ old('nama_lomba', $lomba->nama_lomba) }}" required>
                    </div>

                    <div class="form-group">
                        <label style="text-align:left; display:block;">Kategori</label>
                        <select name="kategori" class="form-control" required>
                            <option value="IT" {{ old('kategori', $lomba->kategori) == 'IT' ? 'selected' : '' }}>IT</option>
                            <option value="Akademik" {{ old('kategori', $lomba->kategori) == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                            <option value="Soft Skill" {{ old('kategori', $lomba->kategori) == 'Soft Skill' ? 'selected' : '' }}>Soft Skill</option>
                            <option value="Teknologi" {{ old('kategori', $lomba->kategori) == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label style="text-align:left; display:block;">Penyelenggara</label>
                        <input type="text" name="penyelenggara" class="form-control" value="{{ old('penyelenggara', $lomba->penyelenggara) }}" required>
                    </div>

                    <div class="form-group">
                        <label style="text-align:left; display:block;">Tingkat Kompetisi</label>
                        <select name="tingkat_kompetisi" class="form-control" required>
                            <option value="Nasional" {{ old('tingkat_kompetisi', $lomba->tingkat_kompetisi) == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                            <option value="Internasional" {{ old('tingkat_kompetisi', $lomba->tingkat_kompetisi) == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                            <option value="Provinsi" {{ old('tingkat_kompetisi', $lomba->tingkat_kompetisi) == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                            <option value="Kabupaten" {{ old('tingkat_kompetisi', $lomba->tingkat_kompetisi) == 'Kabupaten' ? 'selected' : '' }}>Kabupaten</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label style="text-align:left; display:block;">Link Pendaftaran</label>
                        <input type="url" name="link_pendaftaran" class="form-control" value="{{ old('link_pendaftaran', $lomba->link_pendaftaran) }}" required>
                    </div>

                    <div class="form-group">
                        <label style="text-align:left; display:block;">Bidang Keahlian</label>
                        <input type="text" name="bidang_keahlian" class="form-control" value="{{ old('bidang_keahlian', $lomba->bidang_keahlian) }}" required>
                    </div>

                    <div class="form-group">
                        <label style="text-align:left; display:block;">Tanggal Pendaftaran Dibuka</label>
                        <input type="date" name="tanggal_pendaftaran_dibuka" class="form-control" value="{{ old('tanggal_pendaftaran_dibuka', $lomba->tanggal_pendaftaran_dibuka) }}" required>
                    </div>

                    <div class="form-group">
                        <label style="text-align:left; display:block;">Tanggal Pendaftaran Ditutup</label>
                        <input type="date" name="tanggal_pendaftaran_ditutup" class="form-control" value="{{ old('tanggal_pendaftaran_ditutup', $lomba->tanggal_pendaftaran_ditutup) }}" required>
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

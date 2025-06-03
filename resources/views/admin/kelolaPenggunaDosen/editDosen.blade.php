<div class="modal fade" id="editDosenModal{{ $dosen->id }}" tabindex="-1" role="dialog" aria-labelledby="editDosenLabel{{ $dosen->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ url('admin/kelola-pengguna-dosen/' . $dosen->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label style="text-align:left; display:block;">Nama Dosen</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $dosen->nama) }}" required>
                    </div>

                    <div class="form-group">
                        <label style="text-align:left; display:block;">NIDN</label>
                        <input type="text" name="nidn" class="form-control" value="{{ old('nidn', $dosen->nidn) }}" required>
                    </div>

                    <div class="form-group">
                        <label style="text-align:left; display:block;">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $dosen->jabatan) }}" required>
                    </div>

                    <div class="form-group">
                        <label style="text-align:left; display:block;">Password</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password', $dosen->password) }}" required>
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

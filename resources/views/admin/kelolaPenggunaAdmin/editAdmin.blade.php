<div class="modal fade" id="editAdminModal{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="editAdminLabel{{ $admin->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ url('admin/kelola-admin/' . $admin->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label style="text-align:left; display:block;">Nama Admin</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $admin->nama) }}" required>
                    </div>

                    <div class="form-group">
                        <label style="text-align:left; display:block;">NIDN</label>
                        <input type="text" name="nidn" class="form-control" value="{{ old('nidn', $admin->nidn) }}" required>
                    </div>

                    <div class="form-group">
                        <label style="text-align:left; display:block;">Jabatan</label>
                        <select name="jabatan" class="form-control" required>
                            <option value="Admin Prodi TI" {{ old('jabatan', $admin->jabatan) == 'Admin Prodi TI' ? 'selected' : '' }}>Admin Prodi TI</option>
                            <option value="Admin Prodi SIB" {{ old('jabatan', $admin->jabatan) == 'Admin Prodi SIB' ? 'selected' : '' }}>Admin Prodi SIB</option>
                            <option value="Admin Jurusan" {{ old('jabatan', $admin->jabatan) == 'Admin Jurusan' ? 'selected' : '' }}>Admin Jurusan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label style="text-align:left; display:block;">Password</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password', $admin->password) }}" required>
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

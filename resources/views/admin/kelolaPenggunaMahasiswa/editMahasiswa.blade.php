<div class="modal fade" id="editMahasiswaModal{{ $mahasiswa->id }}" tabindex="-1" role="dialog" aria-labelledby="editMahasiswaLabel{{ $mahasiswa->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ url('admin/kelola-pengguna-mahasiswa/' . $mahasiswa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="editMahasiswaLabel{{ $mahasiswa->id }}">Edit Data Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label style="text-align:left; display:block;">Nama Mahasiswa</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}" required>
                    </div>

                    <div class="form-group">
                        <label style="text-align:left; display:block;">NIM</label>
                        <input type="text" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}" required>
                    </div>

                    <div class="form-group">
                        <label style="text-align:left; display:block;">Angkatan</label>
                        <select name="angkatan" class="form-control" required>
                            @foreach (['2021', '2022', '2023', '2024', '2025'] as $tahun)
                                <option value="{{ $tahun }}" {{ old('angkatan', $mahasiswa->angkatan) == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label style="text-align:left; display:block;">Program Studi</label>
                        <select name="prodi" class="form-control" required>
                            @foreach ([
                                'D-2 Pengembangan Piranti Lunak Situs',
                                'D-4 Teknik Informatika',
                                'D-4 Sistem Informasi Bisnis'
                            ] as $prodi)
                                <option value="{{ $prodi }}" {{ old('prodi', $mahasiswa->prodi) == $prodi ? 'selected' : '' }}>{{ $prodi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label style="text-align:left; display:block;">Password</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password', $mahasiswa->password) }}" required>
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

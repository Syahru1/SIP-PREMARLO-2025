@empty($mahasiswa)
<!-- Modal jika data tidak ditemukan -->
<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Kesalahan</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                Data mahasiswa tidak ditemukan.
            </div>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Kembali</button>
        </div>
    </div>
</div>
@else
<!-- Modal Form Edit mahasiswa -->
<div class="modal-dialog modal-lg">
    <form method="POST" action="{{ url('admin/kelola-mahasiswa/update/' . $mahasiswa->id_mahasiswa) }}" class="ajax-form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Data mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" value="{{ $mahasiswa->username }}" required>
                    <span class="text-danger error-text" id="error-username"></span>
                </div>

                <div class="form-group">
                    <label for="nama">Nama mahasiswa</label>
                    <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->nama }}" required>
                    <span class="text-danger error-text" id="error-nama"></span>
                </div>

                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" class="form-control" value="{{ $mahasiswa->nim }}" required>
                    <span class="text-danger error-text" id="error-nim"></span>
                </div>

                <div class="form-group">
                        <label>Program Studi</label>
                        <select name="id_prodi" id="id_prodi" class="form-control" required>
                            <option value="">- Pilih prodi -</option>
                            @foreach($prodi as $l)
                                <option value="{{ $l->id_prodi }}" {{ ($l->id_prodi == $mahasiswa->id_prodi) ? 'selected' : '' }}>
                                    {{ $l->nama_prodi }}
                                </option>
                            @endforeach
                        </select>
                        <small id="error-id_prodi" class="error-text form-text text-danger"></small>
                </div>

                <div class="form-group">
                        <label>Periode</label>
                        <select name="id_periode" id="id_periode" class="form-control" required>
                            <option value="">- Pilih Periode -</option>
                            @foreach($periode as $l)
                                <option value="{{ $l->id_periode }}" {{ ($l->id_periode == $mahasiswa->id_periode) ? 'selected' : '' }}>
                                    {{ $l->nama_periode }}
                                </option>
                            @endforeach
                        </select>
                        <small id="error-id_periode" class="error-text form-text text-danger"></small>
                </div>

                <div class="form-group">
                    <label for="password">Password (opsional)</label>
                    <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin ubah password">
                    <span class="text-danger error-text" id="error-password"></span>
                </div>

                <div class="form-group">
                    <label for="foto">Foto (opsional)</label>
                    <input type="file" name="foto" class="form-control">
                    <span class="text-danger error-text" id="error-foto"></span>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </div>

        </div>
    </form>
</div>
@endempty

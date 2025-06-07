<div class="modal-dialog modal-lg">
  <form method="POST" action="{{ url('admin/kelola-mahasiswa/store') }}" enctype="multipart/form-data" class="ajax-form">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <!-- Username -->
        <div class="form-group">
          <label for="username">Username</label>
          <input id="username" type="text" class="form-control" name="username" required>
          <small class="text-danger error-text" id="error-username"></small>
        </div>

        <!-- Nama Mahasiswa -->
        <div class="form-group">
          <label for="nama">Nama Mahasiswa</label>
          <input id="nama" type="text" class="form-control" name="nama" required>
          <small class="text-danger error-text" id="error-nama"></small>
        </div>

        <!-- Program Studi -->
        <div class="form-group">
          <label for="id_prodi">Program Studi</label>
          <select id="id_prodi" name="id_prodi" class="form-control" required>
            <option value="">- Pilih Prodi -</option>
            @foreach($prodi as $l)
              <option value="{{ $l->id_prodi }}">{{ $l->nama_prodi }}</option>
            @endforeach
          </select>
          <small class="text-danger error-text" id="error-id_prodi"></small>
        </div>

        <!-- Periode -->
        <div class="form-group">
          <label for="id_periode">Periode</label>
          <select id="id_periode" name="id_periode" class="form-control" required>
            <option value="">- Pilih Periode -</option>
            @foreach($periode as $p)
              <option value="{{ $p->id_periode }}">{{ $p->nama_periode }}</option>
            @endforeach
          </select>
          <small class="text-danger error-text" id="error-id_periode"></small>
        </div>

        <!-- Password -->
        <div class="form-group">
          <label for="password">Password</label>
          <input id="password" type="password" class="form-control" name="password" required>
          <small class="text-danger error-text" id="error-password"></small>
        </div>

        <!-- Foto -->
        <div class="form-group">
          <label for="foto">Foto</label>
          <input id="foto" type="file" class="form-control" name="foto" accept="image/*">
          <small class="text-danger error-text" id="error-foto"></small>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </form>
</div>

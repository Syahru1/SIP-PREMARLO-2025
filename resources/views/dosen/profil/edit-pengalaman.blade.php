<div class="modal fade" id="editPengalamanModal{{ $pengalaman->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $pengalaman->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ url('mahasiswa/profil/pengalaman/' . $pengalaman->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pengalaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Posisi</label>
                        <input type="text" name="posisi" class="form-control" value="{{ $pengalaman->posisi }}" required>
                    </div>
                    <div class="form-group">
                        <label>Perusahaan</label>
                        <input type="text" name="perusahaan" class="form-control" value="{{ $pengalaman->perusahaan }}" required>
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="number" name="tahun" class="form-control" value="{{ $pengalaman->tahun }}" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editSertifikatModal{{ $sertifikat->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $sertifikat->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('sertifikat.create', $sertifikat->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Sertifikat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Sertifikat</label>
                        <input type="text" name="nama" class="form-control" value="{{ $sertifikat->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label>Penyelenggara</label>
                        <input type="text" name="penyelenggara" class="form-control" value="{{ $sertifikat->penyelenggara }}" required>
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="number" name="tahun" class="form-control" value="{{ $sertifikat->tahun }}" required>
                    </div>
                    <div class="form-group">
                        <label>Ganti File Sertifikat (Opsional)</label>
                        <input type="file" name="file" class="form-control">
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

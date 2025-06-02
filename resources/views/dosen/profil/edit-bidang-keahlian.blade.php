<div class="modal fade" id="editKeahlianModal{{ $keahlian->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $keahlian->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ url('mahasiswa/profil/keahlian/' . $keahlian->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Keahlian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Bidang Keahlian</label>
                        <input type="text" name="bidang" class="form-control" value="{{ $keahlian->bidang }}" required>
                    </div>
                    <div class="form-group">
                        <label>Tingkat</label>
                        <select name="tingkat" class="form-control" required>
                            <option value="Rendah" {{ $keahlian->tingkat == 'Rendah' ? 'selected' : '' }}>Rendah</option>
                            <option value="Sedang" {{ $keahlian->tingkat == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                            <option value="Tinggi" {{ $keahlian->tingkat == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                        </select>
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

<div class="modal fade" id="editPeriodeModal{{ $periode->id }}" tabindex="-1" role="dialog" aria-labelledby="editPeriodeLabel{{ $periode->id }}" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form action="{{ url('admin/kelola-periode/' . $periode->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Periode</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label style="text-align:left; display:block;">Tahun Ajaran</label>
                        <select name="tahun_ajaran" class="form-control" required>
                            @foreach (['2021/2022', '2022/2023', '2023/2024', '2024/2025'] as $tahun)
                                <option value="{{ $tahun }}" {{ $periode->tahun_ajaran == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label style="text-align:left; display:block;">Semester</label>
                        <select name="angkatan" class="form-control" required>
                            <option value="Ganjil" {{ $periode->angkatan == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                            <option value="Genap" {{ $periode->angkatan == 'Genap' ? 'selected' : '' }}>Genap</option>
                        </select>
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

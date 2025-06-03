<!-- Modal Edit Program Studi -->
<div class="modal fade" id="editProdiModal{{ $prodi->id }}" tabindex="-1" role="dialog" aria-labelledby="editProdiLabel{{ $prodi->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ url('admin/kelola-prodi/' . $prodi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="editProdiLabel{{ $prodi->id }}">Edit Data Program Studi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Kode Prodi -->
                    <div class="form-group">
                        <label for="kode_prodi" class="text-left d-block">Kode Program Studi</label>
                        <input type="text" id="kode_prodi" name="kode_prodi"
                               class="form-control border border-secondary text-dark bg-white"
                               value="{{ old('kode_prodi', $prodi->kode_prodi) }}" required>
                    </div>

                    <!-- Nama Prodi -->
                    <div class="form-group">
                        <label for="nama_prodi" class="text-left d-block">Nama Program Studi</label>
                        <select id="nama_prodi" name="nama_prodi"
                                class="form-control border border-secondary text-dark bg-white" required>
                            <option value="D-4 Teknik Informatika" {{ old('nama_prodi', $prodi->nama_prodi) == 'D-4 Teknik Informatika' ? 'selected' : '' }}>D-4 Teknik Informatika</option>
                            <option value="D-4 Sistem Informasi Bisnis" {{ old('nama_prodi', $prodi->nama_prodi) == 'D-4 Sistem Informasi Bisnis' ? 'selected' : '' }}>D-4 Sistem Informasi Bisnis</option>
                            <option value="D-2 Pengembangan Piranti Lunak Situs" {{ old('nama_prodi', $prodi->nama_prodi) == 'D-2 Pengembangan Piranti Lunak Situs' ? 'selected' : '' }}>D-2 Pengembangan Piranti Lunak Situs</option>
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

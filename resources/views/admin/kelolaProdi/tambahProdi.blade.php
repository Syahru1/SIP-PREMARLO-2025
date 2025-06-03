<!-- Modal Tambah Prodi -->
<div class="modal fade" id="tambahProdiModal" tabindex="-1" role="dialog" aria-labelledby="tambahProdiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ url('admin/kelola-prodi') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahProdiModalLabel">Tambah Program Studi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="kode_prodi" class="text-black">Kode Program Studi</label>
                        <input type="text" class="form-control" id="kode_prodi" name="kode_prodi" placeholder="Masukkan Kode Program Studi" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="nama_prodi" class="text-black">Nama Program Studi</label>
                        <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" placeholder="Masukkan Nama Program Studi" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

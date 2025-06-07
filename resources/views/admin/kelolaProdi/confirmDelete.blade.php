<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Konfirmasi Hapus</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>

        <div class="modal-body">
            <p>Apakah Anda yakin ingin menghapus program studi berikut?</p>
            <ul>
                <li><strong>Kode Prodi:</strong> {{ $prodi->kode_prodi }}</li>
                <li><strong>Nama prodi:</strong> {{ $prodi->nama_prodi }}</li>
            </ul>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <form action="{{ url('admin/kelola-prodi/delete/' . $prodi->id_prodi) }}" method="POST" class="ajax-delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>

<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Konfirmasi Hapus</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>

        <div class="modal-body">
            <p>Apakah Anda yakin ingin menghapus Admin berikut?</p>
            <ul>
                <li><strong>Username</strong> {{ $admin->username }}</li>
                <li><strong>Nama Admin:</strong> {{ $admin->nama_admin }}</li>
            </ul>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <form action="{{ url('admin/kelola-admin/delete/' . $admin->id_admin) }}" method="POST" class="ajax-delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>

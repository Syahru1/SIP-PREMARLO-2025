@if(!$prodi)
<!-- Modal jika data tidak ditemukan -->
<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                Data yang anda cari tidak ditemukan
            </div>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Kembali</button>
        </div>
    </div>
</div>
@else
<!-- Modal Edit -->
<div class="modal-dialog modal-md">
    <form action="{{ url('admin/kelola-prodi/update/'.$prodi->id_prodi) }}" method="POST" class="ajax-form">
        @csrf
        @method('PUT')
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Data Program Studi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <label for="kodeProdi{{ $prodi->id_prodi }}" class="form-label">Kode Program Studi</label>
                <input type="text" class="form-control" id="kodeProdi{{ $prodi->id_prodi }}" name="kode_prodi" value="{{ $prodi->kode_prodi }}" required>
            </div>

            <div class="modal-body">
                <label for="namaProdi{{ $prodi->id_prodi }}" class="form-label">Nama Program Studi</label>
                <input type="text" class="form-control" id="namaProdi{{ $prodi->id_prodi }}" name="nama_prodi" value="{{ $prodi->nama_prodi }}" required>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>

        </div>
    </form>
</div>
@endif
<script>
    $(document).ready(function() {
        // Validasi form sebelum submit
        $('#form-edit').on('submit', function(e) {
            var kodeProdi = $('#kodeProdi{{ $prodi->id_prodi }}').val();
            var namaProdi = $('#namaProdi{{ $prodi->id_prodi }}').val();

            if (kodeProdi.trim() === '' || namaProdi.trim() === '') {
                e.preventDefault();
                alert('Semua field harus diisi!');
            }
        });
    });
</script>

<!-- Modal Tambah Prodi -->
<div class="modal-dialog modal-lg">
    <form method="POST" action="{{ url('admin/kelola-prodi/store') }}" id="form-tambah">
        @csrf
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="tambahProdiLabel">Tambah Data Prodi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">

        <div class="mb-3 form-group">
                <label for="kode_prodi" class="form-label">Kode Prodi</label>
                <input type="text" class="form-control" id="kode_prodi" name="kode_prodi" placeholder="Masukkan Kode Prodi" required>
                <span class="text-danger error-text" id="error-kode_prodi"></span>
        </div>

        <div class="mb-3 form-group">
                <label for="nama_prodi" class="form-label">Nama Prodi</label>
                <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" placeholder="Masukkan Nama Prodi" required>
                <span class="text-danger error-text" id="error-nama_prodi"></span>
        </div>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </div>
    </form>
</div>
{{-- </div> --}}
<script>
    $(document).ready(function () {
        $("#form-tambah").validate({
            rules: {
                kode_prodi: {
                    required: true,
                    minlength: 2,
                    maxlength: 10
                },
                nama_prodi: {
                    required: true,
                    minlength: 3,
                    maxlength: 100
                },
            },
            submitHandler: function (form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function (response) {
                        console.log(response); 
                        if (response.status) {
                            $('#myModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
                            dataPeriode.ajax.reload();
                        } else {
                            $('.error-text').text('');
                            $.each(response.msgField, function (prefix, val) {
                                $('#error-' + prefix).text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    }
                });
                return false;
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

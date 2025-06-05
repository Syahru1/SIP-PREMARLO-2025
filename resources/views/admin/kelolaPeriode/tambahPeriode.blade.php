<!-- Modal Tambah Periode -->
{{-- <div class="modal fade" id="tambahPeriodeModal" tabindex="-1" aria-labelledby="tambahPeriodeLabel" aria-hidden="true"> --}}
  <div class="modal-dialog modal-lg">
    <form method="POST" action="{{ url('admin/kelola-periode/store') }}" id="form-tambah">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahPeriodeLabel">Tambah Data Periode</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="mb-3 form-group">
                <label for="nama_periode" class="form-label">Nama Periode</label>
                <input type="text" class="form-control" id="nama_periode" name="nama_periode" placeholder="Masukkan Nama Periode" required>
                <span class="text-danger error-text" id="error-nama_periode"></span>
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
                nama_periode: {
                    required: true,
                    minlength: 3,
                    maxlength: 10
                },
            },
            submitHandler: function (form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: new formData(form),
                    contentType: false,
                    processData: false, 
                    success: function (response) {
                        if (response.status) {
                            $('#myModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.message || 'Data periode berhasil ditambahkan.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            dataPeriode.ajax.reload();
                        } else {
                            // Tampilkan error validasi jika ada
                            $('.error-text').text('');
                            $.each(response.msgField, function (prefix, val) {
                                $('#error-' + prefix).text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal Menambahkan',
                                text: response.message || 'Gagal menyimpan data. Periksa kembali isian Anda.'
                            });
                        }
                    },
                    error: function (xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Kesalahan Server',
                            text: 'Terjadi kesalahan saat menyimpan data. Coba lagi nanti.'
                        });
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

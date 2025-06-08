@extends('layout.template')

@section('content')

<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Data Prestasi Mahasiswa</h3>
        </div>
    </div>

    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4">
                        <table class="table mb-0" id="table_prestasi">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Juara Kompetisi</th>
                                    <th>Nama Kompetisi</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Modal container --}}
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function modalAction(url = '') {
        $('#myModal').load(url, function() {
            $('#myModal').modal('show');
        });
    }

    var dataPrestasi;
    $(document).ready(function() {
        dataPrestasi = $('#table_prestasi').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('admin/verifikasi-prestasi/list') }}",
                type: "POST",
                data: function(d) {
                    d._token = "{{ csrf_token() }}";
                }
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "mahasiswa.nim",
                    name: "mahasiswa.nim",
                    className: "text-center"
                },
                {
                    data: "mahasiswa.nama",
                    name: "mahasiswa.nama",
                    className: "text-center"
                },
                {
                    data: "juara_kompetisi",
                    name: "juara_kompetisi",
                    className: "text-center"
                },
                {
                    data: "nama_kompetisi",
                    name: "nama_kompetisi",
                    className: "text-center"
                },
                {
                    data: "status",
                    name: "status",
                    className: "text-center"
                },
                {
                    data: "aksi",
                    name: "aksi",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $('#myModal').on('hidden.bs.modal', function () {
            dataPrestasi.ajax.reload(null, false);
            $(this).find('form')[0]?.reset();
            $('.error-text').text('');
        });
    });

    // Simpan Tambah / Edit
    $(document).on('submit', '.ajax-form', function(e) {
        e.preventDefault();
        let form = this;
        let formData = new FormData(form);

        $('.error-text').text('');

        $.ajax({
            url: form.action,
            method: form.method,
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: res.message,
                        showConfirmButton: false,
                        timer: 1500,
                        didClose: () => {
                            $('#myModal').modal('hide');
                        }
                    });
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, val) {
                        $('#error-' + key).text(val[0]);
                    });
                } else {
                    Swal.fire('Error', 'Gagal menyimpan data', 'error');
                }
            }
        });
    });

    // Hapus
    $(document).on('submit', '.ajax-delete-form', function(e) {
        e.preventDefault();
        let form = this;

        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: form.action,
                    method: 'POST',
                    data: $(form).serialize(),
                    success: function(res) {
                        if (res.status) {
                            Swal.fire('Berhasil', res.message, 'success');
                            $('#myModal').modal('hide');
                            dataPrestasi.ajax.reload(null, false);
                        } else {
                            Swal.fire('Gagal', res.message, 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Gagal menghapus data', 'error');
                    }
                });
            }
        });
    });
</script>
@endpush


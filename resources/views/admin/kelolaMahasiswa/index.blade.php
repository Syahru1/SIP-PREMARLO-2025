@extends('layout.template')

@section('content')
<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Data Mahasiswa</h3>
        </div>
    </div>

    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <button onclick="modalAction('{{ url('admin/kelola-mahasiswa/tambah') }}')" class="btn btn-sm btn-success mt-1">Tambah Mahasiswa</button>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4">
                        <table class="table mb-0" id="table_mahasiswa">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Nama Mahasiswa</th>
                                    <th class="text-center">NIM</th>
                                    <th class="text-center">Program Studi</th>
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

{{-- Modal container --}}
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function modalAction(url = '') {
        $('#myModal').load(url, function() {
            $('#myModal').modal('show');
        });
    }

    var dataMahasiswa;
    $(document).ready(function() {
        dataMahasiswa = $('#table_mahasiswa').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('admin/kelola-mahasiswa/list') }}",
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
                    data: "username",
                    name: "username",
                    className: "text-center"
                },
                {
                    data: "nama",
                    name: "nama",
                    className: "text-center"
                },
                {
                    data: "nim",
                    name: "nim",
                    className: "text-center"
                },
                {
                    data: "prodi",
                    name: "prodi",
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
            dataMahasiswa.ajax.reload(null, false);
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
                            dataMahasiswa.ajax.reload(null, false);
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

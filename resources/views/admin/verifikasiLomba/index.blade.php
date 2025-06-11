@extends('layout.template')

@section('content')
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Data Lomba Mahasiswa</h3>
            </div>
        </div>

        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                            </div>
                        </div>
                    </div>

                    <div class="widget-content widget-content-area">
                        <div class="table-responsive mb-4">
                            <table class="table mb-0" id="table_lomba">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Kode Lomba</th>
                                        <th>Nama Lomba</th>
                                        <th>Status Lomba</th>
                                        <th>Status Verifikasi</th>
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

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }

        var dataLomba;
        $(document).ready(function() {
            dataLomba = $('#table_lomba').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('admin/verifikasi-lomba/list') }}",
                    type: "POST",
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "kode_lomba",
                        name: "kode_lomba",
                        className: "text-center"
                    },
                    {
                        data: "nama_lomba",
                        name: "nama_lomba",
                        className: "text-center"
                    },
                    {
                        data: "status_lomba",
                        name: "status_lomba",
                        className: "text-center",
                        render: function(data, type, row) {
                            if (data == 'Masih Berlangsung') {
                                return '<span class="badge badge-success">' + data + '</span>';
                            } else if (data == 'Selesai') {
                                return '<span class="badge badge-danger">' + data + '</span>';
                            } else {
                                return '<span class="badge badge-secondary">' + data + '</span>';
                            }
                        }
                    },
                    {
                        data: "status_verifikasi",
                        name: "status_verifikasi",
                        className: "text-center",
                        render: function(data, type, row) {
                            if (data == 'Diverifikasi') {
                                return '<span class="badge badge-success">' + data + '</span>';
                            } else if (data == 'Belum Diverifikasi') {
                                return '<span class="badge badge-secondary">' + data + '</span>';
                            } else if (data == 'Ditolak') {
                                return '<span class="badge badge-danger">' + data + '</span>';
                            } else {
                                return data;
                            }
                        }
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

            $('#myModal').on('hidden.bs.modal', function() {
                dataLomba.ajax.reload(null, false);
                $(this).find('form')[0]?.reset();
                $('.error-text').text('');
            });

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session("success") }}',
                    showConfirmButton: false,
                    timer: 2000
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ session("error") }}',
                    showConfirmButton: true
                });
            @endif
        });
    </script>
@endpush

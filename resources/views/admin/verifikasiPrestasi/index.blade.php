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
                                    <th class="text-center"></th>
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
                    className: "text-center",
                    render: function(data) {
                        let badgeClass = 'badge-secondary';
                        if (data === 'Sudah Diverifikasi') badgeClass = 'badge-success';
                        else if (data === 'Ditolak') badgeClass = 'badge-danger';
                        else if (data === 'Belum Diverifikasi') badgeClass = 'badge-warning';

                        return `<span class="badge ${badgeClass}">${data}</span>`;
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

        $('#myModal').on('hidden.bs.modal', function () {
            dataPrestasi.ajax.reload(null, false);
            $(this).find('form')[0]?.reset();
            $('.error-text').text('');
        });

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                showConfirmButton: true
            });
        @endif
    });
</script>
@endpush



@extends('layout.template')

@section('content')
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Rekomendasi Lomba Mahasiswa</h3>
            </div>
        </div>

        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive mb-4">
                            <table class="table mb-0" id="table_mahasiswa">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Program Studi</th>
                                        <th>Aksi</th>
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
        var dataMahasiswa;
        $(document).ready(function() {
            dataMahasiswa = $('#table_mahasiswa').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('admin/rekomendasi-lomba/list') }}",
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
                        data: "nama",
                        name: "nama",
                        className: "text-center",
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: "nama_prodi",
                        name: "nama_prodi",
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
        });
    </script>
@endpush

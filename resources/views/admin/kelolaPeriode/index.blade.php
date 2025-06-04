@extends('layout.template')

@section('content')
<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Data Periode</h3>
        </div>
    </div>

    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <button onclick="modalAction('{{ url('admin/periode/tambah') }}')" class="btn btn-sm btn-success mt-1">Tambah Periode</button>
                    {{-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahPeriodeModal">Tambah Periode</button> --}}
                </div>

                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4">
                        <table class="table mb-0" id="table_periode">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="text-center">Tahun Periode</th>
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

{{-- Modal tambah periode --}}
{{-- @include('admin.kelolaPeriode.tambahPeriode') --}}
<div id="myModal" class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true"></div>
@endsection

@push('js')
<script>
    function modalAction(url = '') {
        $('#myModal').load(url, function() {
            $('#myModal').modal('show');
        });
    }

    var dataPeriode;
    $(document).ready(function() {
        dataPeriode = $('#table_periode').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('admin/periode/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.id_periode = $('#id_periode').val();
                    }
                },
            columns: [
                {
                    data: null,
                    className: "text-center",
                    width: "5%",
                    orderable: false,
                    searchable: true,
                    render: function (data, type, row, meta) {
                        return meta.row + 1; // nomor urut
                    }
                },
                {
                    data: "nama_periode",
                    className: "text-center",
                },
                {
                    data: "aksi",
                    className: "text-center",
                    orderable: false,
                    searchable: true
                }
            ]
        });

        $('#id_periode').on('change', function() {
            dataPeriode.ajax.reload();
        });
    });
</script>
@endpush

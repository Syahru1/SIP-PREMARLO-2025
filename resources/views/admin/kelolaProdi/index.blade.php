@extends('layout.template')

@section('content')
<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Data Program Studi</h3>
        </div>
    </div>

    <div class="row layout-spacing">

        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <button onclick="modalAction('{{ url('admin/kelola-prodi/tambah') }}')" class="btn btn-sm btn-success mt-1">Tambah Program Studi</button>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4">
                        <table class="table mb-0" id="table_prodi">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="text-center">Kode Program Studi</th>
                                    <th class="text-center">Nama Program Studi</th>
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

{{-- Modal --}}
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>
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
        dataPeriode = $('#table_prodi').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('admin/kelola-prodi/list') }}",
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
                    data: "kode_prodi",
                    name: "nama_prodi",
                    className: "text-center"
                    
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

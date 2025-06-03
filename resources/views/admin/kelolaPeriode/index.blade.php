@extends('layout.template')

@section('content')
@php

    $dataPeriode = collect([
        (object)[
            'id' => 1,
            'tahun_ajaran' => '2023/2024',
            'angkatan' => 'Ganjil',
        ],
        (object)[
            'id' => 2,
            'tahun_ajaran' => '2024/2025',
            'angkatan' => 'Genap',
        ]
    ]);
@endphp

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
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahPeriodeModal">Tambah Periode</button>
                        </div>
                    </div>
                </div>

                <!-- Table untuk menampilkan Periode -->
                <div class="widget-content widget-content-area" id="table_periode">
                    <div class="table-responsive mb-4">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun Periode</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataPeriode as $index => $periode)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $periode->angkatan }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPeriodeModal{{ $periode->id }}">Edit</button>
                                        <form action="{{ url('admin/kelola-periode/delete/'.$periode->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>

                                        {{-- Include modal edit per periode --}}
                                        @include('admin.kelolaPeriode.editPeriode', ['periode' => $periode])
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal tambah periode --}}
@include('admin.kelolaPeriode.tambahPeriode')

@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#tambahPeriodeModal').on('shown.bs.modal', function () {
            $('#tahun_ajaran').focus();
        });
    });

    var tablePeriode;

    $(document).ready(function(){
        tablePeriode = $('#table_periode').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('admin/kelola-periode/data') }}",
                type: 'json',
                data: function (d) {
                    d._token = "{{ csrf_token() }}";
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'tahun_ajaran', name: 'tahun_ajaran' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
        })
    })
</script>
@endpush

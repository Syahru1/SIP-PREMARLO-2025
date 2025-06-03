@extends('layout.template')

@section('content')
@php
    // Example data for programs
    $dataProdi = collect([
        (object)[
            'id' => 1,
            'kode_prodi' => 'KPTI01',
            'nama_prodi' => 'D-4 Teknik Informatika',
        ],
        (object)[
            'id' => 2,
            'kode_prodi' => 'KPTI02',
            'nama_prodi' => 'D-4 Sistem Informasi Bisnis',
        ],
        (object)[
            'id' => 3,
            'kode_prodi' => 'KPTI03',
            'nama_prodi' => 'D-2 Pengembangan Piranti Lunak Situs',
        ]
    ]);
@endphp

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
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahProdiModal">Tambah Prodi</button>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Prodi</th>
                                    <th>Nama Program Studi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataProdi as $index => $prodi)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $prodi->kode_prodi }}</td>
                                    <td>{{ $prodi->nama_prodi }}</td>
                                    <td class="text-center">
                                        <!-- Button to open modal for editing program -->
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editProdiModal{{ $prodi->id }}">Edit</button>

                                        <!-- Form for deleting program -->
                                        <form action="{{ url('admin/kelola-prodi/delete/'.$prodi->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>

                                        {{-- Include modal edit for each program --}}
                                        @include('admin.kelolaProdi.editProdi', ['prodi' => $prodi])
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

{{-- Modal for adding new program --}}
@include('admin.kelolaProdi.tambahProdi')

@endsection

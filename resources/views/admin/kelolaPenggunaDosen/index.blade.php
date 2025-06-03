@extends('layout.template')

@section('content')
@php
    $dataDosen = collect([
        (object)[
            'id' => 1,
            'nidn' => '1907******',
            'nama' => 'Muhammad Syahrul Gunawan',
            'jabatan' => 'Dosen',
            'password' => '123456'
        ],
        (object)[
            'id' => 2,
            'nidn' => '1907******',
            'nama' => 'Siti Rahma',
            'jabatan' => 'Dosen',
            'password' => '123456'
        ]
    ]);
@endphp

<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Daftar Akun Dosen</h3>
        </div>
    </div>

    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahDosenModal">Tambah Dosen</button>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIDN</th>
                                    <th>Nama Dosen</th>
                                    <th>Jabatan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataDosen as $index => $dosen)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $dosen->nidn }}</td>
                                    <td>{{ $dosen->nama }}</td>
                                    <td>{{ $dosen->jabatan }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editDosenModal{{ $dosen->id }}">Edit</button>

                                        <form action="{{ url('admin/kelola-pengguna-dosen/delete/'.$dosen->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>

                                        {{-- Include modal edit per dosen --}}
                                        @include('admin.kelolaPenggunaDosen.editDosen', ['dosen' => $dosen])
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

{{-- Modal tambah dosen --}}
@include('admin.kelolaPenggunaDosen.tambahDosen')

@endsection

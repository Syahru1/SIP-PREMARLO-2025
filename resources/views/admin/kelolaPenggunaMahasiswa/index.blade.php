@extends('layout.template')

@section('content')
@php
    $dataMahasiswa = collect([
        (object)[
            'id' => 1,
            'nim' => '1907******',
            'nama' => 'Muhammad Syahrul Gunawan',
            'angkatan' => '2023',
            'prodi' => 'D-4 Teknik Informatika',
            'password' => '19070000'
        ],
        (object)[
            'id' => 2,
            'nim' => '1907******',
            'nama' => 'Siti Rahma',
            'angkatan' => '2022',
            'prodi' => 'D-4 Sistem Informasi Bisnis',
            'password' => '19070000'
        ]
    ]);
@endphp

<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Akun Mahasiswa</h3>
        </div>
    </div>

    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahMahasiswaModal">Tambah Mahasiswa</button>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Angkatan</th>
                                    <th>Program Studi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataMahasiswa as $index => $mhs)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $mhs->nim }}</td>
                                    <td>{{ $mhs->nama }}</td>
                                    <td>{{ $mhs->angkatan }}</td>
                                    <td>{{ $mhs->prodi }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editMahasiswaModal{{ $mhs->id }}">Edit</button>

                                        <form action="{{ url('admin/kelola-pengguna-mahasiswa/delete/'.$mhs->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>

                                        {{-- Include modal edit per mahasiswa --}}
                                        @include('admin.kelolaPenggunaMahasiswa.editMahasiswa', ['mahasiswa' => $mhs])
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

{{-- Modal tambah mahasiswa --}}
@include('admin.kelolaPenggunaMahasiswa.tambahMahasiswa')

@endsection

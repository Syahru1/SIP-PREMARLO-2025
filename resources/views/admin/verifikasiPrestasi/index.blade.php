@extends('layout.template')

@section('content')
@php
    $dataPrestasi = collect([
        (object)[
            'id' => 1,
            'nim' => '2341******',
            'nama' => 'Syahrul',
            'angkatan' => '2023',
            'prodi' => 'D-IV TEKNIK INFORMATIKA',
            'status' => 'Pending'
        ],
        (object)[
            'id' => 2,
            'nim' => '2341******',
            'nama' => 'Dewita',
            'angkatan' => '2024',
            'prodi' => 'D-IV SISTEM INFORMASI BISNIS',
            'status' => 'Pending'
        ],
        (object)[
            'id' => 3,
            'nim' => '2341******',
            'nama' => 'Ghaffar',
            'angkatan' => '2023',
            'prodi' => 'D-IV TEKNIK INFORMATIKA',
            'status' => 'Pending'
        ],
        (object)[
            'id' => 4,
            'nim' => '2341******',
            'nama' => 'Afifah',
            'angkatan' => '2024',
            'prodi' => 'D-IV TEKNIK INFORMATIKA',
            'status' => 'Pending'
        ],
        (object)[
            'id' => 5,
            'nim' => '2341******',
            'nama' => 'Agil',
            'angkatan' => '2023',
            'prodi' => 'D-IV TEKNIK INFORMATIKA',
            'status' => 'Pending'
        ],
    ]);
@endphp

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
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Angkatan</th>
                                    <th>Program Studi</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataPrestasi as $index => $mhs)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $mhs->nim }}</td>
                                    <td>{{ $mhs->nama }}</td>
                                    <td>{{ $mhs->angkatan }}</td>
                                    <td>{{ $mhs->prodi }}</td>
                                    <td>
                                        <span class="badge badge-primary">{{ $mhs->status }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/verifikasi-prestasi/detail') }}" class="btn btn-outline-primary btn-sm" data-id="{{ $mhs->id }}">Lihat Detail Prestasi</a>
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
@endsection

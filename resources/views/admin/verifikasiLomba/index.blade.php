@extends('layout.template')

@section('content')
@php
    $dataLomba = collect([
        (object)[
            'id' => 1,
            'nim' => '2341******',
            'nama' => 'Syahrul',
            'angkatan' => '2023',
            'prodi' => 'D-IV TEKNIK INFORMATIKA',
            'status' => 'Pending'
        ],
    ]);
@endphp

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
                                @foreach ($dataLomba as $index => $lomba)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $lomba->nim }}</td>
                                    <td>{{ $lomba->nama }}</td>
                                    <td>{{ $lomba->angkatan }}</td>
                                    <td>{{ $lomba->prodi }}</td>
                                    <td>
                                        <span class="badge badge-primary">{{ $lomba->status }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/verifikasi-lomba/detail') }}"  class="btn btn-outline-primary btn-sm btn-detail-lomba" data-id="{{ $lomba->id }}">Lihat Detail Lomba</a>
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

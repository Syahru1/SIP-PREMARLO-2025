@extends('layout.template')

@section('content')
@php
    $dataLomba = collect([
        (object)[
            'id' => 1,
            'nama_lomba' => 'UI / UX Competition 2025',
            'kategori' => 'IT',
            'penyelenggara' => 'Universitas Indonesia',
            'tingkat_kompetisi' => 'Internasional',
            'link_pendaftaran' => 'https://infolomba.id/info-fopesco-2025-626',
            'bidang_keahlian' => 'UI / UX',
            'tanggal_pendaftaran_dibuka' => '2025-06-05',
            'tanggal_pendaftaran_ditutup' => '2025-07-05',
        ],
        (object)[
            'id' => 2,
            'nama_lomba' => 'Programing Competition 2025',
            'kategori' => 'IT',
            'penyelenggara' => 'Universitas Brawijaya',
            'tingkat_kompetisi' => 'Nasional',
            'link_pendaftaran' => 'https://infolomba.id/info-fopesco-2025-626',
            'bidang_keahlian' => 'Programing',
            'tanggal_pendaftaran_dibuka' => '2025-05-15',
            'tanggal_pendaftaran_ditutup' => '2025-06-01',
        ],
    ]);
@endphp

<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Daftar Data Lomba</h3>
        </div>
    </div>

    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahLombaModal">Tambah Lomba</button>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Lomba</th>
                                    <th>Kategori</th>
                                    <th>Penyelenggara</th>
                                    <th>Tingkat Kompetisi</th>
                                    <th>Link Pendaftaran</th>
                                    <th>Bidang Keahlian</th>
                                    <th>Tanggal Pendaftaran Dibuka</th>
                                    <th>Tanggal Pendaftaran Ditutup</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($dataLomba as $index => $lomba)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $lomba->nama_lomba }}</td>
                                    <td>{{ $lomba->kategori }}</td>
                                    <td>{{ $lomba->penyelenggara }}</td>
                                    <td>{{ $lomba->tingkat_kompetisi }}</td>
                                    <td><a href="{{ $lomba->link_pendaftaran }}" target="_blank" rel="noopener noreferrer">{{ $lomba->link_pendaftaran }}</a></td>
                                    <td>{{ $lomba->bidang_keahlian }}</td>
                                    <td>{{ $lomba->tanggal_pendaftaran_dibuka }}</td>
                                    <td>{{ $lomba->tanggal_pendaftaran_ditutup }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editLombaModal{{ $lomba->id }}">Edit</button>

                                        <form action="{{ url('admin/kelola-data-lomba/delete/'.$lomba->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>

                                        @include('admin.kelolaDataLomba.editLomba', ['lomba' => $lomba])
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

@include('admin.kelolaDataLomba.tambahLomba')

@endsection

@extends('layout.template')

@php
    $sertifikats = [
        (object)[
            'id' => 1,
            'nama' => 'Laravel Developer',
            'penyelenggara' => 'Dicoding',
            'tahun' => 2024,
            'file' => 'laravel-dev.pdf'
        ],
        (object)[
            'id' => 2,
            'nama' => 'Web Design',
            'penyelenggara' => 'Progate',
            'tahun' => 2023,
            'file' => 'web-design.pdf'
        ],
        (object)[
            'id' => 3,
            'nama' => 'Data Science Bootcamp',
            'penyelenggara' => 'DQLab',
            'tahun' => 2022,
            'file' => 'data-science.pdf'
        ],
    ];
@endphp

@section('content')
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h3>Sertifikat</h3>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">

            <!-- Tombol Tambah -->
            <button class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#createSertifikatModal">Tambah</button>


            <div class="widget-content widget-content-area">
                <div class="table-responsive mb-4">
                    <table id="column-filter" class="table">
                        <thead>
                            <tr>
                                <th class="text-secondary">#</th>
                                <th class="text-secondary">Nama Sertifikat</th>
                                <th class="text-secondary">Penyelenggara</th>
                                <th class="text-secondary">Tahun</th>
                                <th class="text-secondary">File</th>
                                <th class="text-secondary text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sertifikats as $index => $sertifikat)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $sertifikat->nama }}</td>
                                <td>{{ $sertifikat->penyelenggara }}</td>
                                <td>{{ $sertifikat->tahun }}</td>
                                <td>
                                    <a href="{{ asset('storage/sertifikat/' . $sertifikat->file) }}" target="_blank">Lihat File</a>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-secondary mb-2 mr-1" data-toggle="modal" data-target="#editSertifikatModal{{ $sertifikat->id }}">
                                        Edit
                                    </button>

                                     <form action="{{ url('mahasiswa/profil/sertifikat/' . $sertifikat->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('Yakin ingin menghapus sertifikat ini?')">
                                            Hapus
                                        </button>
                                    </form>

                                    @include('mahasiswa.profil.edit-sertifikat', ['sertifikat' => $sertifikat])
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

@include('mahasiswa.profil.create-sertifikat')

@endsection

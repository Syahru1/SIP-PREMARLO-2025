@extends('layout.template')

@php
    $pengalamans = [
        (object)[
            'id' => 1,
            'posisi' => 'Frontend Developer',
            'perusahaan' => 'PT Teknologi Nusantara',
            'tahun' => '2023',
        ],
        (object)[
            'id' => 2,
            'posisi' => 'Data Analyst',
            'perusahaan' => 'Data Corp',
            'tahun' => '2022',
        ],
        (object)[
            'id' => 3,
            'posisi' => 'UI/UX Designer',
            'perusahaan' => 'Creative Studio',
            'tahun' => '2024',
        ],
    ];
@endphp

@section('content')
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h3>Pengalaman</h3>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">

            <!-- Tombol Tambah -->
            <button class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#createPengalamanModal">Tambah</button>

            <div class="widget-content widget-content-area">
                <div class="table-responsive mb-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-secondary">#</th>
                                <th class="text-secondary">Posisi</th>
                                <th class="text-secondary">Perusahaan</th>
                                <th class="text-secondary">Tahun</th>
                                <th class="text-secondary text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengalamans as $index => $pengalaman)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pengalaman->posisi }}</td>
                                <td>{{ $pengalaman->perusahaan }}</td>
                                <td>{{ $pengalaman->tahun }}</td>
                                <td class="text-center">
                                    <button class="btn btn-secondary mb-2 mr-1" data-toggle="modal" data-target="#editPengalamanModal{{ $pengalaman->id }}">
                                        Edit
                                    </button>

                                    <form action="{{ url('mahasiswa/profil/pengalaman/' . $pengalaman->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('Yakin ingin menghapus pengalaman ini?')">
                                            Hapus
                                        </button>
                                    </form>

                                    {{-- Include Edit Modal --}}
                                    @include('dosen.profil.edit-pengalaman', ['pengalaman' => $pengalaman])
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

{{-- Include Create Modal --}}
@include('dosen.profil.create-pengalaman')

@endsection

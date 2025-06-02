@extends('layout.template')

@php
    $keahlians = [
        (object)[
            'id' => 1,
            'bidang' => 'Backend Development',
            'tingkat' => 'Tinggi',
        ],
        (object)[
            'id' => 2,
            'bidang' => 'Machine Learning',
            'tingkat' => 'Sedang',
        ],
        (object)[
            'id' => 3,
            'bidang' => 'UI/UX Design',
            'tingkat' => 'Tinggi',
        ],
    ];
@endphp

@section('content')
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h3>Keahlian</h3>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">

            <!-- Tombol Tambah -->
            <button class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#createKeahlianModal">Tambah</button>

            <div class="widget-content widget-content-area">
                <div class="table-responsive mb-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-secondary">#</th>
                                <th class="text-secondary">Bidang</th>
                                <th class="text-secondary">Tingkat</th>
                                <th class="text-secondary text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($keahlians as $index => $keahlian)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $keahlian->bidang }}</td>
                                <td>{{ $keahlian->tingkat }}</td>
                                <td class="text-center">
                                    <button class="btn btn-secondary mb-2 mr-1" data-toggle="modal" data-target="#editKeahlianModal{{ $keahlian->id }}">
                                        Edit
                                    </button>

                                    <form action="{{ url('mahasiswa/profil/keahlian/' . $keahlian->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('Yakin ingin menghapus keahlian ini?')">
                                            Hapus
                                        </button>
                                    </form>

                                    {{-- Include Edit Modal --}}
                                    @include('mahasiswa.profil.edit-bidang-keahlian', ['keahlian' => $keahlian])
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
@include('mahasiswa.profil.create-bidang-keahlian')

@endsection

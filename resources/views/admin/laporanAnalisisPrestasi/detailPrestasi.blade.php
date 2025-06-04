@extends('layout.template')

@section('content')

@php
    $mahasiswa = (object)[
        'nama' => 'Syahrul',
        'program_studi' => 'D-4 Teknik Informatika',
        'nim' => '2341720002',
        'email' => 'gunawan.wanwan@example.com',
        'prestasi' => collect([
            (object)[
                'nama_prestasi' => 'Juara 1 Olimpiade Matematika',
                'kategori' => 'Akademik',
                'tingkat' => 'Nasional',
                'industri' => 'Teknologi',
                'tahun' => '2023/2024',
            ],
            (object)[
                'nama_prestasi' => 'Finalis Lomba AI Nasional',
                'kategori' => 'Akademik',
                'tingkat' => 'Nasional',
                'industri' => 'Teknologi',
                'tahun' => '2023/2024',
            ]
        ])
    ];
@endphp

<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title mb-2">
            <h3>Detail Prestasi Mahasiswa</h3>
        </div>
    </div>
    <div class="text-end">
        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <!-- Informasi Mahasiswa -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">Informasi Mahasiswa</div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Nama</dt>
                <dd class="col-sm-9">{{ $mahasiswa->nama }}</dd>

                <dt class="col-sm-3">Program Studi</dt>
                <dd class="col-sm-9">{{ $mahasiswa->program_studi }}</dd>

                <dt class="col-sm-3">NIM</dt>
                <dd class="col-sm-9">{{ $mahasiswa->nim }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $mahasiswa->email }}</dd>
            </dl>
        </div>
    </div>

    <!-- Daftar Prestasi -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-light fw-semibold">Daftar Prestasi</div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama Prestasi</th>
                        <th>Kategori</th>
                        <th>Tingkat</th>
                        <th>Industri</th>
                        <th>Tahun</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswa->prestasi as $prestasi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $prestasi->nama_prestasi }}</td>
                            <td>{{ $prestasi->kategori }}</td>
                            <td>{{ $prestasi->tingkat }}</td>
                            <td>{{ $prestasi->industri }}</td>
                            <td>{{ $prestasi->tahun }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada prestasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

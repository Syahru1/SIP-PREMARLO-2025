@extends('layout.template')

@section('content')

@php
    $peringkatMahasiswa = collect([
        ['nama' => 'Syahrul', 'program_studi' => 'D-4 Teknik Informatika', 'jumlah_prestasi' => 8],
        ['nama' => 'Afifah', 'program_studi' => 'D-4 Sistem Informasi Bisnis', 'jumlah_prestasi' => 6],
        ['nama' => 'Dewita', 'program_studi' => 'D-2 PPLS', 'jumlah_prestasi' => 5],
    ]);

    $lombaTerverifikasi = collect([
        ['nama_lomba' => 'Olimpiade Matematika Nasional', 'kategori' => 'Akademik', 'tanggal' => '2024-10-12'],
        ['nama_lomba' => 'Business Plan Competition', 'kategori' => 'Non-Akademik', 'tanggal' => '2024-11-05'],
        ['nama_lomba' => 'Inovasi Teknologi Mahasiswa', 'kategori' => 'Akademik', 'tanggal' => '2025-01-20'],
    ]);
@endphp

<div class="layout-px-spacing">

    <!--Gambar & Teks Selamat Datang -->
    <div style="position: relative; width: 100%; height: 350px; overflow: hidden;">
        <img src="{{ asset('assets/img/beranda.svg') }}"
            alt="Kampus"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0;">

        <div style="position: absolute; top:0; left:0; width:100%; height:100%; background-color: rgba(50, 50, 50, 0.6); z-index: 1;"></div>
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
                    color: white !important; text-align: center; z-index: 2;">
            <h1 style="margin: 0; font-weight: 700; color: white !important;">Selamat Datang, Admin!</h1>
            <p class="lead" style="color: white !important; margin: 0;">Sistem Informasi Pencatatan Prestasi Mahasiswa dan Rekomendasi Lomba</p>
        </div>
    </div>

    <!-- Leaderboard Mahasiswa Berprestasi -->
    <div class="card component-card_4 mb-4">
        <div class="card-body">
            <h5 class="mb-4 text-center text-dark fw-bold">Leaderboard Mahasiswa Berprestasi</h5>

            <div class="row">
                @foreach ($peringkatMahasiswa as $index => $mhs)
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm h-100">
                            <div class="card-body d-flex align-items-center">
                                <div class="usr-img-frame me-3 border border-dark rounded-circle">
                                    <img alt="avatar" src="{{ asset('assets/img/90x90.jpg') }}" class="img-fluid rounded-circle" width="50" height="50">
                                </div>
                                <div>
                                    <h6 class="mb-0">{{ $mhs['nama'] }}</h6>
                                    <small class="text-muted">{{ $mhs['program_studi'] }}</small><br>
                                    <span class="badge bg-success mt-1">Prestasi: {{ $mhs['jumlah_prestasi'] }}</span>
                                </div>
                                <div class="ms-auto fs-5 text-secondary fw-bold">#{{ $index + 1 }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Lomba Terverifikasi -->
    <div class="card component-card_4 mb-4">
        <div class="card-body">
            <h5 class="mb-4 text-center text-dark fw-bold">Lomba yang Telah Diverifikasi</h5>

            <div class="row">
                @foreach ($lombaTerverifikasi as $lomba)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $lomba['nama_lomba'] }}</h5>
                                <p class="mb-1"><strong>Kategori:</strong> {{ $lomba['kategori'] }}</p>
                                <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($lomba['tanggal'])->format('d M Y') }}</p>
                                <a href="#" class="btn btn-sm btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection

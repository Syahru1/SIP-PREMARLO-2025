@extends('layout.template')

@section('content')
<!-- Student Info -->
<div class="container-fluid py-2">
    <div class="card mb-4 shadow-sm border-dark">
        <div class="card-header text-black fw-bold border-dark">
            Informasi Mahasiswa
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <!-- Foto Mahasiswa -->
                <div class="col-md-2 text-center">
                    <div class="rounded-circle overflow-hidden border" style="width: 75px; height: 75px; margin: auto;">
                        <img src="{{ asset('assets/images/user-default.jpg') }}" alt="Foto Mahasiswa"
                             class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>

                <!-- Informasi Mahasiswa -->
                <div class="col-md-10">
                    <div class="row mb-2">
                        <div class="col fw-semibold">Nama</div>
                        <div class="col fw-semibold">NIM</div>
                        <div class="col fw-semibold">Program Studi</div>
                    </div>
                    <div class="row">
                        <div class="col text-black">Mahasiswa B</div>
                        <div class="col text-black">123456789</div>
                        <div class="col text-black">Teknik Informatika</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Achievements List with Filter Inside -->
    <div class="container-fluid py-2">
    <div class="card mb-4  shadow-sm border-dark">
    <div class="card-header text-black fw-bold border-dark">
        Daftar Prestasi
    </div>
    <div class="card-body p-4">
        <!-- Filter Form Inside Achievements Section -->
       <form method="GET" action="" class="mb-4">
        <div class="row">
            <!-- Kategori -->
            <div class="col-md-6">
                <label class="form-label fw-semibold text-black mb-1">Kategori</label>
                <div class="dropdown w-100">
                    <button class="btn btn-light text-black border-dark dropdown-toggle w-100 d-flex justify-content-between align-items-center px-3"
                        type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ request('kategori') ? ucfirst(request('kategori')) : 'Pilih Kategori' }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <div class="dropdown-menu w-100">
                        <a class="dropdown-item" href="?kategori=akademik&tahun={{ request('tahun') }}">Akademik</a>
                        <a class="dropdown-item" href="?kategori=non-akademik&tahun={{ request('tahun') }}">Non-Akademik</a>
                    </div>
                </div>
            </div>

            <!-- Tahun -->
            <div class="col-md-6">
                <label class="form-label fw-semibold text-black mb-1">Tahun</label>
                <div class="dropdown w-100">
                    <button class="btn btn-light text-black border-dark dropdown-toggle w-100 d-flex justify-content-between align-items-center px-3"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ request('tahun') ?? 'Pilih Tahun' }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <div class="dropdown-menu w-100" style="max-height: 200px; overflow-y: auto;">
                        @foreach (range(date('Y'), 2020) as $year)
                            <a class="dropdown-item" href="?kategori={{ request('kategori') }}&tahun={{ $year }}">{{ $year }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </form>

        <!-- Achievements List -->
        <ul class="list-group list-group-flush">
            @foreach ([
                ['title' => 'Juara 1 Lomba UI/UX', 'category' => 'Non-Akademik', 'year' => 2024],
                ['title' => 'IPK Tertinggi Semester 5', 'category' => 'Akademik', 'year' => 2023]
            ] as $achievement)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $achievement['title'] }}</strong>
                            <p class="mb-0 text-muted">Kategori: {{ $achievement['category'] }} | Tahun: {{ $achievement['year'] }}</p>
                        </div>
                        <a href="#" class="btn btn-primary btn-sm">Lihat Bukti</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    </div>
    </div>

    <!-- Competition Guidance Request -->
    <div class="container-fluid ">
    <div class="card border-dark shadow-sm">
        <div class="card-header  text-black  fw-bold border-dark">
            Permohonan Bimbingan Lomba
        </div>
        <form method="POST" action="#">
            @csrf
            <div class="card-body">
                <div class="mb-3"><strong>Nama Lomba:</strong> UI/UX Nasional 2025</div>
                <div class="mb-3"><strong>Nama Tim:</strong> Tim Kreatif B</div>
                <div class="mb-3"><strong>Anggota:</strong> Mahasiswa B, Mahasiswa C, Mahasiswa D</div>
                <div class="mb-3"><strong>Keterangan Lomba:</strong> Lomba desain UI/UX tingkat nasional yang diselenggarakan oleh ABC University</div>
                <div class="mb-3"><strong>Proposal:</strong> <a href="#" class="text-success">Download Proposal</a></div>
                <div class="mb-3">
                    <label for="catatan" class="form-label fw-bold">Catatan Dosen (opsional):</label>
                    <textarea class="form-control" name="catatan" id="catatan" rows="3" placeholder="Tulis catatan tambahan di sini..."></textarea>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end gap-2">
                <button type="submit" name="status" value="tolak" class="btn btn-danger mr-2">Tolak</button>
                <button type="submit" name="status" value="terima" class="btn btn-success">Terima</button>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection
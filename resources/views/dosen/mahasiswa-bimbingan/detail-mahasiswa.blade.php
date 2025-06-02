@extends('layout.template')

@section('content')
<div class="container">
    <!-- Info Mahasiswa -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title mb-1"><strong>Mahasiswa B</strong></h5>
            <p class="mb-0 text-muted">NIM: 123456789</p>
            <p class="text-muted">Program Studi: Teknik Informatika</p>
        </div>
    </div>

    <!-- Filter Prestasi -->
    <form method="GET" action="">
        <div class="row mb-3">
            <div class="col-md-4">
                <select name="kategori" class="form-control">
                    <option value="">-- Semua Kategori --</option>
                    <option value="akademik">Akademik</option>
                    <option value="non-akademik">Non-Akademik</option>
                </select>
            </div>
            <div class="col-md-4">
                <select name="tahun" class="form-control">
                    <option value="">-- Semua Tahun --</option>
                    @for ($year = date('Y'); $year >= 2020; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <!-- Daftar Prestasi -->
    <div class="card mb-4">
        <div class="card-header">Daftar Prestasi</div>
        <div class="card-body">
            <ul class="list-group">
                {{-- Loop data prestasi --}}
                <li class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>Juara 1 Lomba UI/UX</strong>
                            <p class="mb-0">Kategori: Non-Akademik | Tahun: 2024</p>
                        </div>
                        <a href="#" class="btn btn-sm btn-outline-primary">Lihat Bukti</a>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>IPK Tertinggi Semester 5</strong>
                            <p class="mb-0">Kategori: Akademik | Tahun: 2023</p>
                        </div>
                        <a href="#" class="btn btn-sm btn-outline-primary">Lihat Bukti</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Catatan Dosen -->
    <div class="card">
        <div class="card-header">Catatan Dosen Pembimbing</div>
        <div class="card-body">
            <form method="POST" action="#">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" name="catatan" rows="4" placeholder="Tulis catatan tambahan di sini..."></textarea>
                </div>
                <button type="submit" class="btn btn-success">Simpan Catatan</button>
            </form>
        </div>
    </div>
</div>
@endsection
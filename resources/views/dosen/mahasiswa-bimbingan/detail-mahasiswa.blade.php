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

    <!-- Permohonan Bimbingan & Catatan -->
    <div class="card">
        <div class="card-header">Permohonan Bimbingan Lomba</div>
        <form method="POST" action="#">
            @csrf
            <div class="card-body">
                <p><strong>Nama Lomba:</strong> UI/UX Nasional 2025</p>
                <p><strong>Nama Tim:</strong> Tim Kreatif B</p>
                <p><strong>Anggota:</strong> Mahasiswa B, Mahasiswa C, Mahasiswa D</p>
                <p><strong>Keterangan Lomba:</strong> Lomba desain UI/UX tingkat nasional yang diselenggarakan oleh ABC University</p>
                <p><strong>Proposal:</strong> <a href="#">Download Proposal</a></p>

                <div class="mb-3">
                    <label for="catatan" class="form-label">Catatan Dosen (opsional):</label>
                    <textarea class="form-control" name="catatan" id="catatan" rows="3" placeholder="Tulis catatan tambahan di sini..."></textarea>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" name="status" value="tolak" class="btn btn-danger me-2 mr-2">Tolak</button>
                <button type="submit" name="status" value="terima" class="btn btn-success">Terima</button>
            </div>
        </form>
    </div>
</div>
@endsection

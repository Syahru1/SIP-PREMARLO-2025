@extends('layout.template')

@section('content')

@php
    $laporanPrestasi = collect([
        (object)[
            'nama' => 'Syahrul',
            'program_studi' => 'D-4 Teknik Informatika',
            'kategori' => 'Akademik',
            'tingkat' => 'Nasional',
            'industri' => 'Teknologi',
            'tahun' => '2023/2024',
        ],
        (object)[
            'nama' => 'Afifah',
            'program_studi' => 'D-4 Sistem Informasi Bisnis',
            'kategori' => 'Non-Akademik',
            'tingkat' => 'Internasional',
            'industri' => 'Bisnis',
            'tahun' => '2024/2025',
        ],
        (object)[
            'nama' => 'Dewita',
            'program_studi' => 'D-2 PPLS',
            'kategori' => 'Akademik',
            'tingkat' => 'Provinsi',
            'industri' => 'Energi',
            'tahun' => '2022/2023',
        ],
    ]);
@endphp

<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Laporan & Analisis Prestasi Mahasiswa</h3>
        </div>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">Filter Laporan</div>
        <div class="card-body">
            <form>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Kategori Lomba</label>
                        <select class="form-select">
                            <option value="">Semua</option>
                            <option>Akademik</option>
                            <option>Non-Akademik</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tingkat</label>
                        <select class="form-select">
                            <option value="">Semua</option>
                            <option>Provinsi</option>
                            <option>Nasional</option>
                            <option>Internasional</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tahun Akademik</label>
                        <select class="form-select">
                            <option value="">Semua</option>
                            <option>2021/2022</option>
                            <option>2022/2023</option>
                            <option>2023/2024</option>
                            <option>2024/2025</option>
                        </select>
                    </div>
                </div>

                <div class="mt-3 text-end">
                    <button class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Grafik Jumlah Prestasi per Tahun -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-light fw-semibold">Statistik Jumlah Prestasi Mahasiswa (per Tahun)</div>
        <div class="card-body">
            <canvas id="chartJumlahPrestasi" height="50"></canvas>
        </div>
    </div>

    <!-- Grafik Tren Prestasi berdasarkan Industri -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-light fw-semibold">Tren Prestasi Mahasiswa terhadap Bidang Industri</div>
        <div class="card-body">
            <canvas id="chartIndustri" height="50"></canvas>
        </div>
    </div>

    <!-- Tabel Prestasi -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center bg-light fw-semibold">
            <span>Daftar Prestasi Mahasiswa</span>
            <div>
                <button class="btn btn-sm btn-danger">Export PDF</button>
                <button class="btn btn-sm btn-success">Export Excel</button>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama Mahasiswa</th>
                        <th>Program Studi</th>
                        <th>Kategori</th>
                        <th>Tingkat</th>
                        <th>Industri</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($laporanPrestasi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->program_studi }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->tingkat }}</td>
                            <td>{{ $item->industri }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td>
                                <a href="{{ url('/admin/laporan-analisis-prestasi/detail') }}" class="btn btn-info btn-sm">Lihat Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada data prestasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Evaluasi Rekomendasi -->
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-light fw-semibold">Evaluasi Efektivitas Sistem Rekomendasi</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        <li><strong>Total Rekomendasi Diberikan:</strong> 120</li>
                        <li><strong>Jumlah Prestasi dari Rekomendasi:</strong> 45 mahasiswa</li>
                        <li><strong>Efektivitas:</strong> 37.5%</li>
                        <li><strong>Feedback Mahasiswa:</strong> Sebagian besar merasa rekomendasi sangat membantu</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="card-body d-flex justify-content-center">
                        <canvas id="chartEvaluasi" style="max-width: 300px; max-height: 300px; width: 100%; height: auto;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data jumlah prestasi per tahun diambil dari dummy collection
    const ctxJumlah = document.getElementById('chartJumlahPrestasi').getContext('2d');
    new Chart(ctxJumlah, {
        type: 'bar',
        data: {
            labels: ['2021/2022', '2022/2023', '2023/2024', '2024/2025'],
            datasets: [{
                label: 'Jumlah Prestasi',
                data: [12, 19, 14, 22],
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 }
                }
            }
        }
    });

    // Grafik Tren Prestasi berdasarkan Industri
    const ctxIndustri = document.getElementById('chartIndustri').getContext('2d');
    new Chart(ctxIndustri, {
        type: 'line',
        data: {
            labels: ['Teknologi', 'Bisnis', 'Pendidikan', 'Kesehatan', 'Energi'],
            datasets: [{
                label: 'Jumlah Prestasi',
                data: [10, 7, 5, 4, 3],
                fill: false,
                borderColor: 'rgba(75, 192, 192, 1)',
                tension: 0.3
            }]
        },
        options: {
            responsive: true
        }
    });

    // Grafik Evaluasi Rekomendasi (Pie)
    const ctxEvaluasi = document.getElementById('chartEvaluasi').getContext('2d');
    new Chart(ctxEvaluasi, {
        type: 'pie',
        data: {
            labels: ['Berdampak', 'Tidak Berdampak'],
            datasets: [{
                data: [45, 75],
                backgroundColor: ['#28a745', '#dc3545']
            }]
        },
        options: {
            responsive: true
        }
    });
</script>
@endsection

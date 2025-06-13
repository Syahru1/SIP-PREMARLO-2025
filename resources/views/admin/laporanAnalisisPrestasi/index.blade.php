@extends('layout.template')

@section('content')
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Laporan & Analisis Prestasi Mahasiswa</h3>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col">
                <!-- Grafik Jumlah Prestasi per Tahun -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-light fw-semibold">Statistik Jumlah Prestasi Mahasiswa (per Tahun)</div>
                    <div class="card-body">
                        <canvas id="chartJumlahPrestasi" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="form-group col">
                <!-- Grafik Persentase Prestasi Berdasarkan Jenis -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-light fw-semibold">Persentase Prestasi Berdasarkan Bidang</div>
                    <div class="card-body">
                        <canvas id="chartJenisPrestasi" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>




        <!-- Tabel Prestasi -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center bg-light fw-semibold">
                <span>Daftar Prestasi Mahasiswa</span>
                <div>
                    <a href="{{ url('admin/laporan-analisis-prestasi/export_pdf') }}" class="btn btn-sm btn-danger">Export
                        PDF</a>
                    <a href="{{ url('admin/laporan-analisis-prestasi/export_excel') }}"
                        class="btn btn-sm btn-success">Export Excel</a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover" id="tabel_prestasi">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Mahasiswa</th>
                            <th>Program Studi</th>
                            <th>Nama Kompetisi</th>
                            <th>Jenis Prestasi</th>
                            <th>Tingkat</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($prestasi as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->mahasiswa->nama }}</td>
                                <td>{{ $data->prodi->nama_prodi }}</td>
                                <td>{{ $data->nama_kompetisi }}</td>
                                <td>{{ $data->jenis_prestasi }}</td>
                                <td>{{ $data->tingkat_kompetisi }}</td>
                                <td>{{ $data->periode->nama_periode }}</td>
                                <td>
                                    <a href="{{ url('/admin/laporan-analisis-prestasi/detail/' . $data->id_prestasi) }}"
                                        class="btn btn-info btn-sm">Lihat Detail</a>
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

    </div>
@endsection

@push('js')
    <!-- jQuery (harus sebelum DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const prestasiPerTahun = @json($prestasiPerTahun);
        const prestasiPerJenis = @json($prestasiPerJenis);

        console.log("Prestasi Per Tahun:", prestasiPerTahun);
        console.log("Prestasi Per Jenis:", prestasiPerJenis);

        // Chart 1: Jumlah Prestasi per Tahun
        const tahunLabels = Object.keys(prestasiPerTahun);
        const tahunData = Object.values(prestasiPerTahun);

        const ctxTahun = document.getElementById('chartJumlahPrestasi').getContext('2d');
        new Chart(ctxTahun, {
            type: 'bar',
            data: {
                labels: tahunLabels,
                datasets: [{
                    label: 'Jumlah Prestasi',
                    data: tahunData,
                    backgroundColor: '#007bff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                aspectRatio: 2,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1, // Supaya jarak antar garis 1-1
                            precision: 0 // Supaya tidak ada desimal (koma)
                        }
                    }
                }
            }
        });

        // Chart 2: Pie Chart Prestasi berdasarkan Jenis Prestasi
        const jenisLabels = Object.keys(prestasiPerJenis);
        const jenisData = Object.values(prestasiPerJenis);

        const ctxJenis = document.getElementById('chartJenisPrestasi').getContext('2d');
        new Chart(ctxJenis, {
            type: 'pie',
            data: {
                labels: jenisLabels,
                datasets: [{
                    data: jenisData,
                    backgroundColor: ['#28a745', '#ffc107', '#dc3545', '#17a2b8']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                aspectRatio: 1.5 // proporsional pie chart
            }
        });
    </script>
@endpush

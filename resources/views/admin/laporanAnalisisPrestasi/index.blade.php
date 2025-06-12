@extends('layout.template')

@section('content')

<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Laporan & Analisis Prestasi Mahasiswa</h3>
        </div>
    </div>

    {{-- <div class="card mb-4 shadow-sm">
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
    </div> --}}

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
            <a href="{{ url('admin/laporan-analisis-prestasi/export_pdf') }}" class="btn btn-sm btn-danger">Export PDF</a>
            <a href="{{ url('admin/laporan-analisis-prestasi/export_excel') }}" class="btn btn-sm btn-success">Export Excel</a>
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
                            <a href="{{ url('/admin/laporan-analisis-prestasi/detail/' .$data->id_prestasi) }}" class="btn btn-info btn-sm">Lihat Detail</a>
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
                    <canvas id="chartEvaluasi" style="max-width: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- jQuery (harus sebelum DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- DataTables + Buttons -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<script>
    // Inisialisasi DataTable
    $(document).ready(function () {
        $('#tabel_prestasi').DataTable({
            dom: 'Bfrtip',
            buttons: [
                { extend: 'excel', className: 'btn btn-sm btn-success' },
                { extend: 'pdf', className: 'btn btn-sm btn-danger' }
            ]
        });

        // Pie Chart Evaluasi
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
    });
</script>
@endsection

@extends('layout.template')

@section('content')
<div class="layout-px-spacing">

    <h4 class="mb-4 fw-bold">Rekomendasi Lomba Mahasiswa</h4>

    @php
        $mahasiswaList = [
            ['id' => 1, 'nama' => 'Syahrul', 'prodi' => 'D-4 Teknik Informatika', 'angkatan' => 2021, 'prestasi' => 8],
            ['id' => 2, 'nama' => 'Afifah', 'prodi' => 'D-4 Sistem Informasi Bisnis', 'angkatan' => 2022, 'prestasi' => 6],
            ['id' => 3, 'nama' => 'Dewita', 'prodi' => 'D-2 PPLS', 'angkatan' => 2023, 'prestasi' => 5],
        ];

        $lombaList = [
            ['nama' => 'Olimpiade Matematika Nasional', 'kategori' => 'Akademik', 'tanggal' => '2024-10-12'],
            ['nama' => 'Business Plan Competition', 'kategori' => 'Non-Akademik', 'tanggal' => '2024-11-05'],
            ['nama' => 'Inovasi Teknologi Mahasiswa', 'kategori' => 'Akademik', 'tanggal' => '2025-01-20'],
        ];

        $dosenPendamping = [
            'Akademik' => 'Dr. Budi Santoso',
            'Non-Akademik' => 'Ibu Sari Wulandari',
        ];
    @endphp

    <!-- Jumlah data yang ditampilkan -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <label for="showEntries">Tampilkan:</label>
            <select id="showEntries" class="form-select d-inline-block w-auto ms-2">
                <option selected>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <span class="ms-2">data per halaman</span>
        </div>
        <div>
            <small>Menampilkan {{ count($mahasiswaList ?? []) }} dari {{ count($mahasiswaList ?? []) }} total data</small>
        </div>
    </div>

    <!--Filter Pencarian -->
    <form class="card p-3 mb-4">
        <div class="row g-3">
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Cari Nama Mahasiswa">
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option selected disabled>Pilih Program Studi</option>
                    <option>D-4 Teknik Informatika</option>
                    <option>D-4 Sistem Informasi Bisnis</option>
                    <option>D-2 PPLS</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option selected disabled>Pilih Angkatan</option>
                    <option>2022</option>
                    <option>2023</option>
                    <option>2024</option>
                    <option>2025</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
            </div>
        </div>
    </form>

    <!-- Tabel Mahasiswa -->
    <div class="card p-3">
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                        <th>Angkatan</th>
                        <th>Jumlah Prestasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswaList as $index => $mhs)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $mhs['nama'] }}</td>
                            <td>{{ $mhs['prodi'] }}</td>
                            <td>{{ $mhs['angkatan'] }}</td>
                            <td>{{ $mhs['prestasi'] }}</td>
                            <td>
                                <a href="{{ url('/admin/rekomendasi-lomba/lihat') }}" class="btn btn-info btn-sm">
                                    Lihat Rekomendasi
                                </a>
                            </td>
                        </tr>

                        <!-- Modal Rekomendasi -->
                        <div class="modal fade" id="modal{{ $mhs['id'] }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Rekomendasi Lomba untuk {{ $mhs['nama'] }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        @php
                                            $rekomendasi = [];
                                            foreach ($lombaList as $lomba) {
                                                if ($mhs['prestasi'] >= 7 && $lomba['kategori'] === 'Akademik') {
                                                    $rekomendasi[] = $lomba;
                                                } elseif ($mhs['prestasi'] < 7 && $lomba['kategori'] === 'Non-Akademik') {
                                                    $rekomendasi[] = $lomba;
                                                }
                                            }
                                        @endphp

                                        @if (count($rekomendasi) > 0)
                                            <ul class="list-group">
                                                @foreach ($rekomendasi as $lomba)
                                                    <li class="list-group-item">
                                                        <strong>{{ $lomba['nama'] }}</strong><br>
                                                        Kategori: {{ $lomba['kategori'] }} <br>
                                                        Tanggal: {{ \Carbon\Carbon::parse($lomba['tanggal'])->format('d M Y') }} <br>
                                                        Dosen Pendamping: {{ $dosenPendamping[$lomba['kategori']] ?? '-' }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-muted">Belum ada rekomendasi lomba yang sesuai.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Navigasi Halaman Dummy -->
        <div class="d-flex justify-content-end mt-3">
            <nav>
                <ul class="pagination mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#">Sebelumnya</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Berikutnya</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection

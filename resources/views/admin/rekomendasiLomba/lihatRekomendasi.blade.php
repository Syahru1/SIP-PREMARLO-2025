@extends('layout.template')

@section('content')
<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 mt-5 d-flex justify-content-between align-items-center">
                    <h4>Perhitungan MOORA Berdasarkan Rekomendasi Lomba</h4>
                    <a href="{{ url('/admin/rekomendasi-lomba') }}" class="btn btn-secondary mb-3">Kembali</a>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area justify-pill">

            {{-- NAV PILLS --}}
            <ul class="nav nav-pills mb-3 mt-3 nav-fill" id="justify-pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="step1-tab" data-toggle="pill" href="#step1" role="tab" aria-controls="step1" aria-selected="false">Langkah 1: Matriks Keputusan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="step2-tab" data-toggle="pill" href="#step2" role="tab" aria-controls="step2" aria-selected="false">Langkah 2: Normalisasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="step3-tab" data-toggle="pill" href="#step3" role="tab" aria-controls="step3" aria-selected="false">Langkah 3: Matriks Terbobot</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="step4-tab" data-toggle="pill" href="#step4" role="tab" aria-controls="step4" aria-selected="false">Langkah 4: Skor Akhir</a>
                </li>
            </ul>
           {{-- TAB CONTENT --}}
            <div class="tab-content" id="justify-pills-tabContent">
                {{-- Include semua perhitungan dan data di sini --}}
                @php
                    $mahasiswa = [
                        'id' => 1,
                        'nama' => 'Syahrul',
                        'prodi' => 'D-4 Teknik Informatika',
                        'angkatan' => 2021,
                        'prestasi' => 8,
                    ];

                    $lombaList = [
                        ['nama' => 'Kompetisi Data Science Nasional', 'kategori' => 'Akademik', 'tanggal' => '2024-10-12', 'nilai_kriteria' => [3, 3, 10, 3, 3]],
                        ['nama' => 'Hackathon Mahasiswa Indonesia', 'kategori' => 'Akademik', 'tanggal' => '2024-11-05', 'nilai_kriteria' => [2, 2, 9, 2, 2]],
                        ['nama' => 'Startup Idea Competition', 'kategori' => 'Akademik', 'tanggal' => '2025-01-20', 'nilai_kriteria' => [4, 1, 7, 1, 1]],
                        ['nama' => 'Lomba Inovasi Teknologi', 'kategori' => 'Akademik', 'tanggal' => '2024-09-15', 'nilai_kriteria' => [1, 3, 6, 3, 3]],
                        ['nama' => 'AI Challenge Nasional', 'kategori' => 'Akademik', 'tanggal' => '2024-12-01', 'nilai_kriteria' => [1, 1, 3, 2, 3]],
                        ['nama' => 'Lomba Desain UX/UI', 'kategori' => 'Akademik', 'tanggal' => '2025-02-10', 'nilai_kriteria' => [4, 3, 2, 1, 2]],
                        ['nama' => 'Business Plan Competition', 'kategori' => 'Akademik', 'tanggal' => '2024-08-22', 'nilai_kriteria' => [3, 3, 5, 2, 1]],
                        ['nama' => 'Kompetisi Robotika Kampus', 'kategori' => 'Akademik', 'tanggal' => '2024-11-25', 'nilai_kriteria' => [2, 2, 4, 1, 2]],
                        ['nama' => 'Technopreneur Bootcamp', 'kategori' => 'Akademik', 'tanggal' => '2024-07-30', 'nilai_kriteria' => [1, 3, 1, 1, 3]],
                        ['nama' => 'National IT Olympiad', 'kategori' => 'Akademik', 'tanggal' => '2024-10-18', 'nilai_kriteria' => [4, 1, 8, 2, 2]],
                    ];

                    $dosenPendamping = [
                        'Akademik' => 'Dr. Budi Santoso',
                        'Non-Akademik' => 'Ibu Sari Wulandari',
                    ];

                    // Filter rekomendasi berdasarkan prestasi
                    $rekomendasi = [];
                    foreach ($lombaList as $lomba) {
                        if ($mahasiswa['prestasi'] >= 7 && $lomba['kategori'] === 'Akademik') {
                            $rekomendasi[] = $lomba;
                        } elseif ($mahasiswa['prestasi'] < 7 && $lomba['kategori'] === 'Non-Akademik') {
                            $rekomendasi[] = $lomba;
                        }
                    }

                    $kriteria = [
                        ['nama' => 'Relevansi Topik', 'bobot' => 30, 'jenis' => 'benefit'],
                        ['nama' => 'Reputasi Penyelenggara', 'bobot' => 15, 'jenis' => 'benefit'],
                        ['nama' => 'Hadiah/Insentif', 'bobot' => 20, 'jenis' => 'benefit'],
                        ['nama' => 'Biaya Pendaftaran', 'bobot' => 15, 'jenis' => 'cost'],
                        ['nama' => 'Tingkat Kompetisi', 'bobot' => 20, 'jenis' => 'benefit'],
                    ];

                    $bobot = array_column($kriteria, 'bobot');
                    $jenis = array_column($kriteria, 'jenis');

                    // Normalisasi
                    $totalKuadrat = array_fill(0, count($bobot), 0);
                    foreach ($rekomendasi as $lomba) {
                        foreach ($lomba['nilai_kriteria'] as $i => $nilai) {
                            $totalKuadrat[$i] += pow($nilai, 2);
                        }
                    }

                    $normalisasi = [];
                    foreach ($rekomendasi as $i => $lomba) {
                        foreach ($lomba['nilai_kriteria'] as $j => $nilai) {
                            $normalisasi[$i][$j] = $nilai / sqrt($totalKuadrat[$j]);
                        }
                    }

                    // Matriks Terbobot
                    $terbobot = [];
                    foreach ($normalisasi as $i => $baris) {
                        foreach ($baris as $j => $nilai) {
                            $terbobot[$i][$j] = $nilai * $bobot[$j];
                        }
                    }

                    // Skor Akhir MOORA
                    $hasilMoora = [];
                    foreach ($terbobot as $i => $baris) {
                        $benefit = 0;
                        $cost = 0;
                        foreach ($baris as $j => $nilai) {
                            if ($jenis[$j] === 'benefit') {
                                $benefit += $nilai;
                            } else {
                                $cost += $nilai;
                            }
                        }
                        $skor = $benefit - $cost;
                        $hasilMoora[] = [
                            'nama' => $rekomendasi[$i]['nama'],
                            'skor' => $skor,
                            'kategori' => $rekomendasi[$i]['kategori'],
                            'tanggal' => $rekomendasi[$i]['tanggal'],
                            'dosen' => $dosenPendamping[$rekomendasi[$i]['kategori']],
                            'nilai_kriteria' => $rekomendasi[$i]['nilai_kriteria'],
                        ];
                    }

                    usort($hasilMoora, fn($a, $b) => $b['skor'] <=> $a['skor']);
                @endphp

                {{-- Langkah 1 --}}
                <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">
                    <h5 class="mb-3">Langkah 1: Matriks Keputusan</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                @foreach ($kriteria as $k)
                                    <th>{{ $k['nama'] }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekomendasi as $lomba)
                                <tr>
                                    <td>{{ $lomba['nama'] }}</td>
                                    @foreach ($lomba['nilai_kriteria'] as $nilai)
                                        <td>{{ $nilai }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Langkah 2 --}}
                <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">
                    <h5 class="mb-3">Langkah 2: Matriks Normalisasi</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                @foreach ($kriteria as $k)
                                    <th>{{ $k['nama'] }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($normalisasi as $i => $baris)
                                <tr>
                                    <td>{{ $rekomendasi[$i]['nama'] }}</td>
                                    @foreach ($baris as $nilai)
                                        <td>{{ number_format($nilai, 4) }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Langkah 3 --}}
                <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="step3-tab">
                    <h5 class="mb-3">Langkah 3: Matriks Terbobot</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                @foreach ($kriteria as $k)
                                    <th>{{ $k['nama'] }} ({{ $k['bobot'] }})</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($terbobot as $i => $baris)
                                <tr>
                                    <td>{{ $rekomendasi[$i]['nama'] }}</td>
                                    @foreach ($baris as $nilai)
                                        <td>{{ number_format($nilai, 4) }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Langkah 4 --}}
                <div class="tab-pane fade" id="step4" role="tabpanel" aria-labelledby="step4-tab">
                    <h5 class="mb-3">Langkah 4: Skor Akhir & Peringkat</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Peringkat</th>
                                <th>Alternatif</th>
                                <th>Skor Akhir</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>Dosen Pendamping</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hasilMoora as $i => $hasil)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $hasil['nama'] }}</td>
                                    <td>{{ number_format($hasil['skor'], 4) }}</td>
                                    <td>{{ $hasil['kategori'] }}</td>
                                    <td>{{ \Carbon\Carbon::parse($hasil['tanggal'])->format('d M Y') }}</td>
                                    <td>{{ $hasil['dosen'] }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info btn-detail" data-index="{{ $i }}">Detail</button>
                                    </td>
                                </tr>
                                <tr class="detail-row" style="display:none;">
                                    <td colspan="7">
                                        <div class="detail-content p-3 bg-light border rounded"></div>
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

{{-- SCRIPT --}}
<script>
    function toggleStep(stepId) {
        document.querySelectorAll('.step-section').forEach(el => el.style.display = 'none');
        document.getElementById(stepId).style.display = 'block';
    }

    const hasilMoora = @json($hasilMoora);
    const kriteriaNames = @json(array_column($kriteria, 'nama'));

    document.querySelectorAll('.btn-detail').forEach(button => {
        button.addEventListener('click', function () {
            const index = this.getAttribute('data-index');
            const detailRow = this.closest('tr').nextElementSibling;
            const detailContent = detailRow.querySelector('.detail-content');

            if (detailRow.style.display === 'table-row') {
                detailRow.style.display = 'none';
                detailContent.innerHTML = '';
                return;
            }

            const lomba = hasilMoora[index];
            const nilaiList = lomba.nilai_kriteria.map((nilai, i) => `<li>${kriteriaNames[i]}: ${nilai}</li>`).join('');

            detailContent.innerHTML = `
                <strong>Nama Lomba:</strong> ${lomba.nama} <br>
                <strong>Kategori:</strong> ${lomba.kategori} <br>
                <strong>Tanggal:</strong> ${new Date(lomba.tanggal).toLocaleDateString()} <br>
                <strong>Dosen Pendamping:</strong> ${lomba.dosen} <br>
                <strong>Nilai Kriteria:</strong>
                <ul>${nilaiList}</ul>
            `;

            detailRow.style.display = 'table-row';
        });
    });
</script>
@endsection

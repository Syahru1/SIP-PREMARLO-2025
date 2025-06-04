@extends('layout.template')

@section('content')
<div class="layout-px-spacing">
    <div class="card p-4">
        @php
            $mahasiswa = [
                'id' => 1,
                'nama' => 'Syahrul',
                'prodi' => 'D-4 Teknik Informatika',
                'angkatan' => 2021,
                'prestasi' => 8,
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

            $rekomendasi = [];
            foreach ($lombaList as $lomba) {
                if ($mahasiswa['prestasi'] >= 7 && $lomba['kategori'] === 'Akademik') {
                    $rekomendasi[] = $lomba;
                } elseif ($mahasiswa['prestasi'] < 7 && $lomba['kategori'] === 'Non-Akademik') {
                    $rekomendasi[] = $lomba;
                }
            }
        @endphp

        <h4 class="fw-bold mb-4">Rekomendasi Lomba untuk {{ $mahasiswa['nama'] }}</h4>

        <div class="mb-3">
            <strong>Nama:</strong> {{ $mahasiswa['nama'] }} <br>
            <strong>Program Studi:</strong> {{ $mahasiswa['prodi'] }} <br>
            <strong>Angkatan:</strong> {{ $mahasiswa['angkatan'] }} <br>
            <strong>Jumlah Prestasi:</strong> {{ $mahasiswa['prestasi'] }}
        </div>

        <h5 class="mt-4 mb-3">Daftar Rekomendasi Lomba</h5>

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

        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection

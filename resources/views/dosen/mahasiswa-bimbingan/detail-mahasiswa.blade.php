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
                        <img src="{{ url('uploads/profil/'.$dospem->mahasiswa->foto) }}" alt="Foto Mahasiswa"
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
                        <div class="col text-black">{{$dospem->mahasiswa->nama}}</div>
                        <div class="col text-black">{{$dospem->mahasiswa->nim}}</div>
                        <div class="col text-black">{{$dospem->mahasiswa->prodi->nama_prodi}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

{{--
    <div class="container-fluid py-2">
        @foreach ($prestasiMahasiswaList as $prestasiMahasiswa)
            <div class="d-flex justify-content-between align-items-center border-bottom py-3">
                <div>
                    <strong>{{ $prestasiMahasiswa->mahasiswa->nama }}</strong><br>
                    NIM: {{ $prestasiMahasiswa->mahasiswa->nim }} - {{ $prestasiMahasiswa->mahasiswa->prodi->nama_prodi }}

                    <!-- Prestasi Mahasiswa -->
                    <ul class="list-group list-group-flush mt-2">
                        @forelse ($prestasiMahasiswa->mahasiswa->prestasi as $prestasi)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $prestasi->nama_prestasi }}</strong>
                                        <p class="mb-0 text-muted">Kategori: {{ $prestasi->kategori }} | Tahun: {{ $prestasi->tahun }}</p>
                                    </div>
                                    <a href="{{ asset('uploads/bukti/'.$prestasi->bukti_prestasi) }}" target="_blank" class="btn btn-primary btn-sm">Lihat Bukti</a>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item text-muted">Belum ada prestasi yang diverifikasi.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        @endforeach

    </div> --}}


    <!-- Competition Guidance Request -->
    <div class="container-fluid ">
    <div class="card border-dark shadow-sm">
        <div class="card-header  text-black  fw-bold border-dark">
            Permohonan Bimbingan Lomba
        </div>
        <form method="POST" action="#">
            @csrf
            <div class="card-body">
                <div class="mb-3"><strong>Nama Lomba:</strong> {{$dospem->nama_lomba}}</div>
                <div class="mb-3"><strong>Nama Tim:</strong> {{$dospem->tim->nama_tim}}</div>
                <div class="mb-3 border-bottom pb-2">
                    <strong>Anggota Tim:</strong>
                    <ul>
                        @foreach ($dospem->tim->anggota_tim as $anggota)
                            <li>{{ $anggota->mahasiswa->nama }} ({{ $anggota->peran }}) - {{ $anggota->mahasiswa->nim }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="mb-3"><strong>Keterangan Lomba:</strong> {{$dospem->deskripsi_lomba}}</div>
                <div class="mb-3"><strong>Proposal:</strong> <a href="{{ asset('uploads/proposal/'.$dospem->proposal) }}" class="text-success">Lihat Proposal</a></div>
                <div class="mb-3">
                    <label for="catatan" class="form-label fw-bold">Catatan Dosen (opsional):</label>
                    <textarea class="form-control" name="catatan" id="catatan" rows="3" placeholder="Tulis catatan tambahan di sini..."></textarea>
                </div>
            </div>
            {{-- <div class="card-footer d-flex justify-content-end gap-2">
                <button type="submit" name="status" value="tolak" class="btn btn-danger mr-2">Tolak</button>
                <button type="submit" name="status" value="terima" class="btn btn-success">Terima</button>
            </div> --}}
            <div class="mt-4 d-flex justify-content-end">
                <a href="javascript:void(0);" onclick="history.back()" class="btn btn-secondary mr-5">Kembali</a>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection

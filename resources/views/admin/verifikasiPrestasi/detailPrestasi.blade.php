@extends('layout.template')

@section('content')
<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Detail Prestasi Mahasiswa</h3>
        </div>
    </div>

    <div class="row layout-spacing">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="col-lg-12">
            <form method="POST" action="{{ url('admin/verifikasi-prestasi/' . $prestasi->id_prestasi) . '/verifikasi' }}" id="form-terima">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div class="form-group mb-4">
                                <label class="text-black" for="nama">Nama Mahasiswa</label>
                                <input type="text" class="form-control border border-secondary text-dark bg-white" id="nama" value="{{ $prestasi->mahasiswa->nama }}" readonly>
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-black" for="nim">NIM</label>
                                <input type="text" class="form-control border border-secondary text-dark bg-white" id="nim" value="{{ $prestasi->mahasiswa->nim }}" readonly>
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-black" for="prodi">Program Studi</label>
                                <input type="text" class="form-control border border-secondary text-dark bg-white" id="prodi" value="{{ $prestasi->prodi->nama_prodi }}" readonly>
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-black" for="posisi">Posisi</label>
                                <input type="text" class="form-control border border-secondary text-dark bg-white" id="posisi" value="{{ $prestasi->posisi }}" readonly>
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-black" for="nama_kompetisi">Nama Kompetisi</label>
                                <input type="text" class="form-control border border-secondary text-dark bg-white" id="nama_kompetisi" value="{{ $prestasi->nama_kompetisi }}" readonly>
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-black" for="juara">Juara</label>
                                <input type="text" class="form-control border border-secondary text-dark bg-white" id="juara" value="{{ $prestasi->juara_kompetisi }}" readonly>
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-black" for="tingkat_kompetisi">Tingkat Kompetisi</label>
                                <input type="text" class="form-control border border-secondary text-dark bg-white" id="tingkat_kompetisi" value="{{ $prestasi->tingkat_kompetisi }}" readonly>
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-black" for="jenis_prestasi">Jenis Prestasi</label>
                                <input type="text" class="form-control border border-secondary text-dark bg-white" id="jenis_prestasi" value="{{ $prestasi->jenis_prestasi }}" readonly>
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-black" for="lokasi_kompetisi">Lokasi Kompetisi</label>
                                <input type="text" class="form-control border border-secondary text-dark bg-white" id="lokasi_kompetisi" value="{{ $prestasi->lokasi_kompetisi }}" readonly>
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-black" for="tanggal_surat_tugas">Tanggal Surat Tugas</label>
                                <input type="text" class="form-control border border-secondary text-dark bg-white" id="tanggal_surat_tugas" value="{{ $prestasi->tanggal_surat_tugas }}" readonly>
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-black" for="tanggal_kompetisi">Tanggal Kompetisi</label>
                                <input type="text" class="form-control border border-secondary text-dark bg-white" id="tanggal_kompetisi" value="{{ $prestasi->tanggal_kompetisi }}" readonly>
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-black" for="dosen">Dosen Pembimbing</label>
                                <input type="text" class="form-control border border-secondary text-dark bg-white" id="dosen" value="{{ $prestasi->dosen->nama_dosen }}" readonly>
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-black" for="tahun_periode">Tahun Periode</label>
                                <input type="text" class="form-control border border-secondary text-dark bg-white" id="tahun_periode" value="{{ $prestasi->periode->nama_periode }}" readonly>
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-black" for="jumlah_univ">Jumlah Universitas</label>
                                <input type="text" class="form-control border border-secondary text-dark bg-white" id="jumlah_univ" value="{{ $prestasi->jumlah_univ }}" readonly>
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-black" for="nomor_sertifikat">Nomor Sertifikat</label>
                                <input type="text" class="form-control border border-secondary text-dark bg-white" id="nomor_sertifikat" value="{{ $prestasi->nomor_sertifikat }}" readonly>
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-black" for="foto_sertifikat">Foto Sertifikat</label><br>
                                @if ($prestasi->foto_sertifikat)
                                    <a href="{{ asset($prestasi->foto_sertifikat) }}" target="_blank">
                                        <img src="{{ asset($prestasi->foto_sertifikat) }}"
                                            alt="Foto Sertifikat"
                                            style="width: 150px; height: auto; border: 1px solid #ccc; padding: 5px;">
                                    </a>
                                    <p class="mt-1 text-muted">Klik gambar untuk melihat ukuran penuh.</p>
                                @else
                                    <p class="text-danger">Belum ada foto sertifikat.</p>
                                @endif
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-black" for="link_perlombaan">Link Pendaftaran</label><br>
                                <a href="{{ $prestasi->link_perlombaan }}" target="_blank" class="form-control border border-secondary text-dark bg-white d-block" style="text-decoration:none;">
                                    {{ $prestasi->link_perlombaan }}
                                </a>
                            </div>

                            <div class="verifikasi-section mt-3">
                                <form method="POST" action="{{ url('admin/verifikasi-prestasi/' . $prestasi->id_prestasi . '/verifikasi') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Catatan (Opsional)</label>
                                        <textarea name="catatan" class="form-control">{{ old('catatan', $prestasi->catatan) }}</textarea>
                                    </div>

                                    <div class="d-flex gap-2 mt-2">
                                        <button type="submit" name="status" value="Sudah Diverifikasi" class="btn btn-success">Terima</button>
                                        <button type="submit" name="status" value="Ditolak" class="btn btn-danger">Tolak</button>
                                    </div>
                                </form>
                            </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Load SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session("success") }}',
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: '{{ session("error") }}',
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif
@endsection

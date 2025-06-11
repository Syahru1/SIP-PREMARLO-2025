@extends('layout.template')

@section('content')
@empty($prestasi)
<!-- Modal jika data tidak ditemukan -->
<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Kesalahan</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                Data Prestasi tidak ditemukan.
            </div>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Kembali</button>
        </div>
    </div>
</div>
@else
<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Edit Prestasi Mahasiswa</h3>
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
            <form method="POST" action="{{ url('mahasiswa/update-prestasi/' . $prestasi->id_prestasi) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div class="form-group mb-4">
                            <label for="nama">Nama Mahasiswa</label>
                            <input type="text" class="form-control" id="nama" value="{{ $prestasi->mahasiswa->nama }}" readonly>
                        </div>
                        <div class="form-group mb-4">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" id="nim" value="{{ $prestasi->mahasiswa->nim }}" readonly>
                        </div>
                        <div class="form-group mb-4">
                            <label for="prodi">Program Studi</label>
                            <input type="text" class="form-control" id="prodi" value="{{ $prestasi->prodi->nama_prodi }}" readonly>
                        </div>
                        <div class="form-group mb-4">
                            <label for="posisi">Posisi</label>
                            <input type="text" class="form-control" id="posisi" name="posisi" value="{{ old('posisi', $prestasi->posisi) }}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="nama_kompetisi">Nama Kompetisi</label>
                            <input type="text" class="form-control" id="nama_kompetisi" name="nama_kompetisi" value="{{ old('nama_kompetisi', $prestasi->nama_kompetisi) }}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="juara_kompetisi">Juara</label>
                            <input type="text" class="form-control" id="juara_kompetisi" name="juara_kompetisi" value="{{ old('juara_kompetisi', $prestasi->juara_kompetisi) }}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="tingkat_kompetisi">Tingkat Kompetisi</label>
                            <input type="text" class="form-control" id="tingkat_kompetisi" name="tingkat_kompetisi" value="{{ old('tingkat_kompetisi', $prestasi->tingkat_kompetisi) }}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="jenis_prestasi">Jenis Prestasi</label>
                            <input type="text" class="form-control" id="jenis_prestasi" name="jenis_prestasi" value="{{ old('jenis_prestasi', $prestasi->jenis_prestasi) }}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="lokasi_kompetisi">Lokasi Kompetisi</label>
                            <input type="text" class="form-control" id="lokasi_kompetisi" name="lokasi_kompetisi" value="{{ old('lokasi_kompetisi', $prestasi->lokasi_kompetisi) }}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="tanggal_surat_tugas">Tanggal Surat Tugas</label>
                            <input type="date" class="form-control" id="tanggal_surat_tugas" name="tanggal_surat_tugas" value="{{ old('tanggal_surat_tugas', $prestasi->tanggal_surat_tugas) }}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="tanggal_kompetisi">Tanggal Kompetisi</label>
                            <input type="date" class="form-control" id="tanggal_kompetisi" name="tanggal_kompetisi" value="{{ old('tanggal_kompetisi', $prestasi->tanggal_kompetisi) }}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="id_dosen">Dosen Pembimbing</label>
                            <select class="form-control" id="id_dosen" name="id_dosen" required>
                                <option value="">- Pilih Dosen Pembimbing -</option>
                                @foreach($dosen as $d)
                                    <option value="{{ $d->id_dosen }}" {{ $d->id_dosen == $prestasi->id_dosen ? 'selected' : '' }}>
                                        {{ $d->nama_dosen }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="id_periode">Tahun Periode</label>
                            <select class="form-control" id="id_periode" name="id_periode" required>
                                <option value="">- Pilih Periode -</option>
                                @foreach($periode as $p)
                                    <option value="{{ $p->id_periode }}" {{ $p->id_periode == $prestasi->id_periode ? 'selected' : '' }}>
                                        {{ $p->nama_periode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="jumlah_univ">Jumlah Universitas</label>
                            <input type="number" class="form-control" id="jumlah_univ" name="jumlah_univ" value="{{ old('jumlah_univ', $prestasi->jumlah_univ) }}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="nomor_sertifikat">Nomor Sertifikat</label>
                            <input type="text" class="form-control" id="nomor_sertifikat" name="nomor_sertifikat" value="{{ old('nomor_sertifikat', $prestasi->nomor_sertifikat) }}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="foto_sertifikat">Foto Sertifikat</label><br>
                            <a href="{{ asset('storage/sertifikat/' . $prestasi->foto_sertifikat) }}" target="_blank">
                                <img src="{{ asset('storage/sertifikat/' . $prestasi->foto_sertifikat) }}" alt="Foto Sertifikat" style="max-width: 100%; height: auto; border: 1px solid #ccc; padding: 5px;">
                            </a>
                            <input type="file" class="form-control mt-2" name="foto_sertifikat">
                        </div>
                        <div class="form-group mb-4">
                            <label for="link_perlombaan">Link Pendaftaran</label>
                            <input type="url" class="form-control" id="link_perlombaan" name="link_perlombaan" value="{{ old('link_perlombaan', $prestasi->link_perlombaan) }}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="catatan">Catatan</label>
                            <textarea class="form-control" id="catatan" name="catatan">{{ old('catatan', $prestasi->catatan) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" >Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endempty


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


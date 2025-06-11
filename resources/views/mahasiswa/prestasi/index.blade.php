@extends('layout.template')

@section('content')
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h3>Prestasi</h3>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <ul class="nav nav-tabs mb-3" id="lineTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="underline-home-tab" data-toggle="tab" href="#underline-home" role="tab" aria-controls="underline-home" aria-selected="true">Data Prestasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="underline-profile-tab" data-toggle="tab" href="#underline-profile" role="tab" aria-controls="underline-profile" aria-selected="false">Pencatatan Prestasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="underline-contact-tab" data-toggle="tab" href="#underline-contact" role="tab" aria-controls="underline-contact" aria-selected="false">Riwayat</a>
                </li>
            </ul>


            <div class="tab-content" id="lineTabContent-3">
                {{-- Data Prestasi Tab --}}
                <div class="tab-pane fade show active" id="underline-home" role="tabpanel" aria-labelledby="underline-home-tab">
                    <div class="row layout-spacing">
                        <div class="col-lg-12">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Daftar Prestasi</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="tabel_prestasi widget-content-area">
                                <div class="table-responsive mb-4">
                                    <table id="prestasi_mahasiswa" class="table table-hover" >
                                        <thead>
                                            <tr>
                                                <th class="text-secondary">No</th>
                                                <th class="text-secondary">Prestasi</th>
                                                <th class="text-center text-secondary">Nama Kompetisi</th>
                                                <th class="text-center text-secondary">Tingkat Kompetisi</th>
                                                <th class="text-center text-secondary">Tahun</th>
                                                <th class="text-center text-secondary">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($prestasi as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->juara_kompetisi }}</td>
                                                    <td class="text-center ">{{ $item->nama_kompetisi }}</td>
                                                    <td class="text-center">{{ $item->tingkat_kompetisi }}</td>
                                                    <td class="text-center">{{ $item->periode->nama_periode }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ url('mahasiswa/detail-prestasi/'.$item->id_prestasi) }}" class="btn btn-primary btn-sm">Detail</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">Belum ada prestasi.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pencatatan Prestasi Tab --}}
                <div class="tab-pane fade" id="underline-profile" role="tabpanel" aria-labelledby="underline-profile-tab">
                    <form id="form_prestasi" method="POST" action="{{ url('mahasiswa/prestasi/store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label class="text-black" for="inputJuara">Nama Prestasi</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="inputJuara" name="juara_kompetisi" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <!-- Icon caret-down -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14L2.451 5.658C1.885 5.012 2.345 4 3.204 4h9.592c.86 0 1.319 1.012.753 1.658l-4.796 5.482a1 1 0 01-1.506 0z"/>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setJuara('Juara 1')">Juara 1</a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setJuara('Juara 2')">Juara 2</a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setJuara('Juara 3')">Juara 3</a>
                                    </div>
                                </div>
                            </div>
                            @error('juara_kompetisi') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="inputAnggota">Nama Anggota</label>
                            <input type="text" class="form-control border border-secondary" id="inputAnggota" value="{{ Auth::guard('mahasiswa')->user()->nama }}" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="inputPosisi">Posisi</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="inputPosisi" name="posisi" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14L2.451 5.658C1.885 5.012 2.345 4 3.204 4h9.592c.86 0 1.319 1.012.753 1.658l-4.796 5.482a1 1 0 01-1.506 0z"/>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setPosisi('Ketua')">Ketua</a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setPosisi('Anggota')">Anggota</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="inputTingkat">Tingkat Kompetisi</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="inputTingkat" name="tingkat_kompetisi" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14L2.451 5.658C1.885 5.012 2.345 4 3.204 4h9.592c.86 0 1.319 1.012.753 1.658l-4.796 5.482a1 1 0 01-1.506 0z"/>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setTingkat('Internasional')">Internasional</a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setTingkat('Nasional')">Nasional</a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setTingkat('Regional')">Regional</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="inputJenis">Jenis Prestasi</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="inputJenis" name="jenis_prestasi" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14L2.451 5.658C1.885 5.012 2.345 4 3.204 4h9.592c.86 0 1.319 1.012.753 1.658l-4.796 5.482a1 1 0 01-1.506 0z"/>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setJenis('Sains')">Sains</a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setJenis('Olahraga')">Olahraga</a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setJenis('Lain-lain')">Lain-lain</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="inputKOmpetisi">Nama Kompetisi</label>
                            <input type="text" class="form-control" id="inputKompetisi" name="nama_kompetisi">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="inputLokasi">Nama Penyelenggara</label>
                            <input type="text" class="form-control" id="inputLokasi" name="lokasi_kompetisi">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="inputTanggalSuratTugas">Tanggal Surat Tugas</label>
                            <input type="date" class="form-control border border-secondary" id="inputTanggalSuratTugas" name="tanggal_surat_tugas">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="inputTanggalKompetisi">Tanggal Kompetisi</label>
                            <input type="date" class="form-control border border-secondary" id="inputTanggalKompetisi" name="tanggal_kompetisi">
                        </div>

                        <div class="form-group">
                            <label for="id_dosen">Dosen Pembimbing</label>
                            <select id="id_dosen" name="id_dosen" class="form-control" required>
                                <option value="">- Pilih Dosen Pembimbing -</option>
                                @foreach($dosen as $p)
                                    <option value="{{ $p->id_dosen }}">{{ $p->nama_dosen }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger error-text" id="error-id_dosen"></small>
                        </div>

                        <div class="form-group">
                            <label for="id_periode">Periode</label>
                            <select id="id_periode" name="id_periode" class="form-control" required>
                                <option value="">- Pilih Periode -</option>
                                @foreach($periode as $p)
                                    <option value="{{ $p->id_periode }}">{{ $p->nama_periode }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger error-text" id="error-id_periode"></small>
                        </div>


                        <div class="form-group mb-4">
                            <label for="jumlah_univ">Jumlah Universitas</label>
                            <input type="number" class="form-control" id="jumlah_univ" name="jumlah_univ" min="1" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="nomor_sertifikat">Nomor Sertifikat</label>
                            <input type="text" class="form-control" id="nomor_sertifikat" name="nomor_sertifikat" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="link_perlombaan">Link Pendaftaran</label>
                            <input type="url" class="form-control" id="link_perlombaan" name="link_perlombaan" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Upload Foto Sertifikat</label>
                            <input type="file" class="form-control" id="image" name="foto_sertifikat">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Simpan Prestasi</button>
                    </form>
                </div>


                {{-- Riwayat Tab --}}
                <div class="tab-pane fade" id="underline-contact" role="tabpanel" aria-labelledby="underline-contact-tab">
                    <div class="row layout-spacing">
                        <div class="col-lg-12">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Riwayat Pengajuan Prestasi</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
                                    <table id="tabel_riwayat" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center text-secondary">No</th>
                                                <th class="text-center text-secondary">Prestasi</th>
                                                <th class="text-center text-secondary">Nama Kompetisi</th>
                                                <th class="text-center text-secondary">Tingkat Kompetisi</th>
                                                <th class="text-center text-secondary">Tahun</th>
                                                <th class="text-center text-secondary">Status</th>
                                                <th class="text-center text-secondary text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($semuaRiwayat as $index => $riwayat)
                                                <tr>
                                                    <td class="text-center">{{ $index + 1 }}</td>
                                                    <td class="text-center">{{ $riwayat->juara_kompetisi }}</td>
                                                    <td class="text-center">{{ $riwayat->nama_kompetisi }}</td>
                                                    <td class="text-center">{{ $riwayat->tingkat_kompetisi }}</td>
                                                    <td class="text-center">{{ $riwayat->periode->nama_periode ?? '-' }}</td>
                                                    <td class="text-center">
                                                        @php
                                                            $badgeClass = match($riwayat->status) {
                                                                'Sudah Diverifikasi' => 'badge-success',
                                                                'Ditolak' => 'badge-danger',
                                                                'Belum Diverifikasi' => 'badge-warning',
                                                                default => 'badge-secondary'
                                                            };
                                                        @endphp
                                                        <span class="badge {{ $badgeClass }}">{{ $riwayat->status }}</span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('mahasiswa/detail-prestasi/' . $riwayat->id_prestasi) }}" class="btn btn-primary btn-sm">
                                                            Detail
                                                        </a>
                                                        @if($riwayat->status == 'Ditolak')
                                                            <a href="{{ url('mahasiswa/edit-prestasi/' . $riwayat->id_prestasi) }}" class="btn btn-warning btn-sm">
                                                                Edit
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">Belum ada riwayat pengajuan prestasi.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

{{-- Custom CSS untuk tab --}}
<style>
    .nav-tabs .nav-link {
        color: #6c757d;
        border: none;
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .nav-tabs .nav-link.active {
        color: #6f42c1 !important;
        font-weight: 600;
        border-bottom: 3px solid #6f42c1 !important;
    }

    .nav-tabs .nav-link:hover {
        color: #5a32a3;
    }
</style>

<!-- SweetAlert Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Inisialisasi DataTables dan fungsi lainnya -->
<script>

  function setJuara(value) {
    document.getElementById('inputJuara').value = value;
  }

  function setPosisi(value) {
    document.getElementById('inputPosisi').value = value;
  }

  function setTingkat(value) {
    document.getElementById('inputTingkat').value = value;
  }

  function setJenis(value) {
    document.getElementById('inputJenis').value = value;
  }
</script>


<!-- SweetAlert ketika ada session success -->
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const urlParams = new URLSearchParams(window.location.search);
        const tab = urlParams.get('tab');

        if (tab === 'riwayat') {
            const targetTab = document.querySelector('a[href="#underline-contact"]');
            if (targetTab) {
                targetTab.click(); // Aktifkan tab Riwayat
            }
        }
    });
</script>



@endsection

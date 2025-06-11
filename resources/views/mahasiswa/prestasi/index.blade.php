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
                    <form>
                        <div class="form-group mb-4">
                            <label class="text-black" for="inputPrestasi">Nama Prestasi</label>
                            <input type="text" class="form-control border border-secondary" id="inputPrestasi">
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="inputAnggota">Nama Anggota</label>
                            <input type="text" class="form-control border border-secondary" id="inputAnggota">
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="inputPosisi">Posisi</label>
                            <input type="text" class="form-control border border-secondary" id="inputPosisi">
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="inputTingkat">Tingkat Kompetisi</label>
                            <div class="input-group">
                                <input type="text" class="form-control border-secondary bg-white text-dark" id="inputTingkat" aria-label="Text input with segmented dropdown button" readonly>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.012 2.345 4 3.204 4h9.592c.86 0 1.319 1.012.753 1.658l-4.796 5.482a1 1 0 0 1-1.506 0z" />
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
                            <label class="text-black" for="inputJenis">Jenis Kompetisi</label>
                            <div class="input-group">
                                <input type="text" class="form-control border-secondary bg-white text-dark" id="inputJenis" aria-label="Text input with segmented dropdown button" readonly>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.012 2.345 4 3.204 4h9.592c.86 0 1.319 1.012.753 1.658l-4.796 5.482a1 1 0 0 1-1.506 0z" />
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setJenis('Kompetisi A')">Kompetisi A</a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setJenis('Kompetisi B')">Kompetisi B</a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setJenis('Kompetisi C')">Kompetisi C</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="inputJuara">Juara</label>
                            <div class="input-group">
                                <input type="text" class="form-control border-secondary bg-white text-dark" id="inputJuara" aria-label="Text input with segmented dropdown button" readonly>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.012 2.345 4 3.204 4h9.592c.86 0 1.319 1.012.753 1.658l-4.796 5.482a1 1 0 0 1-1.506 0z" />
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setJuara('Juara 1')">Juara 1</a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setJuara('Juara 2')">Juara 2</a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setJuara('Juara 3')">Juara 3</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="inputLokasi">Lokasi</label>
                            <input type="text" class="form-control border border-secondary" id="inputLokasi">
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="inputTanggalSuratTugas">Tanggal Surat Tugas</label>
                            <input type="date" class="form-control border border-secondary" id="inputTanggalSuratTugas">
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="inputTanggalKompetisi">Tanggal Kompetisi</label>
                            <input type="date" class="form-control border border-secondary" id="inputTanggalKompetisi">
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="inputDosenPembimbing">Dosen Pembimbing</label>
                            <div class="input-group">
                                <input type="text" class="form-control border-secondary bg-white text-dark" id="inputDosenPembimbing" aria-label="Text input with segmented dropdown button" readonly>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.012 2.345 4 3.204 4h9.592c.86 0 1.319 1.012.753 1.658l-4.796 5.482a1 1 0 0 1-1.506 0z" />
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setDosenPembimbing('Dosen 1')">Dosen 1</a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setDosenPembimbing('Dosen 2')">Dosen 2</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="inputNIDN">NIDN</label>
                            <input type="text" class="form-control border border-secondary" id="inputNIDN">
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="inputPeriode">Periode</label>
                            <div class="input-group">
                                <input type="text" class="form-control border border-secondary text-black bg-white" id="inputPeriode" aria-label="Text input with segmented dropdown button" readonly>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.012 2.345 4 3.204 4h9.592c.86 0 1.319 1.012.753 1.658l-4.796 5.482a1 1 0 0 1-1.506 0z" />
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setPeriode('2023/2024 Ganjil')">2023/2024 Ganjil</a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setPeriode('2024/2025 Genap')">2024/2025 Genap</a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setPeriode('2025/2026 Ganjil')">2025/2026 Ganjil</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="inputJumlahUniv">Jumlah Universitas</label>
                            <input type="number" class="form-control border border-secondary" id="inputJumlahUniv">
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="inputNomorSertifikat">Nomor Sertifikat</label>
                            <input type="text" class="form-control border border-secondary" id="inputNomorSertifikat">
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="inputTanggalPengajuan">Tanggal Pengajuan</label>
                            <input type="date" class="form-control border border-secondary" id="inputTanggalPengajuan">
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="inputLinkWeb">Link Web</label>
                            <input type="url" class="form-control border border-secondary" id="inputLinkWeb">
                        </div>

                        {{-- File Upload for Certificate --}}
                        <div class="form-group mb-4">
                            <label class="text-black" for="inputSertifikat">Bukti File Sertifikat</label>
                            <div class="custom-file-container" data-upload-id="certificateUpload">
                                <label class="custom-file-container__custom-file" >
                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*, application/pdf" aria-label="Choose File" id="inputSertifikat">
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-danger mr-2">Batal</button>
                            <input type="submit" name="time" class="btn btn-success" value="Kirim">
                        </div>
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
    var certificateUpload = new FileUploadWithPreview('certificateUpload');

    function setTingkat(value) {
        document.getElementById("inputTingkat").value = value;
    }
    function setJenis(value) {
        document.getElementById("inputJenis").value = value;
    }
    function setJuara(value) {
        document.getElementById("inputJuara").value = value;
    }
    function setDosenPembimbing(value) {
        document.getElementById("inputDosenPembimbing").value = value;
    }
    function setPeriode(value) {
        document.getElementById("inputPeriode").value = value;
    }

    $('#tabel_prestasi').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        responsive: true,
        columnDefs: [{ orderable: false, targets: 5 }]
    });

    $('#tabel_riwayat').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        responsive: true,
        columnDefs: [{ orderable: false, targets: 6 }]
    });
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

@extends('layout.template')
@php
    // Dummy user jika tidak tersedia dari controller
    $user = (object)[
        'name' => 'Draco Malfoy',
        'nim' => '202310001',
        'prodi' => 'D-IV Teknik Informatika',
        'lokasi' => 'Malang, Jawa Timur',
        'email' => 'draco@example.com',
        'photo' => null,
        'angkatan' => '2023',
        'periode' => '2024/2025 Genap',
        'password' => '*****'
    ];
@endphp

@section('content')
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h3>Profil Saya</h3>
        </div>
    </div>

    <div class="card component-card_4 mb-4 p-4">
    <div class="d-flex align-items-center justify-content-between">
        <!-- Foto Profil -->
        <div class="me-4" style="margin-left: 1rem;">
            <img src="{{ $user->photo ? asset('storage/' . $user->photo) : 'https://via.placeholder.com/80x80.png?text=Foto' }}"
                 alt="Foto Profil"
                 class="rounded-circle border border-2 border-dark"
                 width="80" height="80">
        </div>

        <!-- Informasi Mahasiswa (2 baris, masing-masing 2 kolom) -->
         <div class="flex-grow-1" style="text-align:left; margin-left: 8rem;">
            <div class="container px-0">
                <!-- Baris 1 -->
                <div class="row mb-2 ">
                    <div class="col-md-4 ">
                        <div class="text-muted">Nama</div>
                        <div class="text-black">{{ $user->name ?? '-' }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-muted">Prodi</div>
                        <div class="text-black">{{ $user->prodi ?? '-' }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-muted">Email</div>
                        <div class="text-black">
                            <a href="mailto:{{ $user->email }}" class="text-black">{{ $user->email }}</a>
                        </div>
                    </div>
                </div>

                <!-- Baris 2 -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-muted">NIM</div>
                        <div class="text-black">{{ $user->nim ?? '-' }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-muted">Periode</div>
                        <div class="text-black">{{ $user->periode ?? '-' }}</div>
                    </div>
                     <div class="col-md-4">
                        <div class="text-muted">Lokasi</div>
                        <div class="text-black">{{ $user->lokasi ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Edit -->
        <a href="{{ url('mahasiswa/edit-profil') }}" class="btn btn-primary mb-2 mr-2">Edit</a>

    </div>
</div>

    <div class="card component-card_4">
        <div class="card-body">


            <ul class="nav nav-tabs mb-3" id="lineTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="underline-home-tab" data-toggle="tab" href="#underline-home" role="tab" aria-controls="underline-home" aria-selected="true">Kompetensi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="underline-profile-tab" data-toggle="tab" href="#underline-profile" role="tab" aria-controls="underline-profile" aria-selected="false">Informasi akun</a>
                </li>
            </ul>

            <div class="tab-content" id="lineTabContent-3">
                <div class="tab-pane fade show active" id="underline-home" role="tabpanel" aria-labelledby="underline-home-tab">
                    <div class="mb-4 card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0 text-black" style="font-weight: bold !important;">Minat</h5>
                            <div class="d-flex align-items-center">

                             <a href="{{ url('mahasiswa/minat') }}" class="btn btn-secondary mb-2 mr-2">Detail</a>


                            </div>
                        </div>
                        <div class="card-body">
                            <div class="skill-item mb-3">
                                <div class="text-black">Isi detail minat ditampilkan di sini...</div>
                                <div role="separator" class="specialist-divider mt-2"></div>
                            </div>

                            <div class="skill-item mb-3">
                                <div class="text-black">Isi detail minat ditampilkan di sini...</div>
                                <div role="separator" class="specialist-divider mt-2"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0 text-black" style="font-weight: bold !important;">Bidang Keahlian</h5>
                            <div class="d-flex align-items-center">

                            <a href="{{ url('mahasiswa/bidang-keahlian') }}" class="btn btn-secondary mb-2 mr-2">Detail</a>


                            </div>
                        </div>
                        <div class="card-body">
                            <div class="skill-item mb-3">
                                <div class="text-black">Isi detail keahlian ditampilkan di sini...</div>
                                <div role="separator" class="specialist-divider mt-2"></div>
                            </div>

                            <div class="skill-item mb-3">
                                <div class="text-black">Isi detail keahlian ditampilkan di sini...</div>
                                <div role="separator" class="specialist-divider mt-2"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0 text-black" style="font-weight: bold !important;">Sertifikasi</h5>
                            <div class="d-flex align-items-center">
                           <a href="{{ url('mahasiswa/sertifikat') }}" class="btn btn-secondary mb-2 mr-2">Detail</a>

                           
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="skill-item mb-3">
                                <div class="text-black">Isi sertifikasi ditampilkan di sini...</div>
                                <div role="separator" class="specialist-divider mt-2"></div>
                            </div>

                            <div class="skill-item mb-3">
                                <div class="text-black">Isi sertifikasi ditampilkan di sini...</div>
                                <div role="separator" class="specialist-divider mt-2"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0 text-black" style="font-weight: bold !important;">Pengalaman</h5>
                            <div class="d-flex align-items-center">
                             <a href="{{ url('mahasiswa/pengalaman') }}" class="btn btn-secondary mb-2 mr-2">Detail</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="skill-item mb-3">
                                <div class="text-black">Isi pengalaman ditampilkan di sini...</div>
                                <div role="separator" class="specialist-divider mt-2"></div>
                            </div>

                            <div class="skill-item mb-3">
                                <div class="text-black">Isi pengalaman ditampilkan di sini...</div>
                                <div role="separator" class="specialist-divider mt-2"></div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="underline-profile" role="tabpanel" aria-labelledby="underline-profile-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0" style="border-top: none; table-layout: fixed;">
                                    <tbody>
                                        <tr>
                                            <td class="text-muted" style="width: 40%;">Nama</td>
                                            <td class="text-black" style="width: 60%;">{{ $user->name ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">NIM</td>
                                            <td class="text-black">{{ $user->nim ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Prodi</td>
                                            <td class="text-black">{{ $user->prodi ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Periode</td>
                                            <td class="text-black">{{ $user->periode ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Email</td>
                                            <td class="text-black">{{ $user->email ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Lokasi</td>
                                            <td class="text-black">{{ $user->lokasi ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Angkatan</td>
                                            <td class="text-black">{{ $user->angkatan ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Password</td>
                                            <td class="text-black">{{ $user->password ?? '-' }}</td>
                                        </tr>
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

@endsection


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

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>
@endsection

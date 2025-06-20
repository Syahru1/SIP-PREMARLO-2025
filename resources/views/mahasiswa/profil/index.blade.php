@extends('layout.template')

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
                    <img src="{{ url('uploads/profil/' . $mahasiswa->foto) }}" alt="Foto Profil"
                        class="rounded-circle border border-dark" width="80" height="80">
                </div>

                <!-- Informasi Mahasiswa (2 baris, masing-masing 2 kolom) -->
                <div class="flex-grow-1" style="text-align:left; margin-left: 8rem;">
                    <div class="container px-0">
                        <!-- Baris 1 -->
                        <div class="row mb-2 ">
                            <div class="col-md-4 ">
                                <div class="text-muted">Nama</div>
                                <div class="text-black">{{ $mahasiswa->nama ?? '-' }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-muted">Prodi</div>
                                <div class="text-black">{{ $mahasiswa->prodi->nama_prodi ?? '-' }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-muted">Username</div>
                                <div class="text-black">{{ $mahasiswa->username ?? '-' }}</div>
                            </div>
                        </div>

                        <!-- Baris 2 -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-muted">NIM</div>
                                <div class="text-black">{{ $mahasiswa->nim ?? '-' }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-muted">Periode</div>
                                <div class="text-black">{{ $mahasiswa->periode->nama_periode ?? '-' }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-muted">Lokasi</div>
                                <div class="text-black">{{ $mahasiswa->lokasi ?? '-' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card component-card_4">
            <div class="card-body">


                <ul class="nav nav-tabs mb-3" id="lineTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="underline-home-tab" data-toggle="tab" href="#underline-home"
                            role="tab" aria-controls="underline-home" aria-selected="true">Peminatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="underline-preference-tab" data-toggle="tab" href="#underline-preference"
                            role="tab" aria-controls="underline-preference" aria-selected="false">Preferensi</a>
                    </li>
                </ul>

                <div class="tab-content" id="lineTabContent-3">
                    <div class="tab-pane fade show active" id="underline-home" role="tabpanel"
                        aria-labelledby="underline-home-tab">
                        <div class="mb-4 card">
                            @include('mahasiswa.profil.peminatan')
                        </div>
                    </div>


                    <div class="tab-pane fade" id="underline-preference" role="tabpanel"
                        aria-labelledby="underline-preference-tab">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @include('mahasiswa.profil.preferensi')
                    </div>
                </div>
            </div>
        </div>
        <!-- SweetAlert Library -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: '{{ session('error') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        @endif
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
            document.addEventListener("DOMContentLoaded", function() {
                if (typeof feather !== 'undefined') {
                    feather.replace();
                }
            });
        </script>
    @endsection

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
            <img src="{{ url('uploads/profil/' . $mahasiswa->foto) }}"
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
                    <a class="nav-link active" id="underline-home-tab" data-toggle="tab" href="#underline-home" role="tab" aria-controls="underline-home" aria-selected="true">Kompetensi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="underline-preference-tab" data-toggle="tab" href="#underline-preference" role="tab" aria-controls="underline-preference" aria-selected="false">Preferensi</a>
                </li>
            </ul>

            <div class="tab-content" id="lineTabContent-3">
                <div class="tab-pane fade show active" id="underline-home" role="tabpanel" aria-labelledby="underline-home-tab">
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


                <div class="tab-pane fade" id="underline-preference" role="tabpanel" aria-labelledby="underline-preference-tab">
                    <div class="card">
                        <div class="card-body">
                        {{-- === FORM PERSONALISASI PREFERENSI (STATIC PREVIEW) === --}}
                        <form id="formPersonal" method="POST">
                            @csrf

                                  {{-- BIDANG --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-dark">Bidang yang Kamu Minati</label>
                                <div class="row">
                                @foreach ($bidang as $b)
                                <div class="col-md-6 mb-2">
                                    <div class="form-check rounded border px-3 py-2 shadow-sm bg-light">
                                    <input class="form-check-input me-2" type="checkbox" name="bidang[]" value="{{ $b->id_bidang }}" id="bidang{{ $b->id_bidang }}">
                                    <label class="form-check-label text-dark" for="bidang{{ $b->id_bidang }}">
                                        {{ $b->nama_bidang }}
                                    </label>
                                    </div>
                                </div>
                                @endforeach
                                </div>
                            </div>

                            {{-- BIAYA --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-dark">Biaya Pendaftaran Ideal</label>
                                <div class="input-group rounded shadow-sm">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-cash-stack text-muted"></i></span>
                                <select name="biaya_pendaftaran" class="form-select border-start-0">
                                    <option value=""> Pilih Rentang Biaya </option>
                                    @foreach ($biaya as $b)
                                    <option value="{{ $b->id_biaya_pendaftaran }}">{{ $b->nama_biaya_pendaftaran }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            {{-- PENYELENGGARA --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-dark">Penyelenggara Favorit</label>
                                <div class="input-group rounded shadow-sm">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-building text-muted"></i></span>
                                <select name="penyelenggara" class="form-select border-start-0">
                                    <option value=""> Pilih Penyelenggara </option>
                                    @foreach ($penyelenggara as $p)
                                    <option value="{{ $p->id_penyelenggara }}">{{ $p->nama_penyelenggara }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            {{-- TINGKAT --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-dark">Tingkat Kompetisi</label>
                                <div class="input-group rounded shadow-sm">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-bar-chart text-muted"></i></span>
                                <select name="tingkat" class="form-select border-start-0">
                                    <option value=""> Pilih Tingkat </option>
                                    @foreach ($tingkat as $t)
                                    <option value="{{ $t->id_tingkat_kompetisi }}">{{ $t->nama_tingkat_kompetisi }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            {{-- HADIAH --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-dark">Hadiah yang Diutamakan</label>
                                <div class="input-group rounded shadow-sm">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-gift text-muted"></i></span>
                                <select name="hadiah" class="form-select border-start-0">
                                    <option value=""> Pilih Hadiah </option>
                                    @foreach ($hadiah as $h)
                                    <option value="{{ $h->id_hadiah }}">{{ $h->nama_hadiah }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            {{-- === BUTTON SIMPAN === --}}
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-secondary px-4 py-2">
                                    <i class="bi bi-check-circle me-1"></i> Simpan Preferensi
                                </button>
                            </div>
                        </form>
                        {{-- === END FORM PERSONALISASI (STATIC PREVIEW) === --}}
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

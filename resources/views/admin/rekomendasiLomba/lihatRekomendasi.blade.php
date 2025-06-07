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
                        <a class="nav-link active" id="step1-tab" data-toggle="pill" href="#step1" role="tab"
                            aria-controls="step1" aria-selected="false">Langkah 1: Matriks Keputusan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="step2-tab" data-toggle="pill" href="#step2" role="tab"
                            aria-controls="step2" aria-selected="false">Langkah 2: Normalisasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="step3-tab" data-toggle="pill" href="#step3" role="tab"
                            aria-controls="step3" aria-selected="false">Langkah 3: Matriks Terbobot</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="step4-tab" data-toggle="pill" href="#step4" role="tab"
                            aria-controls="step4" aria-selected="false">Langkah 4: Skor Akhir</a>
                    </li>
                </ul>
                {{-- TAB CONTENT --}}
                <div class="tab-content" id="justify-pills-tabContent">
                    

                    {{-- Langkah 1 --}}
                    <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">
                        <h5 class="mb-3">Langkah 1: Matriks Keputusan</h5>
                        @include('admin.rekomendasiLomba.spk_matriks_keputusan')
                    </div>

                    {{-- Langkah 2 --}}
                    <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">
                        <h5 class="mb-3">Langkah 2: Matriks Normalisasi</h5>
                        @include('admin.rekomendasiLomba.spk_matriks_normalisasi')
                    </div>

                    {{-- Langkah 3 --}}
                    <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="step3-tab">
                        <h5 class="mb-3">Langkah 3: Matriks Terbobot</h5>
                        @include('admin.rekomendasiLomba.spk_matriks_terbobot')
                    </div>

                    {{-- Langkah 4 --}}
                    <div class="tab-pane fade" id="step4" role="tabpanel" aria-labelledby="step4-tab">
                        <h5 class="mb-3">Langkah 4: Skor Akhir & Peringkat</h5>
                        @include('admin.rekomendasiLomba.spk_matriks_nilai_optimasi')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush

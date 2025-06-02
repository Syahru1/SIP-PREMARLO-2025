@extends('layout.template')

@section('content')
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h3>Mahasiswa Bimbingan</h3>
        </div>
    </div>

    
    <div class="card component-card_4">
        <div class="card-body">

            <ul class="nav nav-tabs mb-3" id="lineTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="underline-home-tab" data-toggle="tab" href="#underline-home" role="tab" aria-controls="underline-home" aria-selected="true">Mahasiswa Bimbingan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="underline-contact-tab" data-toggle="tab" href="#underline-contact" role="tab" aria-controls="underline-contact" aria-selected="false">Riwayat</a>
                </li>
            </ul>

            <div class="tab-content" id="lineTabContent-3">
                <div class="tab-pane fade show active" id="underline-home" role="tabpanel" aria-labelledby="underline-home-tab">
                  <div class="layout-px-spacing">
                    <div class="card p-3">
                        {{-- Item Mahasiswa --}}
                        <div class="d-flex justify-content-between align-items-center border-bottom py-3">
                            <div>
                                <strong>Mahasiswa A</strong><br>
                                NIM: 2141720001 - Teknik Informatika
                            </div>
                            <a href="{{ url('/dosen/detail-mahasiswa') }}" class="btn btn-sm btn-primary">Detail</a>
                        </div>

                        <div class="d-flex justify-content-between align-items-center border-bottom py-3">
                            <div>
                                <strong>Mahasiswa B</strong><br>
                                NIM: 2141720002 - Sistem Informasi
                            </div>
                            <a href="{{ url('/dosen/detail-mahasiswa') }}" class="btn btn-sm btn-primary">Detail</a>
                        </div>

                        <div class="d-flex justify-content-between align-items-center py-3">
                            <div>
                                <strong>Mahasiswa C</strong><br>
                                NIM: 2141720003 - Teknik Komputer
                            </div>
                            <a href="{{ url('/dosen/detail-mahasiswa') }}" class="btn btn-sm btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
                </div>
                <div class="tab-pane fade" id="underline-contact" role="tabpanel" aria-labelledby="underline-contact-tab">
                    <p class="mb-4">
                         <div class="row layout-spacing">
                    <div class="col-lg-12">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    </div>                  
                                </div>
                            </div>
                            <div class="card p-3 mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Mahasiswa A</strong><span class="badge badge-success ml-2">Selesai</span><br>
                                    Keterangan: Mengikuti Lomba Cyber Security ABC
                                </div>
                                <a href="{{ url('/dosen/detail-mahasiswa') }}" class="btn btn-sm btn-primary">Detail</a>
                            </div>
                        </div>

                        <div class="card p-3 mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Mahasiswa B</strong><span class="badge badge-warning ml-2">Proses</span><br>
                                    Keterangan: Mengikuti Lomba UI/UX Competition
                                </div>
                                <a href="{{ url('/dosen/detail-mahasiswa') }}" class="btn btn-sm btn-primary">Detail</a>
                            </div>
                        </div>

                        <div class="card p-3 mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Mahasiswa C</strong><span class="badge badge-danger ml-2">Ditolak</span><br>
                                    Keterangan: Mengikuti Lomba Programming Contest
                                </div>
                                <a href="{{ url('/dosen/detail-mahasiswa') }}" class="btn btn-sm btn-primary">Detail</a>
                            </div>
                        </div>
                        </div>
                    </div>
                
                    </p>
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

<script>
    var firstUpload = new FileUploadWithPreview('myFirstImage')
</script>
@endsection

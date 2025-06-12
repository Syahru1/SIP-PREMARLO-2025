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
                            @foreach ($bimbinganMahasiswaList as $bimbinganMahasiswa)
                                <div class="d-flex justify-content-between align-items-center border-bottom py-3">
                                    <div>
                                        <strong>{{ $bimbinganMahasiswa->mahasiswa->nama }}</strong><br>
                                        {{ $bimbinganMahasiswa->mahasiswa->nim }} - {{ $bimbinganMahasiswa->mahasiswa->prodi->nama_prodi }} <br>
                                        <strong>Nama Lomba:</strong> {{ $bimbinganMahasiswa->nama_lomba }}
                                    </div>
                                    <a href="{{ url('/dosen/detail-mahasiswa/'.$bimbinganMahasiswa->mahasiswa->id_mahasiswa) }}" class="btn btn-sm btn-primary">Detail</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="underline-contact" role="tabpanel" aria-labelledby="underline-contact-tab">
                    <div class="row layout-spacing">
                        <div class="col-lg-12">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12"></div>
                                </div>
                            </div>

                            @foreach ($riwayatBimbinganList as $riwayat)
                            @php
                                switch(strtolower($riwayat->status)) {
                                    case 'disetujui':
                                        $badgeClass = 'success';
                                        $statusText = 'Disetujui';
                                        break;
                                    case 'fitur':
                                        $badgeClass = 'warning';
                                        $statusText = 'Fitur';
                                        break;
                                    case 'ditolak':
                                        $badgeClass = 'danger';
                                        $statusText = 'Ditolak';
                                        break;
                                    default:
                                        $badgeClass = 'secondary';
                                        $statusText = ucfirst($riwayat->status);
                                }
                            @endphp
                            <div class="card p-3 mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $riwayat->mahasiswa->nama }}</strong>
                                        <span class="badge badge-{{ $badgeClass }} ml-2">{{ $statusText }}</span><br>
                                        {{ $riwayat->mahasiswa->nim }} - {{ $riwayat->mahasiswa->prodi->nama_prodi }}<br>
                                        <strong>Nama Lomba:</strong> {{ $riwayat->nama_lomba }}<br>
                                    </div>
                                    <a href="{{ url('/dosen/detail-mahasiswa-riwayat/'.$riwayat->mahasiswa->id_mahasiswa) }}" class="btn btn-sm btn-primary">Detail</a>
                                </div>
                            </div>
                        @endforeach

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

<script>
    var firstUpload = new FileUploadWithPreview('myFirstImage');
</script>

<!-- Tempatkan ini di luar tag <script> -->
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

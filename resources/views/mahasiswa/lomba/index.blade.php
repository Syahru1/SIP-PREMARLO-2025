@extends('layout.template')

@push('css')
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
@endpush
@section('content')
    <div class="layout-px-spacing">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="page-header">
            <div class="page-title">
                <h3>Rekomendasi Lomba</h3>
            </div>
        </div>

        <!-- Leaderboard Tabs -->
        <div class="card component-card_4">
            <div class="card-body">

                <ul class="nav nav-tabs mb-3" id="lineTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="underline-home-tab" data-toggle="tab" href="#underline-home"
                            role="tab" aria-controls="underline-home" aria-selected="true">Rekomendasi Lomba</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="underline-profile-tab" data-toggle="tab" href="#underline-profile"
                            role="tab" aria-controls="underline-profile" aria-selected="false">Pengajuan Lomba</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="underline-contact-tab" data-toggle="tab" href="#underline-contact"
                            role="tab" aria-controls="underline-contact" aria-selected="false">Riwayat</a>
                    </li>
                </ul>
                <div class="tab-content" id="lineTabContent-3">
                    <div class="tab-pane fade show active" id="underline-home" role="tabpanel"
                        aria-labelledby="underline-home-tab">
                        <p class="mb-4">
                            @include('mahasiswa.lomba.rekomendasi_lomba')
                        </p>
                    </div>
                    <div class="tab-pane fade" id="underline-profile" role="tabpanel"
                        aria-labelledby="underline-profile-tab">
                        @include('mahasiswa.lomba.tambah_lomba')
                    </div>
                    <div class="tab-pane fade" id="underline-contact" role="tabpanel"
                        aria-labelledby="underline-contact-tab">
                        @include('mahasiswa.lomba.riwayat_lomba')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
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
    {{-- <script>
        var firstUpload = new FileUploadWithPreview('myFirstImage')
    </script> --}}
    <script>
        var f3 = flatpickr(document.getElementById('rangeCalendarFlatpickr'), {
            mode: "range"
        });
    </script>
    <script>
        document.getElementById('customFile').addEventListener('change', function(e) {
            // Get the file name
            var fileName = e.target.files[0] ? e.target.files[0].name : 'Choose file';
            // Update the label
            var label = document.querySelector('label[for="customFile"]');
            label.textContent = fileName;
        });
    </script>
@endpush

@extends('layout.template')

@section('content')
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h3>Pengajuan Bimbingan</h3>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <!-- Tabs -->
            <ul class="nav nav-tabs mb-3" id="lineTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="true">Pengajuan Bimbingan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="riwayat-tab" data-toggle="tab" href="#riwayat" role="tab" aria-controls="riwayat" aria-selected="false">Riwayat</a>
                </li>
            </ul>

            <div class="tab-content" id="lineTabContent">
                <!-- Form Tab -->
                <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">
                    <div class="card  shadow-sm">
                        <div class="card-header fw-bold text-black ">
                            Form Pengajuan Bimbingan Lomba
                        </div>
                        <form method="POST" action="{{url('mahasiswa/bimbingan/store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-black">Nama Tim</label>
                                    <input type="text" class="form-control" placeholder="Contoh: Tim Kreatif B" name="nama_tim" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-black">Nama Lomba</label>
                                    <input type="text" class="form-control" placeholder="Contoh: UI/UX Nasional 2025" name="nama_lomba" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-black">Deskripsi Lomba</label>
                                    <textarea rows="3" class="form-control" placeholder="Contoh: Lomba desain UI/UX tingkat nasional..." name="deskripsi_lomba" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-black">Upload Proposal</label>
                                    <input type="file" class="form-control" accept=".pdf" name="proposal" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-black">Pilih Dosen Pembimbing</label>
                                    <select name="id_dosen" class="form-control" required>
                                        <option value="" disabled selected>Pilih Dosen Pembimbing</option>
                                        @foreach ($dosenList as $dosen)
                                            <option value="{{ $dosen->id_dosen }}">{{ $dosen->nama_dosen }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Ketua Tim (otomatis login) -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-black">Ketua Tim</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->nama }}" readonly>
                                    <input type="hidden" name="ketua_tim" value="{{ auth()->user()->id_mahasiswa }}">
                                </div>

                                <!-- Anggota 1 - 4 -->
                                @for ($i = 1; $i <= 4; $i++)
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-black">Anggota {{ $i }}</label>
                                        <select name="anggota_{{ $i }}" id="anggota_{{ $i }}" class="form-control anggota-select" {{ $i <= 0 ? 'required' : '' }}>
                                            <option value="" disabled selected>Pilih Anggota {{ $i }}</option>
                                            @foreach ($anggotaTim as $anggota)
                                                @if ($anggota->id_mahasiswa != auth()->user()->id_mahasiswa)
                                                    <option value="{{ $anggota->id_mahasiswa }}">{{ $anggota->nama }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                @endfor
                                <button type="submit" class="btn btn-primary">Ajukan Bimbingan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Riwayat Tab -->
                <div class="tab-pane fade" id="riwayat" role="tabpanel" aria-labelledby="riwayat-tab">
                    <div class="card shadow-sm">
                        <div class="card-header fw-bold text-black">Riwayat Pengajuan Bimbingan</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-secondary">No</th>
                                            <th class="text-center text-secondary">Nama Lomba</th>
                                            <th class="text-center text-secondary">Nama Tim</th>
                                            <th class="text-center text-secondary">Nama Dosen Pembimbing</th>
                                            <th class="text-center text-secondary">Status</th>
                                            <th class="text-center text-secondary">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($riwayatBimbinganList as $bimbingan)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $bimbingan->nama_lomba }}</td>
                                            <td class="text-center">{{ $bimbingan->tim->nama_tim }}</td>
                                            <td class="text-center">{{ $bimbingan->dosen->nama_dosen }}</td>
                                            <td class="text-center">
                                                @php
                                                    $badgeClass = match($bimbingan->status) {
                                                        'Disetujui' => 'badge-success',
                                                        'Ditolak' => 'badge-danger',
                                                        'Belum Diverifikasi' => 'badge-secondary',
                                                        default => 'badge-secondary'
                                                    };
                                                    @endphp
                                                    <span class="badge {{ $badgeClass }}">{{ $bimbingan->status }}</span>
                                            </td>

                                            <td class="text-left">
                                                <a href="{{ url('mahasiswa/detail-pengajuan/' . $bimbingan->id_pengajuan_dospem) }}" class="btn btn-primary btn-sm">Detail</a>
                                                @if($bimbingan->status == 'Ditolak')
                                                    <a href="{{ url('mahasiswa/edit-pengajuan/' . $bimbingan->id_pengajuan_dospem) }}" class="btn btn-warning btn-sm">
                                                        Edit
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Belum ada riwayat pengajuan bimbingan lomba.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.tab-content -->

        </div> <!-- /.card-body -->
    </div> <!-- /.card -->

</div>

{{-- Custom CSS untuk gaya tab underline --}}
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

<!-- Script untuk menghindari pilihan duplikat -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selects = document.querySelectorAll('.anggota-select');

        selects.forEach(select => {
            select.addEventListener('change', updateOptions);
        });

        function updateOptions() {
            // Ambil semua value yang sudah dipilih
            let selectedValues = Array.from(selects).map(s => s.value).filter(v => v);

            selects.forEach(select => {
                let currentValue = select.value;

                Array.from(select.options).forEach(option => {
                    if (option.value === "" || option.value === currentValue) {
                        option.disabled = false;
                    } else {
                        option.disabled = selectedValues.includes(option.value);
                    }
                });
            });
        }
    });
</script>

<!-- SweetAlert Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<!-- SweetAlert ketika ada session error -->
@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{ session('error') }}',
        showConfirmButton: true
    });
</script>
@endif
@endsection

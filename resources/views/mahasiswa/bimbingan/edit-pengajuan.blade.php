@extends('layout.template')

@section('content')
<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Edit Pengajuan Bimbingan</h3>
        </div>
    </div>

    <div class="tab-content" id="lineTabContent">
        <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">
            <div class="card shadow-sm">
                <div class="card-header fw-bold text-black">
                    Form Edit Pengajuan Bimbingan Lomba
                </div>
                <form method="POST" action="{{ url('mahasiswa/update-pengajuan/'.$dospem->id_pengajuan_dospem) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <!-- Nama Tim -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-black">Nama Tim</label>
                            <input type="text" class="form-control" name="nama_tim" value="{{ $dospem->tim->nama_tim }}" required>
                        </div>

                        <!-- Nama Lomba -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-black">Nama Lomba</label>
                            <input type="text" class="form-control" name="nama_lomba" value="{{ $dospem->nama_lomba }}" required>
                        </div>

                        <!-- Deskripsi Lomba -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-black">Deskripsi Lomba</label>
                            <textarea rows="3" class="form-control" name="deskripsi_lomba" required>{{ $dospem->deskripsi_lomba }}</textarea>
                        </div>

                        <!-- Upload Proposal -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-black">Upload Proposal (PDF)</label>
                            <input type="file" class="form-control" name="proposal" accept=".pdf">
                        </div>

                        <!-- Dosen Pembimbing -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-black">Pilih Dosen Pembimbing</label>
                            <select name="id_dosen" class="form-control" required>
                                <option value="{{ $dospem->id_dosen }}" selected>{{ $dospem->dosen->nama_dosen }}</option>
                                @foreach ($dosenList as $dosen)
                                    @if ($dosen->id_dosen != $dospem->id_dosen)
                                        <option value="{{ $dosen->id_dosen }}">{{ $dosen->nama_dosen }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <!-- Ketua Tim -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-black">Ketua Tim</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->nama }}" readonly>
                            <input type="hidden" name="ketua_tim" value="{{ auth()->user()->id_mahasiswa }}">
                        </div>

                        <!-- Anggota Tim -->
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-black">Anggota {{ $i }}</label>
                                <select name="anggota_{{ $i }}" class="form-control anggota-select">
                                    <option value="">Pilih Anggota {{ $i }}</option>
                                    @php
                                        $anggotaIndex = $i;
                                        $anggota = $dospem->tim->anggota_tim[$anggotaIndex]->mahasiswa ?? null;
                                    @endphp
                                    @foreach ($anggotaTim as $mhs)
                                        @if ($mhs->id_mahasiswa != auth()->user()->id_mahasiswa)
                                            <option value="{{ $mhs->id_mahasiswa }}"
                                                {{ (isset($anggota) && $anggota->id_mahasiswa == $mhs->id_mahasiswa) ? 'selected' : '' }}>
                                                {{ $mhs->nama }}
                                            </option>
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
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selects = document.querySelectorAll('.anggota-select');

        function updateOptions() {
            const selectedValues = Array.from(selects)
                .map(select => select.value)
                .filter(val => val !== "");

            selects.forEach(select => {
                Array.from(select.options).forEach(option => {
                    if (option.value === "") return;
                    option.disabled = selectedValues.includes(option.value) && select.value !== option.value;
                });
            });
        }

        selects.forEach(select => {
            select.addEventListener('change', updateOptions);
        });

        updateOptions();
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
@endpush

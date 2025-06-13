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

                        <div class="mb-3">
                            <label for="nama_tim" class="form-label fw-semibold text-black">Nama Tim</label>
                            <input type="text" class="form-control" id="nama_tim" name="nama_tim" value="{{ $dospem->tim->nama_tim }}" required placeholder="Masukkan nama tim" title="Masukkan nama tim">
                        </div>

                        <div class="mb-3">
                            <label for="nama_lomba" class="form-label fw-semibold text-black">Nama Lomba</label>
                            <input type="text" class="form-control" id="nama_lomba" name="nama_lomba" value="{{ $dospem->nama_lomba }}" required placeholder="Masukkan nama lomba" title="Masukkan nama lomba">
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi_lomba" class="form-label fw-semibold text-black">Deskripsi Lomba</label>
                            <textarea rows="3" class="form-control" id="deskripsi_lomba" name="deskripsi_lomba" required placeholder="Masukkan deskripsi lomba" title="Masukkan deskripsi lomba">{{ $dospem->deskripsi_lomba }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="proposal" class="form-label fw-semibold text-black">Upload Proposal (PDF)</label>
                            <input type="file" class="form-control" id="proposal" name="proposal" accept=".pdf" title="Unggah proposal dalam format PDF">
                        </div>

                        <div class="mb-3">
                            <label for="id_dosen" class="form-label fw-semibold text-black">Pilih Dosen Pembimbing</label>
                            <select name="id_dosen" id="id_dosen" class="form-control" required title="Pilih dosen pembimbing">
                                <option value="{{ $dospem->id_dosen }}" selected>{{ $dospem->dosen->nama_dosen }}</option>
                                @foreach ($dosenList as $dosen)
                                    @if ($dosen->id_dosen != $dospem->id_dosen)
                                        <option value="{{ $dosen->id_dosen }}">{{ $dosen->nama_dosen }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-black">Ketua Tim</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->nama }}" readonly title="Nama ketua tim">
                            <input type="hidden" name="ketua_tim" value="{{ auth()->user()->id_mahasiswa }}">
                        </div>

                        @for ($i = 1; $i <= 4; $i++)
                            <div class="mb-3">
                                <label for="anggota_{{ $i }}" class="form-label fw-semibold text-black">Anggota {{ $i }}</label>
                                <select name="anggota_{{ $i }}" id="anggota_{{ $i }}" class="form-control anggota-select" title="Pilih anggota tim ke-{{ $i }}">
                                    <option value="">Pilih Anggota {{ $i }}</option>
                                    @foreach ($anggotaTim as $mhs)
                                        @if ($mhs->id_mahasiswa != auth()->user()->id_mahasiswa)
                                            @php
                                                $existingAnggota = $dospem->tim->anggota_tim[$i]->id_mahasiswa ?? null;
                                            @endphp
                                            <option value="{{ $mhs->id_mahasiswa }}"
                                                {{ old("anggota_$i", $existingAnggota) == $mhs->id_mahasiswa ? 'selected' : '' }}>
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

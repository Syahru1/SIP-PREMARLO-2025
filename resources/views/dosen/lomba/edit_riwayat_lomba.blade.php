@extends('layout.template')

@section('content')
    @empty($detailLomba)
        <!-- Modal jika data tidak ditemukan -->
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kesalahan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                        Data Lomba tidak ditemukan.
                    </div>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    @else
        <div class="layout-px-spacing">
            <div class="page-header">
                <div class="page-title">
                    <h3>Edit Lomba</h3>
                </div>
            </div>

            <div class="row layout-spacing">
                <div class="col-lg-12">
                    <form method="POST"
                        action="{{ url('/dosen/lomba/riwayat-lomba/' . $detailLomba->id_lomba . '/update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <div class="form-row mb-4">
                                    <div class="col">
                                        <label class="text-black" for="kode_lomba">Kode Lomba</label>
                                        <input type="text" value="{{ $detailLomba->kode_lomba }}"
                                            class="form-control border border-secondary" id="kode_lomba" name="kode_lomba"
                                            readonly>
                                    </div>
                                    <div class="col">
                                        <label class="text-black" for="kode_pemohon">Kode Pemohon</label>
                                        <input type="text" value="{{ $detailLomba->kode_pemohon }}"
                                            class="form-control border border-secondary" id="kode_pemohon" name="kode_pemohon"
                                            readonly>
                                    </div>
                                    <div class="col">
                                        <label class="text-black" for="nama_lomba">Nama Lomba</label>
                                        <input type="text" class="form-control border border-secondary" id="nama_lomba"
                                            name="nama_lomba" value="{{ old('nama_lomba', $detailLomba->nama_lomba) }}"
                                            placeholder="Masukkan Nama Lomba" required>
                                    </div>
                                </div>
                                <div class="form-row mb-5">
                                    <div class="col">
                                        <label class="text-black" for="penyelenggara">Penyelenggara</label>
                                        <select class="selectpicker form-control" data-style="btn btn-outline-secondary"
                                            name="penyelenggara" id="penyelenggara">
                                            <option selected value="{{ $detailLomba->id_penyelenggara }}">
                                                {{ $detailLomba->penyelenggara->nama_penyelenggara }}</option>
                                            <option disabled value="">--- Pilih Penyelenggara ---</option>
                                            @foreach ($penyelenggara as $penyelenggaraItem)
                                                <option value="{{ $penyelenggaraItem->id_penyelenggara }}">
                                                    {{ $penyelenggaraItem->nama_penyelenggara }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="text-black" for="biaya_pendaftaran">Biaya Pendaftaran</label>
                                        <select class="selectpicker form-control" data-style="btn btn-outline-secondary"
                                            name="biaya_pendaftaran" id="biaya_pendaftaran">
                                            <option selected value="{{ $detailLomba->id_biaya_pendaftaran }}">
                                                {{ $detailLomba->biayaPendaftaran->nama_biaya_pendaftaran }}
                                            </option>
                                            <option disabled value="">--- Pilih Biaya Pendaftaran ---</option>
                                            @foreach ($biayaPendaftaran as $biayaItem)
                                                @if ($biayaItem->nama_biaya_pendaftaran === 'Berbayar' || $biayaItem->nama_biaya_pendaftaran === 'Gratis')
                                                    <option value="{{ $biayaItem->id_biaya_pendaftaran }}">
                                                        {{ $biayaItem->nama_biaya_pendaftaran }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="text-black" for="tingkat_kompetisi">Tingkat Kompetisi</label>
                                        <select class="selectpicker form-control" data-style="btn btn-outline-secondary"
                                            name="tingkat_kompetisi" id="tingkat_kompetisi">
                                            <option selected value="{{ $detailLomba->id_tingkat_kompetisi }}">
                                                {{ $detailLomba->tingkatKompetisi->nama_tingkat_kompetisi }}
                                            </option>
                                            <option disabled value="">--- Pilih Tingkat Kompetisi ---</option>
                                            @foreach ($tingkatKompetisi as $tingkatItem)
                                                <option value="{{ $tingkatItem->id_tingkat_kompetisi }}">
                                                    {{ $tingkatItem->nama_tingkat_kompetisi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="text-black" for="hadiah">Hadiah</label>
                                        <select class="selectpicker form-control" data-style="btn btn-outline-secondary"
                                            name="hadiah" id="hadiah">
                                            <option selected value="{{ $detailLomba->id_hadiah }}">
                                                {{ $detailLomba->hadiah->nama_hadiah }}</option>
                                            <option disabled value="">--- Pilih Hadiah ---</option>
                                            @foreach ($hadiah as $item)
                                                <option value="{{ $item->id_hadiah }}">{{ $item->nama_hadiah }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="col">
                                        <label class="text-black" for="tanggal_pendaftaran">Tanggal Pendaftaran</label>
                                        <input id="rangeCalendarFlatpickr" name="tanggal_pendaftaran"
                                            class="form-control flatpickr flatpickr-input border border-secondary"
                                            type="text" placeholder="Select Date.."
                                            value="{{ old('tanggal_pendaftaran', $detailLomba->tanggal_mulai_pendaftaran . ' to ' . $detailLomba->tanggal_akhir_pendaftaran) }}"
                                            required>
                                    </div>
                                    <div class="col">
                                        <label class="text-black" for="lokasi">Lokasi Lomba</label>
                                        <input type="text" class="form-control border border-secondary" id="lokasi"
                                            name="lokasi" placeholder="Isi Lokasi Lomba"
                                            value="{{ old('lokasi', $detailLomba->lokasi_lomba) }}" required>
                                    </div>
                                    <div class="col">
                                        <label class="text-black" for="link">Link Informasi Resmi</label>
                                        <input type="text" class="form-control border border-secondary" id="link"
                                            name="link" placeholder="Isi Link Informasi Resmi"
                                            value="{{ old('link', $detailLomba->link_pendaftaran) }}" required>
                                    </div>
                                    <div class="col">
                                        <label class="text-black" for="">Upload Pamflet Lomba</label>
                                        @if ($detailLomba->gambar_lomba)
                                            <input type="text" name="gambar_lomba"
                                                class="form-control border border-secondary"
                                                value="{{ old('gambar_lomba', $detailLomba->gambar_lomba) }}" readonly>
                                        @else
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile"
                                                    name="gambar_lomba"
                                                    value="{{ old('gambar_lomba', $detailLomba->gambar_lomba) }}">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="text-black" for="">Pilih Minat Lomba</label>
                                    <div class="n-chk">
                                        @foreach ($bidang as $bidangItem)
                                            @php
                                                $isSelected = false;
                                                if (isset($detailLomba->bidang)) {
                                                    $isSelected = $detailLomba->bidang->contains(
                                                        'id_bidang',
                                                        $bidangItem->id_bidang,
                                                    );
                                                } elseif (isset($selectedBidang)) {
                                                    $isSelected = in_array($bidangItem->id_bidang, $selectedBidang);
                                                }
                                            @endphp
                                            <label
                                                class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-secondary">
                                                <input type="checkbox" class="new-control-input" name="bidang[]"
                                                    value="{{ $bidangItem->id_bidang }}" {{ $isSelected ? 'checked' : '' }}>
                                                <span class="new-control-indicator"></span><span
                                                    class="new-chk-content">{{ $bidangItem->nama_bidang }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlTextarea1">Example textarea</label>
                                    @if ($detailLomba->deskripsi_lomba)
                                        <input type="text" name="deskripsi_lomba"
                                            class="form-control border border-secondary"
                                            value="{{ old('deskripsi_lomba', $detailLomba->deskripsi_lomba) }}" readonly>
                                    @else
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi_lomba" rows="3"
                                            value="{{ old('deskripsi_lomba', $detailLomba->deskripsi_lomba) }}"></textarea>
                                        <label class="text-black" for="">Upload Pamflet Lomba</label>
                                    @endif
                                </div>
                                <div class="form-group mb-4">
                                    <label class="text-black" for="catatan">Catatan</label>
                                    <input type="text" class="form-control border border-secondary" id="catatan"
                                        name="catatan" placeholder="Isi Catatan"
                                        value="{{ old('catatan', $detailLomba->catatan) }}" required disabled>
                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endempty


    <!-- Load SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session("success") }}',
                // timer: 2000,
                showConfirmButton: true
            });
        </script>
    @elseif (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session("error") }}',
                // timer: 2000,
                showConfirmButton: true
            });
        </script>
    @endif

@endsection

@push('js')
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

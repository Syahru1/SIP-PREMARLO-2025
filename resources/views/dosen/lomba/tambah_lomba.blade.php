<form method="POST" action="{{ url('/dosen/lomba/store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-row mb-4">
        <div class="col">
            <label class="text-black" for="kode_lomba">Kode Lomba</label>
            <input type="text" value="{{ $kodeLomba }}" class="form-control border border-secondary" id="kode_lomba"
                name="kode_lomba" readonly>
        </div>
        <div class="col">
            <label class="text-black" for="nama_lomba">Nama Lomba</label>
            <input type="text" class="form-control border border-secondary" id="nama_lomba" name="nama_lomba" value="{{ old('nama_lomba') }}"
                placeholder="Masukkan Nama Lomba" required>
        </div>
    </div>
    <div class="form-row mb-5">
        <div class="col">
            <label class="text-black" for="penyelenggara">Penyelenggara</label>
            <select class="selectpicker form-control" data-style="btn btn-outline-secondary" name="penyelenggara"
                id="penyelenggara">
                <option selected disabled value="">--- Pilih Penyelenggara ---</option>
                @foreach ($penyelenggara as $penyelenggaraItem)
                    <option value="{{ $penyelenggaraItem->id_penyelenggara }}">
                        {{ $penyelenggaraItem->nama_penyelenggara }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label class="text-black" for="biaya_pendaftaran">Biaya Pendaftaran</label>
            <select class="selectpicker form-control" data-style="btn btn-outline-secondary" name="biaya_pendaftaran"
                id="biaya_pendaftaran">
                <option selected disabled value="">--- Pilih Biaya Pendaftaran ---</option>
                @foreach ($biayaPendaftaran as $biayaItem)
                    @if ($biayaItem->nama_biaya_pendaftaran === 'Berbayar' || $biayaItem->nama_biaya_pendaftaran === 'Gratis')
                        <option value="{{ $biayaItem->id_biaya_pendaftaran }}">{{ $biayaItem->nama_biaya_pendaftaran }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col">
            <label class="text-black" for="tingkat_kompetisi">Tingkat Kompetisi</label>
            <select class="selectpicker form-control" data-style="btn btn-outline-secondary" name="tingkat_kompetisi"
                id="tingkat_kompetisi">
                <option selected disabled value="">--- Pilih Tingkat Kompetisi ---</option>
                @foreach ($tingkatKompetisi as $tingkatItem)
                    <option value="{{ $tingkatItem->id_tingkat_kompetisi }}">{{ $tingkatItem->nama_tingkat_kompetisi }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label class="text-black" for="hadiah">Hadiah</label>
            <select class="selectpicker form-control" data-style="btn btn-outline-secondary" name="hadiah"
                id="hadiah">
                <option selected disabled value="">--- Pilih Hadiah ---</option>
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
                class="form-control flatpickr flatpickr-input border border-secondary" type="text"
                placeholder="Select Date.." value="{{ old('tanggal_pendaftaran') }}" required>
        </div>
        <div class="col">
            <label class="text-black" for="lokasi">Lokasi Lomba</label>
            <input type="text" class="form-control border border-secondary" id="lokasi" name="lokasi"
                placeholder="Isi Lokasi Lomba" value="{{ old('lokasi') }}" required>
        </div>
        <div class="col">
            <label class="text-black" for="link">Link Informasi Resmi</label>
            <input type="text" class="form-control border border-secondary" id="link"
                name="link" placeholder="Isi Link Informasi Resmi" value="{{ old('link') }}" required>
        </div>
        <div class="col">
            <label class="text-black" for="">Upload Pamflet Lomba</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="gambar_lomba">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
    </div>
    <div class="form-group mb-4">
        <label class="text-black" for="">Pilih Minat Lomba</label>
        <div class="n-chk">
            @foreach ($bidang as $bidangItem)
                <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-secondary">
                    <input type="checkbox" class="new-control-input" name="bidang[]"
                        value="{{ $bidangItem->id_bidang }}">
                    <span class="new-control-indicator"></span><span
                        class="new-chk-content">{{ $bidangItem->nama_bidang }}</span>
                </label>
            @endforeach
        </div>
    </div>
    <div class="form-group mb-4">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi_lomba" rows="3" value="{{ old('deskripsi_lomba') }}"></textarea>
    </div>

    <div class="d-flex justify-content-end mt-4">
        <button type="submit" class="btn btn-success">Simpan</button>
    </div>

</form>

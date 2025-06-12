<div class="card">
    <div class="card-body">
        {{-- === FORM PERSONALISASI PREFERENSI (STATIC PREVIEW) === --}}
        <form id="formPersonal" method="POST" action="{{ url('/mahasiswa/profil/' . $preferensi->id_preferensi_mahasiswa . '/update') }}">
            @csrf
            @method('PUT')
            {{-- BIDANG --}}
            <div class="mb-4">
                <label class="form-label fw-semibold text-dark">Bidang yang Kamu Minati</label>
                <div class="row">
                    @foreach ($bidang as $b)
                        <div class="col-md-6 mb-2">
                            <div class="form-check rounded border px-3 py-2 shadow-sm bg-light">
                                <input class="form-check-input me-2" type="checkbox" name="bidang[]"
                                    value="{{ $b->id_bidang }}" id="bidang{{ $b->id_bidang }}">
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
                    <span class="input-group-text bg-white border-end-0"><i
                            class="bi bi-cash-stack text-muted"></i></span>
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
                    <span class="input-group-text bg-white border-end-0"><i
                            class="bi bi-building text-muted"></i></span>
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
                    <span class="input-group-text bg-white border-end-0"><i
                            class="bi bi-bar-chart text-muted"></i></span>
                    <select name="tingkat_kompetisi" class="form-select border-start-0">
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

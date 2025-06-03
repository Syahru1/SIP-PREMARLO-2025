@extends('layout.template')

@section('content')
<!-- BEGIN CONTENT AREA -->
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Edit Data Lomba</h4>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <div class="tab-content" id="lineTabContent-3">
                <div class="tab-pane fade show active" id="edit-lomba" role="tabpanel" aria-labelledby="edit-tab">
                    <form>

                        <div class="form-group mb-4">
                            <label class="text-black" for="namaLomba">Nama Lomba</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="namaLomba" name="namaLomba" value="Kompetisi Robot Pintar">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="kategori">Kategori</label>
                            <select id="kategori" name="kategori" class="form-control border border-secondary text-dark bg-white">
                                <option {{ 'IT' == 'IT' ? 'selected' : '' }}>IT</option>
                                <option {{ 'IT' == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                                <option {{ 'IT' == 'Soft Skill' ? 'selected' : '' }}>Soft Skill</option>
                                <option {{ 'IT' == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="penyelenggara">Penyelenggara</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="penyelenggara" name="penyelenggara" value="Puspresnas">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="tingkatKompetisi">Tingkat Kompetisi</label>
                            <select id="tingkatKompetisi" name="tingkatKompetisi" class="form-control border border-secondary text-dark bg-white">
                                <option {{ 'Nasional' == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                                <option {{ 'Nasional' == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                                <option {{ 'Nasional' == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                                <option {{ 'Nasional' == 'Kabupaten' ? 'selected' : '' }}>Kabupaten</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="link">Link Pendaftaran</label>
                            <input type="url" class="form-control border border-secondary text-dark bg-white" id="link" name="link" value="https://infolomba.id/info-fopesco-2025-626">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="bidang">Bidang Keahlian</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="bidang" name="bidang" value="Artificial Intellegence">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="dibuka">Tanggal Pendaftaran Dibuka</label>
                            <input type="date" class="form-control border border-secondary text-dark bg-white" id="dibuka" name="dibuka" value="2025-05-02">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="ditutup">Tanggal Pendaftaran Ditutup</label>
                            <input type="date" class="form-control border border-secondary text-dark bg-white" id="ditutup" name="ditutup" value="2025-06-01">
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <a href="{{ url('admin/kelola-data-lomba') }}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

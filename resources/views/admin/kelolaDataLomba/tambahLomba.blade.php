@extends('layout.template')

@section('content')
<!-- BEGIN CONTENT AREA -->
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Tambah Data Lomba</h4>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <div class="tab-content" id="lineTabContent-3">
                <div class="tab-pane fade show active" id="tambah-lomba" role="tabpanel" aria-labelledby="tambah-tab">
                    <form>

                        <div class="form-group mb-4">
                            <label class="text-black" for="namaLomba">Nama Lomba</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="namaLomba" name="namaLomba" placeholder="Masukkan Nama Lomba">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="kategori">Kategori</label>
                            <select id="kategori" name="kategori" class="form-control border border-secondary text-dark bg-white">
                                <option>IT</option>
                                <option>Akademik</option>
                                <option>Soft Skill</option>
                                <option>Teknologi</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="penyelenggara">Penyelenggara</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="penyelenggara" name="penyelenggara" placeholder="Masukkan Penyelenggara Lomba">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="tingkatKompetisi">Tingkat Kompetisi</label>
                            <select id="tingkatKompetisi" name="tingkatKompetisi" class="form-control border border-secondary text-dark bg-white">
                                <option>Nasional</option>
                                <option>Internasional</option>
                                <option>Provinsi</option>
                                <option>Kabupaten</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="link">Link Pendaftaran</label>
                            <input type="url" class="form-control border border-secondary text-dark bg-white" id="link" name="link" placeholder="Masukkan Link Pendaftaran">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="bidang">Bidang Keahlian</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="bidang" name="bidang" placeholder="Masukkan Bidang Keahlian">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="dibuka">Tanggal Pendaftaran Dibuka</label>
                            <input type="date" class="form-control border border-secondary text-dark bg-white" id="dibuka" name="dibuka">
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="ditutup">Tanggal Pendaftaran Ditutup</label>
                            <input type="date" class="form-control border border-secondary text-dark bg-white" id="ditutup" name="ditutup">
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

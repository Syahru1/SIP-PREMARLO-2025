@extends('layout.template')

@section('content')

<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Detail Prestasi</h4>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <div class="tab-content" id="lineTabContent-3">
                <div class="tab-pane fade show active" id="edit-prestasi" role="tabpanel" aria-labelledby="edit-tab">
                    <form>
                        <div class="form-group mb-4">
                            <label class="text-black" for="namaLomba">Nama Lomba</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="namaLomba" name="namaLomba" value="Lomba Debat Mahasiswa" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="kategori">Kategori</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="kategori" name="kategori" value="Akademik" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="tingkat">Tingkat</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="tingkat" name="tingkat" value="Nasional" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="penyelenggara">Penyelenggara</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="penyelenggara" name="penyelenggara" value="Puspresnas" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="tahun">Tahun</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="tahun" name="tahun" value="2023" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="buktiLomba">Bukti Prestasi (PDF/PNG/JPG)</label><br>
                            <a href="#" class="btn btn-primary" id="btnDownload">Download File</a>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="catatan">Catatan</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="catatan" name="catatan" value="File Tidak Bisa Dibuka">
                        </div>

                       <div class="d-flex justify-content-end gap-3 mt-4">
                            <button type="button" class="btn btn-danger" onclick="window.location.href='{{ url('/admin/verifikasi-prestasi') }}'">Tolak</button>
                            <button type="button" class="btn btn-success" onclick="window.location.href='{{ url('/admin/verifikasi-prestasi') }}'">Terima</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

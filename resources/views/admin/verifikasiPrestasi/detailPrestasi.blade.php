@empty($prestasi)
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
                Data prestasi tidak ditemukan.
            </div>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Kembali</button>
        </div>
    </div>
</div>
@else
<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Detail Prestasi</h3>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <div class="tab-content" id="lineTabContent-3">
                <div class="tab-pane fade show active" id="detail-prestasi" role="tabpanel" aria-labelledby="detail-tab">
                    <form>
                        <div class="form-group mb-4">
                            <label class="text-black" for="namaLomba">Nama Lomba</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="namaLomba" value="{{ $detailPrestasi->nama_lomba }}" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="kategori">Kategori</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="kategori" value="{{ $detailPrestasi->kategori }}" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="tingkat">Tingkat</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="tingkat" value="{{ $detailPrestasi->tingkat }}" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="penyelenggara">Penyelenggara</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="penyelenggara" value="{{ $detailPrestasi->penyelenggara }}" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="tahun">Tahun</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="tahun" value="{{ $detailPrestasi->tahun }}" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="buktiLomba">Bukti Prestasi (PDF/PNG/JPG)</label><br>
                            <a href="{{ $detailPrestasi->file_url }}" class="btn btn-primary" id="btnDownload" download>Download File</a>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="catatan">Catatan</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="catatan" value="{{ $detailPrestasi->catatan }}">
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

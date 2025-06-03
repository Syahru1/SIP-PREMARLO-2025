@extends('layout.template')

@section('content')
<!--  BEGIN CONTENT AREA  -->
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h3>Detail Lomba</h3>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <div class="tab-content" id="lineTabContent-3">
                <div class="tab-pane fade show active" id="detail-lomba" role="tabpanel" aria-labelledby="detail-tab">
                    <form>
                        <div class="form-group mb-4">
                            <label class="text-black" for="namaLomba">Nama Lomba</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="namaLomba" value="UI / UX Design" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="penyelenggara">Penyelenggara</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="penyelenggara" value="Politeknik Negeri Malang" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="mulai">Tanggal Mulai</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="mulai" value="2025-05-15" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="berakhir">Tanggal Berakhir</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="berakhir" value="2025-06-20" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="link">Link Pendaftaran</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="link" value="https://infolomba.id/info-fopesco-2025-626" readonly>
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="catatan">Catatan</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="catatan" value="Link Tidak Bisa Dibuka">
                        </div>
                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <button type="button" class="btn btn-danger" onclick="window.location.href='{{ url('/admin/verifikasi-lomba') }}'">Tolak</button>
                            <button type="button" class="btn btn-success" onclick="window.location.href='{{ url('/admin/verifikasi-lomba') }}'">Terima</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

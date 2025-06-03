@extends('layout.template')

@section('content')
@php
    $detailLomba = (object)[
        'nama_lomba' => 'UI / UX Design',
        'penyelenggara' => 'Politeknik Negeri Malang',
        'tanggal_mulai' => '2025-05-15',
        'tanggal_berakhir' => '2025-06-20',
        'link_pendaftaran' => 'https://infolomba.id/info-fopesco-2025-626',
        'catatan' => 'Link Tidak Bisa Dibuka'
    ];
@endphp

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
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="namaLomba" value="{{ $detailLomba->nama_lomba }}" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="penyelenggara">Penyelenggara</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="penyelenggara" value="{{ $detailLomba->penyelenggara }}" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="mulai">Tanggal Mulai</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="mulai" value="{{ $detailLomba->tanggal_mulai }}" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="berakhir">Tanggal Berakhir</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="berakhir" value="{{ $detailLomba->tanggal_berakhir }}" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="link">Link Pendaftaran</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="link" value="{{ $detailLomba->link_pendaftaran }}" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="catatan">Catatan</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="catatan" value="{{ $detailLomba->catatan }}">
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

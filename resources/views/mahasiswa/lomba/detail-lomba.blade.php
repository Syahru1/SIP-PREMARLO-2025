@extends('layout.template')

@section('content')
<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Detail Lomba</h3>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <h5 class="card-title">UI/UX Competition 2025</h5>

            <table class="table table-bordered mt-4">
                <tbody>
                    <tr>
                        <th>Nama Lomba</th>
                        <td>{{ $detailLomba->nama_lomba }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pendaftaran</th>
                        <td>{{ $detailLomba->tanggal_mulai_pendaftaran }} - {{ $detailLomba->tanggal_akhir_pendaftaran }}</td>
                    </tr>
                    <tr>
                        <th>Bidang</th>
                        <td>
                            @foreach($detailBidang as $bidang)
                                <span class="badge badge-primary">{{ $bidang->bidang->nama_bidang }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Penyelenggara</th>
                        <td>{{ $detailLomba->penyelenggara->nama_penyelenggara }}</td>
                    </tr>
                    <tr>
                        <th>Hadiah</th>
                        <td>{{ $detailLomba->hadiah->nama_hadiah }}</td>
                    </tr>
                    <tr>
                        <th>Pendaftaran</th>
                        <td><a href="{{ $detailLomba->link_pendaftaran }}" target="_blank">{{ $detailLomba->link_pendaftaran }}</a></td>
                    </tr>
                    <tr>
                        <th>Tingkat Kompetisi</th>
                        <td>{{ $detailLomba->tingkatKompetisi->nama_tingkat_kompetisi }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($detailLomba->status_lomba == 'Masih Berlangsung')
                                <span class="badge badge-success">{{ $detailLomba->status_lomba }}</span>
                            @elseif($detailLomba->status_lomba == 'Selesai')
                                <span class="badge badge-danger">{{ $detailLomba->status_lomba }}</span>
                            @else
                                <span class="badge badge-secondary">{{ $detailLomba->status_lomba }}</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ url()->previous() }}" class="btn btn-secondary mr-2">Kembali</a>
                <a href="{{ $detailLomba->link_pendaftaran }}" class="btn btn-info">Daftar Sekarang</a>
            </div>
        </div>
    </div>
</div>
@endsection

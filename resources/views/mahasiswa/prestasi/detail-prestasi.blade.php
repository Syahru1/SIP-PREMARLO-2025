@extends('layout.template')

@section('content')
<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Detail Prestasi</h3>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th>Nama Prestasi</th>
                    <td>{{$data->juara_kompetisi}}</td>
                </tr>
                <tr>
                    <th>Nama Anggota</th>
                    <td>{{$data->mahasiswa->nama}}</td>
                </tr>
                <tr>
                    <th>Posisi</th>
                    <td>{{$data->posisi}}</td>
                </tr>
                <tr>
                    <th>Nama Kompetisi</th>
                    <td>{{$data->nama_kompetisi}}</td>
                </tr>
                <tr>
                    <th>Tingkat Kompetisi</th>
                    <td>{{$data->tingkat_kompetisi}}</td>
                </tr>
                <tr>
                    <th>Jenis Prestasi</th>
                    <td>{{$data->jenis_prestasi}}</td>
                </tr>
                <tr>
                    <th>Lokasi</th>
                    <td>{{$data->lokasi_kompetisi}}</td>
                </tr>
                <tr>
                    <th>Tanggal Surat Tugas</th>
                    <td>{{$data->tanggal_surat_tugas}}</td>
                </tr>
                <tr>
                    <th>Tanggal Kompetisi</th>
                    <td>{{$data->tanggal_kompetisi}}</td>
                </tr>
                <tr>
                    <th>Dosen Pembimbing</th>
                    <td>{{$data->dosen->nama_dosen}}</td>
                </tr>
                <tr>
                    <th>NIDN</th>
                    <td>{{$data->dosen->nidn}}</td>
                </tr>
                <tr>
                    <th>Periode</th>
                    <td>{{$data->periode->nama_periode}}</td>
                </tr>
                <tr>
                    <th>Jumlah Universitas</th>
                    <td>{{$data->jumlah_univ}}</td>
                </tr>
                <tr>
                    <th>Nomor Sertifikat</th>
                    <td>{{$data->nomor_sertifikat}}</td>
                </tr>
                <tr>
                    <th>Tanggal Pengajuan</th>
                    <td>{{$data->tanggal_pengajuan}}</td>
                </tr>
                <tr>
                    <th>Link Pendaftaran</th>
                    <td>
                        <a href="{{ $data->link_perlombaan }}" target="_blank">
                            {{ $data->link_perlombaan }}
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Foto Sertifikat</th>
                    <td>
                        <a href="{{ asset('storage/sertifikat/' . $data->foto_sertifikat) }}" target="_blank">
                            <img src="{{ asset('storage/sertifikat/' . $data->foto_sertifikat) }}"
                                alt="Bukti Sertifikat"
                                width="200"
                                class="img-fluid rounded shadow">
                        </a>
                        <p class="mt-2 text-muted">Klik gambar untuk melihat ukuran penuh.</p>
                    </td>
                </tr>
                    <th>Catatan</th>
                    <td>{{$data->catatan}}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @php
                            $badgeClass = match($data->status) {
                                'Sudah Diverifikasi' => 'badge-success',
                                'Ditolak' => 'badge-danger',
                                'Belum Diverifikasi' => 'badge-warning',
                                default => 'badge-secondary'
                            };
                        @endphp
                        <span class="badge {{ $badgeClass }}">{{ $data->status }}</span>
                    </td>
                </tr>

            </table>

            <div class="mt-4 d-flex justify-content-end">
                <a href="javascript:void(0);" onclick="history.back()" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection

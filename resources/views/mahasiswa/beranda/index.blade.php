@extends('layout.template')

@section('content')
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
                <h3>Beranda</h3>
            </div>
        </div>


        <!-- Leaderboard Mahasiswa Berprestasi -->
        <div class="card border-0 shadow-sm my-4">
            <div class="card-body">
                <h5 class="text-center fw-bold text-primary mb-4">🏆 Leaderboard Mahasiswa Berprestasi</h5>
                <div class="table-responsive">
                    <table class="table table-hover text-center align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th style="width: 60px;">#</th>
                                <th>Nama Mahasiswa</th>
                                <th>Prodi</th>
                                <th>Jumlah Prestasi</th>
                                <th>Poin</th>
                            </tr>
                        </thead>
                        <tbody>`
                            @foreach ($peringkatMahasiswa as $index => $mhs)
                                <tr>
                                    <td><strong>{{ $index + 1 }}</strong></td>
                                    <td class="text-start">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ url('uploads/profil/' . $mhs['foto']) }}"
                                                class="rounded-circle border" width="40" height="40" alt="avatar"
                                                style="margin-right: 16px;">
                                            <span class="fw-semibold text-dark">{{ $mhs['nama'] }}</span>
                                        </div>
                                    </td>
                                    <td class="text-dark">{{ $mhs['program_studi'] }}</td>
                                    <td class="text-dark">{{ $mhs['jumlah_prestasi'] }}</td>
                                    <td class="fw-bold text-success">{{ $mhs['total_skor'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Informasi Lomba -->

        <h5 class="mb-4 text-center text-dark fw-bold">Informasi Lomba Terkini</h5>

        <div class="form-row">
            @foreach ($dataLomba as $data)
                <div class="form-group col-mb-5" style="width: 25%;">
                    <div class="mb-4 card component-card_2">
                        <img src="{{ asset('uploads/lomba/' . $data->gambar_lomba) }}" class="card-img-top"
                            alt="{{ $data->nama_lomba }}" style="height: 200px; object-fit: cover;" data-toggle="modal"
                            data-target="#imageModal{{ $data->id_lomba }}">

                        <!-- Modal for displaying image -->
                        <div class="modal fade" id="imageModal{{ $data->id_lomba }}" tabindex="-1" role="dialog"
                            aria-labelledby="imageModalLabel{{ $data->id_lomba }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="imageModalLabel{{ $data->id_lomba }}">
                                            {{ $data->nama_lomba }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('uploads/lomba/' . $data->gambar_lomba) }}" class="img-fluid"
                                            alt="{{ $data->nama_lomba }}"
                                            style="width: 100%; max-height: 950px; object-fit: contain;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->nama_lomba }}</h5>
                            <p class="card-text">{{ $data->deskripsi_lomba }}</p>
                            <div class="form-row">
                                <div class="col">
                                    <a href="{{ url('mahasiswa/lomba/detail-lomba/' . $data->id_lomba) }}"
                                        class="btn btn-primary">Detail</a>
                                </div>
                                <div class="col">
                                    <p class="card-text mt-2 ml-3">
                                        {{ $data->tanggal_mulai_pendaftaran . ' - ' . $data->tanggal_akhir_pendaftaran }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- CONTENT AREA -->
    </div>
@endsection

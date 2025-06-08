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
                                <tbody>
                                    @foreach($peringkatMahasiswa as $index => $mhs)
                                    <tr>
                                        <td><strong>{{ $index + 1 }}</strong></td>
                                        <td class="text-start">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('assets/img/90x90.jpg') }}" class="rounded-circle border me-3" width="40" height="40" alt="avatar">
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

                        <div class="mb-4 card component-card_2">
                            <img src="assets/img/400x300.jpg" class="card-img-top" alt="widget-card-2">
                            <div class="card-body">
                                <h5 class="card-title">UI/UX Competition</h5>
                                <p class="card-text">Etiam sed augue ac justo tincidunt posuere. Vivamus euismod eros, nec risus malesuada.</p>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </div>
                        </div>

                        <div class="mb-4 card component-card_2">
                            <img src="assets/img/400x300.jpg" class="card-img-top" alt="widget-card-2">
                            <div class="card-body">
                                <h5 class="card-title">CTF 2025</h5>
                                <p class="card-text">Etiam sed augue ac justo tincidunt posuere. Vivamus euismod eros, nec risus malesuada.</p>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </div>
                        </div>

                        <div class="mb-4 card component-card_2">
                            <img src="assets/img/400x300.jpg" class="card-img-top" alt="widget-card-2">
                            <div class="card-body">
                                <h5 class="card-title">Data Analys Competition</h5>
                                <p class="card-text">Etiam sed augue ac justo tincidunt posuere. Vivamus euismod eros, nec risus malesuada.</p>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </div>
                        </div>



                    </div>
                </div>

            <!-- CONTENT AREA -->


            </div>
@endsection

@extends('layout.template')

@section('content')
            <div class="layout-px-spacing">

                <div class="page-header">
                    <div class="page-title">
                        <h3>Beranda</h3>
                    </div>
                </div>


                <!-- Leaderboard -->
                 <div class="card component-card_4">
                    <div class="card-body">
                        <h5 class="mb-4 text-center text-dark fw-bold">Leaderboard Mahasiswa Berprestasi</h5>
                       <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-4 align-middle">
                            <thead>
                                <tr>
                                    <th class="text-secondary" style="width: 60px; text-align: center;">#</th>
                                    <th class="text-secondary">Nama Mahasiswa</th>
                                    <th class="text-secondary" style="width: 80px; text-align: center;">Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="usr-img-frame me-3 border border-dark rounded-circle">
                                                <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" width="40" height="40">
                                            </div>
                                            <p class="mb-0" style=" margin-left: 1rem;">Shaun</p>
                                        </div>
                                    </td>
                                    <td class="text-center">320</td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="usr-img-frame me-3 border border-dark rounded-circle">
                                                <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" width="40" height="40">
                                            </div>
                                            <p class="mb-0" style=" margin-left: 1rem;">Alma</p>
                                        </div>
                                    </td>
                                    <td class="text-center">420</td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="usr-img-frame me-3 border border-dark rounded-circle">
                                                <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" width="40" height="40">
                                            </div>
                                            <p class="mb-0" style=" margin-left: 1rem;">Kelly</p>
                                        </div>
                                    </td>
                                    <td class="text-center" style=" margin-left: 1rem;">130</td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="usr-img-frame me-3 border border-dark rounded-circle">
                                                <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" width="40" height="40">
                                            </div>
                                            <p class="mb-0" style=" margin-left: 1rem;">Vincent</p>
                                        </div>
                                    </td>
                                    <td class="text-center">260</td>
                                </tr>
                            </tbody>
                        </table>
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

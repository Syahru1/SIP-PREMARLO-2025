@extends('layout.template')

@section('content')
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h3>Pengajuan Bimbingan</h3>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <!-- Tabs -->
            <ul class="nav nav-tabs mb-3" id="lineTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="true">Pengajuan Bimbingan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="riwayat-tab" data-toggle="tab" href="#riwayat" role="tab" aria-controls="riwayat" aria-selected="false">Riwayat</a>
                </li>
            </ul>

            <div class="tab-content" id="lineTabContent">
                <!-- Form Tab -->
                <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">
                    <div class="card  shadow-sm">
                        <div class="card-header fw-bold text-black ">
                            Form Pengajuan Bimbingan Lomba
                        </div>
                        <form method="POST" action="#" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-black">Nama Lomba</label>
                                    <input type="text" class="form-control" placeholder="Contoh: UI/UX Nasional 2025" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-black">Nama Tim</label>
                                    <input type="text" class="form-control" placeholder="Contoh: Tim Kreatif B" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-black">Anggota Tim</label>
                                    <textarea rows="2" class="form-control" placeholder="Contoh: Mahasiswa B, Mahasiswa C, Mahasiswa D" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-black">Deskripsi Lomba</label>
                                    <textarea rows="3" class="form-control" placeholder="Contoh: Lomba desain UI/UX tingkat nasional..." required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-black">Upload Proposal</label>
                                    <input type="file" class="form-control" accept=".pdf,.doc,.docx" required>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Ajukan Bimbingan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Riwayat Tab -->
                <div class="tab-pane fade" id="riwayat" role="tabpanel" aria-labelledby="riwayat-tab">
                    <div class="card shadow-sm">
                        <div class="card-header fw-bold text-black">Riwayat Pengajuan Bimbingan</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-secondary">No</th>
                                            <th class="text-center text-secondary">Nama Lomba</th>
                                            <th class="text-center text-secondary">Nama Tim</th>
                                            <th class="text-center text-secondary">Anggota</th>
                                            <th class="text-center text-secondary">Tahun</th>
                                            <th class="text-center text-secondary">Status</th>
                                            <th class="text-center text-secondary">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">UI/UX Nasional</td>
                                            <td class="text-center">Tim Kreatif</td>
                                            <td class="text-center">Mahasiswa A, B, C</td>
                                            <td class="text-center">2025</td>
                                            <td class="text-center">
                                                <span class="badge badge-warning">Belum Diverifikasi</span>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-primary btn-sm">Detail</a>
                                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="text-center">Belum ada riwayat pengajuan bimbingan lomba.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.tab-content -->

        </div> <!-- /.card-body -->
    </div> <!-- /.card -->

</div>

{{-- Custom CSS untuk gaya tab underline --}}
<style>
    .nav-tabs .nav-link {
        color: #6c757d;
        border: none;
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .nav-tabs .nav-link.active {
        color: #6f42c1 !important;
        font-weight: 600;
        border-bottom: 3px solid #6f42c1 !important;
    }

    .nav-tabs .nav-link:hover {
        color: #5a32a3;
    }
</style>
@endsection

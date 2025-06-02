@extends('layout.template')

@section('content')
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h3>Lomba</h3>
        </div>
    </div>

    
    <div class="card component-card_4">
        <div class="card-body">

            <ul class="nav nav-tabs mb-3" id="lineTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="underline-home-tab" data-toggle="tab" href="#underline-home" role="tab" aria-controls="underline-home" aria-selected="true">Data Lomba</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="underline-profile-tab" data-toggle="tab" href="#underline-profile" role="tab" aria-controls="underline-profile" aria-selected="false">Tambah Lomba</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="underline-contact-tab" data-toggle="tab" href="#underline-contact" role="tab" aria-controls="underline-contact" aria-selected="false">Riwayat</a>
                </li>
            </ul>

            <div class="tab-content" id="lineTabContent-3">
                <div class="tab-pane fade show active" id="underline-home" role="tabpanel" aria-labelledby="underline-home-tab">
                    <p class="mb-4">
                    <div class="mb-4 card component-card_2">
                            <img src="assets/img/400x300.jpg" class="card-img-top" alt="widget-card-2">
                            <div class="card-body">
                                <h5 class="card-title">UI/UX Competition 2025</h5>
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
                    </p>
                </div>
                <div class="tab-pane fade" id="underline-profile" role="tabpanel" aria-labelledby="underline-profile-tab">
                    <p class="mb-4">
                        <form>
                        <div class="form-group mb-4">
                            <label class="text-black" for="lombaInput">Nama Lomba</label>
                            <input type="text" class="form-control border border-secondary" id="lombaInput">
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="penyelenggaraInput">Penyelenggara</label>
                            
                            <div class="input-group">
                                <!-- Input text -->
                                <input type="text" class="form-control border border-secondary text-black bg-white" id="penyelenggaraInput" aria-label="Text input with segmented dropdown button" readonly>
                                
                                <!-- Dropdown button -->
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.012 2.345 4 3.204 4h9.592c.86 0 1.319 1.012.753 1.658l-4.796 5.482a1 1 0 0 1-1.506 0z"/>
                                        </svg>
                                    </button>
                                    
                                    <!-- Dropdown items -->
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setPenyelenggara('Non-Lembaga')">Non-Lembaga</a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setPenyelenggara('Lembaga')">Lembaga</a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setPenyelenggara('Kementrian')">Kementrian</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="mulaiInput">Mulai</label>
                            <input type="text" class="form-control border border-secondary" id="mulaiInput" placeholder="">
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="berakhirInput">Berakhir</label>
                            <input type="text" class="form-control border border-secondary" id="berakhirInput" placeholder="">
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="linkInput">Link Informasi Resmi</label>
                            <input type="text" class="form-control border border-secondary" id="linkInput" placeholder="">
                        </div>
                        
                       <div class="d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-danger mr-2">Batal</button>
                            <input type="submit" name="time" class="btn btn-success" value="Kirim">
                        </div>

                    </form>
                    </p>
                </div>
                <div class="tab-pane fade" id="underline-contact" role="tabpanel" aria-labelledby="underline-contact-tab">
                    <p class="mb-4">
                         <div class="row layout-spacing">
                    <div class="col-lg-12">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    </div>                  
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
                                    <table id="column-filter" class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-secondary"> # </th>
                                                <th class="text-secondary">Prestasi</th>
                                                <th class="text-secondary">Tingkat</th>
                                                <th class="text-secondary">Tahun</th>
                                                <th class="text-secondary">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="checkbox-column"> 1 </td>
                                                <td>Juara 1 Cyber Security ABC</td>
                                                <td>Nasional</td>
                                                <td>2025</td>
                                                <td><span class="shadow-none badge badge-success">Disetujui</span></td>
                                                <td class="text-center"><button class="btn btn-primary">Detail</button></td>
                                            </tr>
                                            <tr>
                                                <td class="checkbox-column"> 2 </td>
                                                <td>Juara 1 Cyber Security ABC</td>
                                                <td>Nasional</td>
                                                <td>2025</td>
                                                <td><span class="shadow-none badge badge-warning">Proses</span></td>
                                                <td class="text-center"><button class="btn btn-primary">Detail</button></td>
                                            </tr>
                                            <tr>
                                                <td class="checkbox-column"> 3 </td>
                                                <td>Juara 1 Cyber Security ABC</td>
                                                <td>Nasional</td>
                                                <td>2025</td>
                                                <td><span class="shadow-none badge badge-danger">Ditolak</span></td>
                                                <td class="text-center"><button class="btn btn-primary">Detail</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </p>
                </div>
            </div>

        </div>
    </div>

</div>

{{-- Custom CSS untuk tab --}}
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

<script>
    var firstUpload = new FileUploadWithPreview('myFirstImage')
</script>
@endsection

@extends('layout.template')

@section('content')
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h3>Prestasi</h3>
        </div>
    </div>


    <div class="card component-card_4">
        <div class="card-body">

            <ul class="nav nav-tabs mb-3" id="lineTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="underline-home-tab" data-toggle="tab" href="#underline-home" role="tab" aria-controls="underline-home" aria-selected="true">Data Prestasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="underline-profile-tab" data-toggle="tab" href="#underline-profile" role="tab" aria-controls="underline-profile" aria-selected="false">Pencatatan Prestasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="underline-contact-tab" data-toggle="tab" href="#underline-contact" role="tab" aria-controls="underline-contact" aria-selected="false">Riwayat</a>
                </li>
            </ul>

            <div class="tab-content" id="lineTabContent-3">
                <div class="tab-pane fade show active" id="underline-home" role="tabpanel" aria-labelledby="underline-home-tab">
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
                                                <th class="text-secondary"> #. </th>
                                                <th class="text-secondary">Prestasi</th>
                                                <th class="text-secondary">Tingkat</th>
                                                <th class="text-secondary">Tahun</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="checkbox-column"> 1 </td>
                                                <td>Juara 1 Cyber Security ABC</td>
                                                <td>Nasional</td>
                                                <td>2025</td>
                                                <td class="text-center"><button class="btn btn-primary">Detail</button></td>
                                            </tr>
                                            <tr>
                                                <td class="checkbox-column"> 2 </td>
                                                <td>Juara 2 Data Analys</td>
                                                <td>Nasional</td>
                                                <td>2025</td>
                                                <td class="text-center"><button class="btn btn-primary">Detail</button></td>
                                            </tr>
                                            <tr>
                                                <td class="checkbox-column"> 3 </td>
                                                <td>Juara 1 Competitive Programing</td>
                                                <td>Nasional</td>
                                                <td>2025</td>
                                                <td class="text-center"><button class="btn btn-primary">Detail</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    </p>
                </div>
                <div class="tab-pane fade" id="underline-profile" role="tabpanel" aria-labelledby="underline-profile-tab">
                    <p class="mb-4">
                        <form>
                        <div class="form-group mb-4">
                            <label class="text-black" for="prestasiInput">Nama Prestasi</label>
                            <input type="text" class="form-control border border-secondary" id="prestasiInput" >
                        </div>
                        <div class="form-group mb-4">
                        <label class="text-black" for="kategoriInput">Kategori</label>
                        <div class="input-group">
                            <!-- Input -->
                            <input type="text"
                                class="form-control border-secondary bg-white text-dark"
                                id="kategoriInput"
                                aria-label="Text input with segmented dropdown button"
                                readonly>

                            <!-- Tombol dropdown -->
                            <div class="input-group-append">
                                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.012 2.345 4 3.204 4h9.592c.86 0 1.319 1.012.753 1.658l-4.796 5.482a1 1 0 0 1-1.506 0z" />
                                    </svg>
                                </button>

                                <!-- Dropdown isi -->
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="setKategori('Akademik')">Akademik</a>
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="setKategori('Non-Akademik')">Non-Akademik</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-black" for="tingkatInput">Tingkat</label>
                            <div class="input-group">
                                <!-- Input -->
                                <input type="text"
                                    class="form-control border-secondary bg-white text-dark"
                                    id="tingkatInput"
                                    aria-label="Text input with segmented dropdown button"
                                    readonly>

                                <!-- Tombol dropdown -->
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.012 2.345 4 3.204 4h9.592c.86 0 1.319 1.012.753 1.658l-4.796 5.482a1 1 0 0 1-1.506 0z" />
                                        </svg>
                                    </button>

                                    <!-- Dropdown item -->
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setTingkat('Internasional')">Internasional</a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setTingkat('Nasional')">Nasional</a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="setTingkat('Regional')">Regional</a>
                                    </div>
                                </div>
                            </div>
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
                            <label class="text-black" for="tahunInput">Tahun</label>
                            <input type="text" class="form-control border border-secondary" id="tahunInput" >
                        </div>
                                                <div class="custom-file-container" data-upload-id="myFirstImage">
                            <!-- Label deskripsi -->
                            <label class="text-black" for="buktiInput" class="form-label">
                                Bukti Prestasi (PNG/JPG) Max : 2MB
                            </label>

                            <!-- Input file -->
                            <div style="display: flex; align-items: center; gap: 10px; margin-top: 10px;">
                                <a href="javascript:void(0)" 
                                class="custom-file-container__image-clear" 
                                title="Clear Image">x</a>

                                <div class="custom-file-container__custom-file">
                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </div>
                            </div>

                            <!-- Preview -->
                            <div class="custom-file-container__image-preview" style="margin-top: 10px;"></div>
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

    function setPenyelenggara(value) {
        document.getElementById("penyelenggaraInput").value = value;
    }

    function setTingkat(value) {
        document.getElementById("tingkatInput").value = value;
    }

    function setKategori(value) {
        document.getElementById("kategoriInput").value = value;
    }
</script>
@endsection

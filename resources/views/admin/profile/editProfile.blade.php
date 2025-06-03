@extends('layout.template')

@section('content')

<!-- BEGIN CONTENT AREA -->
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Informasi Akun</h4>
        </div>
    </div>

    <div class="card component-card_4">
        <div class="card-body">
            <div class="tab-content" id="editProfileTab">
                <div class="tab-pane fade show active" id="edit-profile" role="tabpanel">

                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="text-center mb-4">
                            <img src="{{ asset('assets/img/image.png') }}" alt="Foto Profil" class="rounded-circle" width="120" height="120" id="preview-img">
                            <input type="file" id="upload-photo" name="foto" accept="image/*" class="d-none" onchange="previewImage(event)">
                            <div class="mt-2">
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="openFileExplorer()">Ubah Foto</button>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="nama_dosen">Nama Dosen</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="nama_dosen" name="nama_dosen" value="Draco Malfoy" required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="nidn">NIDN</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white" id="nidn" name="nidn" value="1907******" required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="jabatan">Jabatan</label>
                            <select class="form-control border border-secondary text-dark bg-white" id="jabatan" name="jabatan" required>
                                <option value="Admin Prodi TI" {{ old('jabatan', 'Admin Jurusan') == 'Admin Prodi TI' ? 'selected' : '' }}>Admin Prodi TI</option>
                                <option value="Admin Prodi SIB" {{ old('jabatan', 'Admin Jurusan') == 'Admin Prodi SIB' ? 'selected' : '' }}>Admin Prodi SIB</option>
                                <option value="Admin Jurusan" {{ old('jabatan', 'Admin Jurusan') == 'Admin Jurusan' ? 'selected' : '' }}>Admin Jurusan</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <a href="{{ url('admin/profile') }}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function openFileExplorer() {
        document.getElementById('upload-photo').click();
    }
    
    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();

        reader.onload = function() {
            document.getElementById('preview-img').src = reader.result;
        }

        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>



@extends('layout.template')

@section('content')
<style>
    .page-title {
        background-color: #3F00FF;
        width: 100%;
        padding: 50px;
    }

    .page-title h4 {
        color: white;
        font-weight: bold;
        font-size: 36px;
        margin: 0;
    }

    .edit-profile-card {
        max-width: 800px;
        margin: 0 auto;
        padding: 30px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        border-radius: 20px;
        background-color: white;
    }

    .profile-image-container {
        text-align: center;
        margin-right: 50px;
    }

    .profile-img-edit {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #ccc;
        margin-bottom: 15px;
    }

    .upload-photo-btn {
        background-color: #2b2929;
        border: 1px solid #8e4040;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        color: #ffffff;
    }
    .upload-photo-btn:hover {
        background-color: #b9adad;
    }

    .form-group label {
        font-weight: bold;
        color: #333;
        margin-bottom: 5px;
        display: block;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ddd;
        padding: 10px;
        width: 100%;
        margin-bottom: 20px;
    }

    .form-control:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .action-buttons {
        text-align: right;
        margin-top: 30px;
    }

    .btn-cancel {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        margin-right: 10px;
        cursor: pointer;
    }
    .btn-cancel:hover {
        background-color: #c82333;
    }

    .btn-save {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
    }
    .btn-save:hover {
        background-color: #218838;
    }
</style>

<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Informasi Akun</h4>
        </div>
    </div>

    <!-- CONTENT AREA -->
    <div class="container mt-4">
        <div class="edit-profile-card">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex align-items-start">
                    <div class="profile-image-container d-flex flex-column align-items-center">
                        <img src="{{ asset('assets/img/image.png') }}" alt="Foto Profil" class="profile-img-edit">
                        <div class="mt-2">
                            <button type="button" class="upload-photo-btn">Ubah Foto</button>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <div class="form-group">
                            <label for="nama_dosen">Nama Dosen</label>
                            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="Draco Malfoy" required>
                        </div>

                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="text" class="form-control" id="nidn" name="nidn" value="1907******" required>
                        </div>

                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select class="form-control" id="jabatan" name="jabatan" required>
                                <option value="Admin Prodi TI" {{ old('jabatan', 'Admin Jurusan') == 'Admin Prodi TI' ? 'selected' : '' }}>Admin Prodi TI</option>
                                <option value="Admin Prodi SIB" {{ old('jabatan', 'Admin Jurusan') == 'Admin Prodi SIB' ? 'selected' : '' }}>Admin Prodi SIB</option>
                                <option value="Admin Jurusan" {{ old('jabatan', 'Admin Jurusan') == 'Admin Jurusan' ? 'selected' : '' }}>Admin Jurusan</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="action-buttons">
                    <a href="{{ route('admin.profile.index') }}" class="btn btn-warning btn-sm">Batal</a>
                        <button type="submit" class="btn-save">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!-- CONTENT AREA -->
</div>
@endsection

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

    .card {
        max-width: 900px;
        margin: 0 auto;
        padding: 50px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        border-radius: 12px;
    }

    .profile-img {
        width: 300px;
        height: 300px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #ccc;
    }

    .profile-info {
        font-family: 'Poppins', sans-serif;
        font-size: 20px;
        color: #000;
    }

    .profile-info p {
        margin: 20;
        margin-bottom: 20px;
        color: #000;
        style="text-align: right;
    }

    .btn-edit {
        background-color: #ffc20d;
        border: none;
        padding: 10px 20px;
        font-weight: bold;
        color: black;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
    }

    .btn-edit:hover {
        background-color: #1e92ff;
        color: white;
    }
</style>

<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h4 class="mb-0">Informasi Akun</h4>
        </div>
    </div>

    <!-- CONTENT AREA -->
     <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-12 mx-auto" style="max-width: 800px;">
                <div class="card">
                    <div class="card-body d-flex flex-row align-items-center">
                        <div class="me-4">
                            <img src="{{ asset('assets/img/image.png') }}" alt="Foto Profil" class="profile-img">
                        </div>
                        <div class="profile-info flex-grow-1">
                            <p><strong>Nama</strong><br>Draco Malfoy</p>
                            <p><strong>NIDN</strong><br>1907******</p>
                            <p><strong>Jabatan</strong><br>Admin Jurusan TI</p>
                            <div class="d-flex justify-content-end mt-3">
                                <a href="{{ route('admin.profile.edit') }}" class="btn-edit">Edit Profile</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT AREA -->
</div>
@endsection

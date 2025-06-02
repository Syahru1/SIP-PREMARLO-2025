@extends('layout.template')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5>Edit Profil Dosen</h5>
        </div>
        <div class="card-body">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Data hanya untuk ditampilkan, tidak bisa diubah --}}
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" value="{{ $user->name ?? '-' }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">NIDN</label>
                    <input type="text" class="form-control" value="{{ $user->nidn ?? '-' }}" readonly>
                </div>

                {{-- Data yang bisa diedit --}}
                
                <div class="mb-3">
                    <label for="photo" class="form-label">Foto Profil</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                    @if ($user->photo)
                        <small class="text-muted">Foto saat ini: 
                            <a href="{{ asset('storage/' . $user->photo) }}" target="_blank">Lihat Foto</a>
                        </small>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary" disabled>Simpan (belum aktif)</button>
            </form>
        </div>
    </div>
</div>
@endsection

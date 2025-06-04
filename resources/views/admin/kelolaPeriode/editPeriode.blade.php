@empty($periode)
<!-- Modal Edit -->
{{-- <div class="modal fade" id="editPeriodeModal{{ $periode->id_periode }}" tabindex="-1" role="dialog" aria-labelledby="editPeriodeLabel{{ $periode->id_periode }}" aria-hidden="true"> --}}
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data yang anda cari tidak ditemukan
                </div>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
{{-- </div> --}}
@else
<!-- Modal Edit -->
{{-- <div class="modal fade" id="editPeriodeModal{{ $periode->id_periode }}" tabindex="-1" role="dialog" aria-labelledby="editPeriodeLabel{{ $periode->id_periode }}" aria-hidden="true"> --}}
    <div class="modal-dialog modal-md">
        <form action="{{ url('admin/kelola-periode/update/' . $periode->id_periode ) }}" method="POST" id="form-edit">
            @csrf
            @method('PUT')
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Periode</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <label for="namaPeriode{{ $periode->id_periode }}" class="form-label">Nama Periode</label>
                    <input type="text" class="form-control" id="namaPeriode{{ $periode->id_periode }}" name="nama_periode" value="{{ $periode->nama_periode }}" required>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>

            </div>
        </form>
    </div>
{{-- </div> --}}
@endempty

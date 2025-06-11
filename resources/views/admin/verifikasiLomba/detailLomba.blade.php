@extends('layout.template')

@section('content')
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Detail Lomba</h3>
            </div>
        </div>

        <div class="card component-card_4">
            <div class="card-body">
                <div class="tab-content" id="lineTabContent-3">
                    <div class="tab-pane fade show active" id="detail-lomba" role="tabpanel" aria-labelledby="detail-tab">
                        <div class="form-group mb-4">
                            <label class="text-black" for="namaLomba">Nama Lomba</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white"
                                id="namaLomba" value="{{ $detailLomba->nama_lomba }}" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="penyelenggara">Penyelenggara</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white"
                                id="penyelenggara" value="{{ $detailLomba->lokasi_lomba }}" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="mulai">Tanggal Mulai</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white"
                                id="mulai" value="{{ $detailLomba->tanggal_mulai_pendaftaran }}" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="berakhir">Tanggal Berakhir</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white"
                                id="berakhir" value="{{ $detailLomba->tanggal_akhir_pendaftaran }}" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black" for="link">Link Pendaftaran</label>
                            <input type="text" class="form-control border border-secondary text-dark bg-white"
                                id="link" value="{{ $detailLomba->link_pendaftaran }}" readonly>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black mr-2" width="100%">Bidang Lomba: </label>
                            @foreach ($detailBidang as $bidang)
                                <span class="badge badge-primary">{{ $bidang->bidang->nama_bidang }}</span>
                            @endforeach
                        </div>
                    </div>

                    {{-- <div class="form-group mb-4">
                        <label class="text-black mr-2">Pamflet Lomba: </label>
                        <img src="{{ $detailLomba->gambar_lomba }}" class="card-img-top" alt="widget-card-2">
                    </div> --}}

                    <form method="POST"
                        action="{{ url('admin/verifikasi-lomba/' . $detailLomba->id_lomba) . '/verifikasi' }}"
                        id="form-terima">
                        @csrf
                        <div class="form-group mb-4">
                            <label>Catatan (Opsional)</label>
                            <textarea name="catatan" class="form-control">{{ old('catatan', $detailLomba->catatan) }}</textarea>
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <button type="submit" name="status_verifikasi" value="Ditolak" class="btn btn-danger">Tolak</button>
                            <button type="submit" name="status_verifikasi" value="Diverifikasi"
                                class="btn btn-success">Terima</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Load SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session("success") }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session("error") }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif
@endsection

<div class="form-row">
    @foreach ($lombaList as $lomba)
        <div class="form-group col-mb-5" style="width: 25%;">
            <div class="mb-4 card component-card_2">
                <img src="{{ asset('uploads/lomba/' . $lomba->gambar_lomba) }}" class="card-img-top"
                    alt="{{ $lomba->nama_lomba }}" style="height: 200px; object-fit: cover;" data-toggle="modal"
                    data-target="#imageModal{{ $lomba->id_lomba }}">

                <!-- Modal for displaying image -->
                <div class="modal fade" id="imageModal{{ $lomba->id_lomba }}" tabindex="-1" role="dialog"
                    aria-labelledby="imageModalLabel{{ $lomba->id_lomba }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel{{ $lomba->id_lomba }}">
                                    {{ $lomba->nama_lomba }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="{{ asset('uploads/lomba/' . $lomba->gambar_lomba) }}" class="img-fluid"
                                    alt="{{ $lomba->nama_lomba }}"
                                    style="width: 100%; max-height: 950px; object-fit: contain;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $lomba->nama_lomba }}</h5>
                    <p class="card-text">{{ $lomba->deskripsi_lomba }}</p>
                    <div class="form-row">
                        <div class="col">
                            <a href="{{ url('dosen/lomba/detail-lomba/' . $lomba->id_lomba) }}"
                                class="btn btn-primary">Detail</a>
                            </div>
                            <div class="col">
                                <p class="card-text mt-2 ml-3">{{ $lomba->tanggal_mulai_pendaftaran . ' - ' . $lomba->tanggal_akhir_pendaftaran }}</p>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
</div>

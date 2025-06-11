<p class="mb-4">
    @foreach ($lombaList as $lomba)
        <div class="mb-4 card component-card_2">
            <img src="{{ asset('uploads/lomba/' . $lomba->gambar_lomba) }}" class="card-img-top" alt="{{ $lomba->nama_lomba }}" style="height: 200px; object-fit: cover;" data-toggle="modal" data-target="#imageModal{{ $lomba->id_lomba }}">

            <!-- Modal for displaying image -->
            <div class="modal fade" id="imageModal{{ $lomba->id_lomba }}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel{{ $lomba->id_lomba }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel{{ $lomba->id_lomba }}">{{ $lomba->nama_lomba }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="{{ asset('uploads/lomba/' . $lomba->gambar_lomba) }}" class="img-fluid" alt="{{ $lomba->nama_lomba }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $lomba->nama_lomba }}</h5>
                <p class="card-text">{{ $lomba->deskripsi_lomba }}</p>
                <a href="{{ url('mahasiswa/lomba/detail-lomba/' . $lomba->id_lomba) }}" class="btn btn-primary">Detail</a>
            </div>
        </div>
    @endforeach
</p>

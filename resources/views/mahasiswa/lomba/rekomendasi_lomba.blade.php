<p class="mb-4">
    @foreach ($lombaList as $lomba)
        <div class="mb-4 card component-card_2">
            <img src="{{ $lomba->gambar_lomba }}" class="card-img-top" alt="widget-card-2">
            <div class="card-body">
                <h5 class="card-title">{{ $lomba->nama_lomba }}</h5>
                <p class="card-text">{{ $lomba->deskripsi_lomba }}</p>
                <a href="{{ url('mahasiswa/lomba/detail-lomba/' . $lomba->id_lomba) }}" class="btn btn-primary">Detail</a>
            </div>
        </div>
    @endforeach
</p>

{{-- <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="card-title mb-0 text-black" style="font-weight: bold !important;">{{ $preferensi->mahasiswa->nama }}
    </h5>
</div> --}}
<div class="card-body">
    <table class="table table-bordered mt-4">
        <tbody>
            <tr>
                <th>Bidang</th>
                <td>
                    @foreach ($detailBidang as $bidang)
                        <span class="badge badge-primary">{{ $bidang->bidang->nama_bidang }}</span>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Penyelenggara</th>
                <td>{{ $preferensi->penyelenggara->nama_penyelenggara }}</td>
            </tr>
            <tr>
                <th>Hadiah</th>
                <td>{{ $preferensi->hadiah->nama_hadiah }}</td>
            </tr>
            <tr>
                <th>Tingkat Kompetisi</th>
                <td>{{ $preferensi->tingkatKompetisi->nama_tingkat_kompetisi }}</td>
            </tr>
        </tbody>
    </table>
</div>

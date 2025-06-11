<p class="mb-4">
<div class="row layout-spacing">
    <div class="col-lg-12">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                </div>
            </div>
        </div>
        <div class="table-responsive mb-4">
            <table id="column-filter" class="table">
                <thead>
                    <tr>
                        <th class="text-secondary"> NO </th>
                        <th class="text-secondary">Kode Lomba</th>
                        <th class="text-secondary">Nama Lomba</th>
                        <th class="text-secondary">Status Verifikasi</th>
                        <th class="text-secondary">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($riwayatLomba as $riwayat)
                        <td> {{ $loop->iteration }} </td>
                        <td>{{ $riwayat->kode_lomba }}</td>
                        <td>{{ $riwayat->nama_lomba }}</td>
                        <td>
                            @if ($riwayat->status_verifikasi == 'Diverifikasi')
                                <span class="badge badge-success">{{ $riwayat->status_verifikasi }}</span>
                            @elseif($riwayat->status_verifikasi == 'Ditolak')
                                <span class="badge badge-danger">{{ $riwayat->status_verifikasi }}</span>
                            @else
                                <span class="badge badge-secondary">{{ $riwayat->status_verifikasi }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('mahasiswa/lomba/detail-lomba/' . $riwayat->id_lomba) }}"
                                class="btn btn-primary">Detail</a>
                            @if ($riwayat->status_verifikasi == 'Ditolak')
                                <a href="{{ url('mahasiswa/lomba/riwayat/' . $riwayat->id_lomba) }}"
                                    class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                            @endif
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
</div>
</p>

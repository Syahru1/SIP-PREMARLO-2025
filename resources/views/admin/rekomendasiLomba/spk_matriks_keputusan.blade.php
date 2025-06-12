<table id="alter_pagination" class="table table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Alternatif</th>
            <th>Bidang</th>
            <th>Penyelenggara</th>
            <th>Biaya Pendaftaran</th>
            <th>Tingkat Kompetisi</th>
            <th>Hadiah</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lombaList as $alternatif)
            <tr>
                <td width="20%"><strong>{{ $alternatif->nama_lomba }}</strong></td>
                <td width="10%">{{ $alternatif->bidang }}</td>
                <td width="10%">{{ $alternatif->penyelenggara }}</td>
                <td width="10%">{{ $alternatif->biaya_pendaftaran }}</td>
                <td width="10%">{{ $alternatif->tingkat_kompetisi }}</td>
                <td width="10%">{{ $alternatif->hadiah }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

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
        @foreach ($spkBobot as $alternatif)
            <tr>
                <td width="20%"><strong>{{ $alternatif->nama_lomba }}</strong></td>
                <td width="10%">{{ number_format($alternatif->bidang, 5, ',', '') }}</td>
                <td width="10%">{{ number_format($alternatif->penyelenggara, 5, ',', '') }}</td>
                <td width="10%">{{ number_format($alternatif->biaya_pendaftaran, 5, ',', '') }}</td>
                <td width="10%">{{ number_format($alternatif->tingkat_kompetisi, 5, ',', '') }}</td>
                <td width="10%">{{ number_format($alternatif->hadiah, 5, ',', '') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

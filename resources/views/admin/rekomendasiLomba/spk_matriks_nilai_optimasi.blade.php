<table id="alter_pagination" class="table table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Rank</th>
            <th>Alternatif</th>
            <th>Nilai Optimasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($spkNilaiOptimasi as $alternatif)
            <tr>
                <td width="5%">{{ $loop->iteration }}</td>
                <td width="20%"><strong>{{ $alternatif->nama_lomba }}</strong></td>
                <td width="10%">{{ $alternatif->nilai_optimasi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

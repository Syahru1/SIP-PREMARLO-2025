<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 6px 20px 5px 20px;
            line-height: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 4px 3px;
            border: 1px solid;
            font-size: 11pt;
        }
        th {
            text-align: left;
        }
        .header-table td {
            border: none;
        }
        .text-center {
            text-align: center;
        }
        .image {
            height: 80px;
            max-width: 150px;
        }
        .title {
            font-size: 13pt;
            font-weight: bold;
        }
        .font-small {
            font-size: 10pt;
        }
        .no-border {
            border: none !important;
        }
        .header-separator {
            border-bottom: 2px solid black;
            margin-top: 5px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <table class="header-table">
        <tr>
            <td width="15%" class="text-center">
                <img src="{{ public_path('uploads/logo_polinema.jpg') }}" class="image">
            </td>
            <td width="85%" class="text-center">
                <div style="font-size:11pt; font-weight:bold;">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</div>
                <div style="font-size:13pt; font-weight:bold;">POLITEKNIK NEGERI MALANG</div>
                <div class="font-small">Jl. Soekarno-Hatta No. 9 Malang 65141</div>
                <div class="font-small">Telepon (0341) 404424 Pes. 101-105, 0341-404420, Fax. (0341) 404420</div>
                <div class="font-small">Laman: www.polinema.ac.id</div>
            </td>
        </tr>
    </table>

    <div class="header-separator"></div>

    <h3 class="text-center">LAPORAN PRESTASI MAHASISWA</h3>

    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Nama Mahasiswa</th>
                <th class="text-center">Program Studi</th>
                <th class="text-center">Nama Kompetisi</th>
                <th class="text-center">Jenis Prestasi</th>
                <th class="text-center">Tingkat</th>
                <th class="text-center">Tahun</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestasi as $p)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $p->mahasiswa->nama }}</td>
                    <td class="text-center">{{ $p->prodi->nama_prodi }}</td>
                    <td class="text-center">{{ $p->nama_kompetisi }}</td>
                    <td class="text-center">{{ $p->jenis_prestasi }}</td>
                    <td class="text-center">{{ $p->tingkat_kompetisi }}</td>
                    <td class="text-center">{{ $p->periode->nama_periode }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiModel extends Model
{
    use HasFactory;

    protected $table = 'prestasi';
    protected $primaryKey = 'id_prestasi';

    protected $fillable = [
        'id_mahasiswa', //foreign key
        'id_prodi', //foreign key
        'nama_kompetisi',
        'posisi',
        'tingkat_kompetisi',
        'juara_kompetisi',
        'jenis_prestasi',
        'lokasi_kompetisi',
        'tanggal_surat_tugas',
        'tanggal_kompetisi',
        'id_dosen', //foreign key
        'id_periode', //foreign key
        'jumlah_univ',
        'nomor_sertifikat',
        'foto_sertifikat',
        'link_perlombaan',
        'status',
        'skor',
        'catatan',
        'tanggal_pengajuan',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class, 'id_mahasiswa', 'id_mahasiswa');
    }

    public function prodi()
    {
        return $this->belongsTo(ProdiModel::class, 'id_prodi', 'id_prodi');
    }

    public function periode()
    {
        return $this->belongsTo(PeriodeModel::class, 'id_periode', 'id_periode');
    }

    public function dosen()
    {
        return $this->belongsTo(DosenModel::class, 'id_dosen', 'id_dosen');
    }

    public function hitungSkor()
    {
        $skor = 0;

        $tingkat = $this->tingkat_kompetisi;
        $juara = $this->juara_kompetisi;

        $bobot = [
            'Internasional' => ['Juara 1' => 100, 'Juara 2' => 80, 'Juara 3' => 60],
            'Nasional'      => ['Juara 1' => 70, 'Juara 2' => 50, 'Juara 3' => 30],
            'Regional'      => ['Juara 1' => 40, 'Juara 2' => 30, 'Juara 3' => 20],
        ];

        return $bobot[$tingkat][$juara] ?? 0;
    }
}

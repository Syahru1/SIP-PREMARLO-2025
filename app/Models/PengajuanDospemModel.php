<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanDospemModel extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_dospem';
    protected $primaryKey = 'id_pengajuan_dospem';
    protected $fillable = [
        'id_mahasiswa',
        'id_dosen',
        'id_tim',
        'nama_lomba',
        'deskripsi_lomba',
        'proposal',
        'catatan',
        'tanggal_pengajuan',
        'status'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class, 'id_mahasiswa', 'id_mahasiswa');
    }

    public function dosen()
    {
        return $this->belongsTo(DosenModel::class, 'id_dosen', 'id_dosen');
    }

    public function tim()
    {
        return $this->belongsTo(TimModel::class, 'id_tim', 'id_tim');
    }
}

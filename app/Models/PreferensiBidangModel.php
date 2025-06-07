<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferensiBidangModel extends Model
{
    use HasFactory;
    protected $table = 'preferensi_bidang'; 
    protected $primaryKey = 'id_preferensi_bidang';

    protected $fillable = [
        'id_mahasiswa',
        'id_preferensi_mahasiswa',
        'id_bidang',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class, 'id_mahasiswa', 'id_mahasiswa');
    }
    public function bidang()
    {
        return $this->belongsTo(BidangModel::class, 'id_bidang', 'id_bidang');
    }
    public function preferensiMahasiswa()
    {
        return $this->belongsTo(PreferensiMahasiswaModel::class, 'id_preferensi_mahasiswa', 'id_preferensi_mahasiswa');
    }
}

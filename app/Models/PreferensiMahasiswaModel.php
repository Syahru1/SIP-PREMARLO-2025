<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferensiMahasiswaModel extends Model
{
    use HasFactory;
    
    protected $table = 'preferensi_mahasiswa'; 
    protected $primaryKey = 'id_preferensi_mahasiswa';

    protected $fillable = [
        'id_mahasiswa',
        'id_penyelenggara',
        'id_biaya_pendaftaran',
        'id_tingkat_kompetisi',
        'id_hadiah',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class, 'id_mahasiswa', 'id_mahasiswa');
    }
    public function bidangLomba()
    {
        return $this->hasMany(BidangLombaModel::class, 'id_preferensi_mahasiswa', 'id_preferensi_mahasiswa');
    }
    public function tingkatKompetisi()
    {
        return $this->belongsTo(TingkatKompetisiModel::class, 'id_tingkat_kompetisi'); // sesuaikan nama model & foreign key
    }
    public function Penyelenggara()
    {
        return $this->belongsTo(PenyelenggaraModel::class, 'id_penyelenggara'); // sesuaikan nama model & foreign key
    }
    public function biayaPendaftaran()
    {
        return $this->belongsTo(BiayaPendaftaranModel::class, 'id_biaya_pendaftaran'); // sesuaikan nama model & foreign key
    }
    public function hadiah()
    {
        return $this->belongsTo(HadiahModel::class, 'id_hadiah'); // sesuaikan nama model & foreign key
    }
}

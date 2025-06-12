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
}

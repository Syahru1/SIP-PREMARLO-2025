<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TingkatKompetisiModel extends Model
{
    use HasFactory;

    protected $table = 'c_tingkat_kompetisi';
    protected $primaryKey = 'id_tingkat_kompetisi';
    
    public function criteria()
    {
        return $this->belongsTo(CriteriaModel::class, 'id_criteria'); // sesuaikan nama model & foreign key
    }

    public function lomba()
    {
        return $this->hasMany(LombaModel::class, 'id_tingkat_kompetisi'); // sesuaikan nama model & foreign key
    }

    public function preferensiMahasiswa()
    {
        return $this->hasMany(PreferensiMahasiswaModel::class, 'id_preferensi_mahasiswa'); // sesuaikan nama model & foreign key
    }
}

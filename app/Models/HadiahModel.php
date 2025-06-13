<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HadiahModel extends Model
{
    use HasFactory;

    protected $table = 'c_hadiah';
    protected $primaryKey = 'id_hadiah';
    
    public function criteria()
    {
        return $this->belongsTo(CriteriaModel::class, 'id_criteria'); // sesuaikan nama model & foreign key
    }

    public function lomba()
    {
        return $this->hasMany(LombaModel::class, 'id_lomba'); // sesuaikan nama model & foreign key
    }

    public function preferensiMahasiswa()
    {
        return $this->hasMany(PreferensiMahasiswaModel::class, 'id_preferensi_mahasiswa'); // sesuaikan nama model & foreign key
    }
}

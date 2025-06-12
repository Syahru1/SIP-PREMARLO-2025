<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaPendaftaranModel extends Model
{
    use HasFactory;

    protected $table = 'c_biaya_pendaftaran';
    protected $primaryKey = 'id_biaya_pendaftaran';

    public function criteria()
    {
        return $this->belongsTo(CriteriaModel::class, 'id_criteria'); // sesuaikan nama model & foreign key
    }

    public function lomba()
    {
        return $this->hasMany(LombaModel::class, 'id_lomba'); // sesuaikan nama model & foreign key
    }
}

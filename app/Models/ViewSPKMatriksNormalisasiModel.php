<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewSPKMatriksNormalisasiModel extends Model
{
    use HasFactory;

    protected $table = 'view_alternatif_matriks_normalisasi_spk';

    public function lomba()
    {
        return $this->belongsTo(LombaModel::class, 'id_lomba'); // sesuaikan nama model & foreign key
    }
}

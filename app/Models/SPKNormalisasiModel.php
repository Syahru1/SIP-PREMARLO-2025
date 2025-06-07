<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPKNormalisasiModel extends Model
{
    use HasFactory;

    protected $table = 'spk_normalisasi';
    protected $primaryKey = 'id_matriks';
    protected $fillable = [
        'id_matriks',
        'id_mahasiswa',
        'id_lomba',
        'bidang',
        'penyelenggara',
        'biaya_pendaftaran',
        'tingkat_kompetisi',
        'hadiah',
    ];
}

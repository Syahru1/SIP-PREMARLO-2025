<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPKBobotModel extends Model
{
    use HasFactory;

    protected $table = 'spk_bobot';
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

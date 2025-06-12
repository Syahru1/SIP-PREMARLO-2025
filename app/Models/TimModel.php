<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimModel extends Model
{
    use HasFactory;

    protected $table = 'tim'; // Specify the table name if it differs from the model name
    protected $fillable = [
        'id',
        'nama_tim',
        'id_mahasiswa'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class, 'id_mahasiswa', 'id_mahasiswa');
    }

    public function anggota_tim()
    {
        return $this->hasMany(AnggotaTimMahasiswa::class, 'id_tim', 'id_tim');
    }

}

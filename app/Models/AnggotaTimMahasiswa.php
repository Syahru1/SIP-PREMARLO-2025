<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaTimMahasiswa extends Model
{
    use HasFactory;
    protected $table = 'anggota_tim'; // Specify the table name if it differs from the model name
    protected $fillable = [
        'id_tim', // foreign key
        'id_mahasiswa', // foreign key
    ];
    protected $primaryKey = 'id_anggota_tim'; // Specify the primary key if it differs from the default 'id'

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class, 'id_mahasiswa', 'id_mahasiswa');
    }

    public function tim()
    {
        return $this->belongsTo(TimModel::class, 'id_tim', 'id_tim');
    }

}

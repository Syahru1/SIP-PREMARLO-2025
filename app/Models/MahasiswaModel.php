<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\ProdiModel;

class MahasiswaModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';

    protected $fillable = [
        'id_role',
        'id_periode',
        'id_prodi',
        'username',
        'password',
        'nama',
        'nim',
        'foto',
    ];

    protected $hidden = [
        'password',
    ];

    public function role()
    {
        return $this->belongsTo(RoleModel::class, 'id_role', 'id_role');
    }


    public function getRoleName(): string
    {
        return $this->role->nama_role;
    }

    /**
     * Mengecek apakah user punya role tertentu
     */
    public function hasRole($role): bool
    {
        return $this->role->kode_role == $role;
    }

    /**
     * Mendapatkan kode role (misal: 'ADM')
     */
    public function getRole()
    {
        return $this->role->kode_role;
    }

    public function prodi()
    {
        return $this->belongsTo(ProdiModel::class, 'id_prodi');
    }

    public function periode()
    {
        return $this->belongsTo(PeriodeModel::class, 'id_periode'); // sesuaikan nama model & foreign key
    }

    public function bidangLomba()
    {
        return $this->hasMany(BidangLombaModel::class, 'id_mahasiswa', 'id_mahasiswa');
    }

    public function prestasi()
    {
        return $this->hasMany(PrestasiModel::class, 'id_mahasiswa');
    }
}

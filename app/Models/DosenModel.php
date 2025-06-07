<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DosenModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'dosen'; 
    protected $primaryKey = 'id_dosen';

    protected $fillable = [
        'username',
        'nama_dosen',
        'email',
        'password',
        'id_role',
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
        return $this->role->nama_role ?? '-';
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
}

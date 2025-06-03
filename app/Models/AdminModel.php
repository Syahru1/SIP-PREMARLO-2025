<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin'; 
    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'username',
        'password',
        'nama_admin',
        'foto_admin',
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
        return 'admin';
    }
}

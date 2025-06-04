<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $primaryKey = 'id_role';
    protected $fillable = [
        'kode_role',
        'nama_role',
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
}

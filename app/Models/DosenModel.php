<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DosenModel extends Authenticatable
{
    use HasFactory;

    public function getRole()
    {
        return 'dosen';
    }
}

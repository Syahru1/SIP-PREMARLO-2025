<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyelenggaraModel extends Model
{
    use HasFactory;

    protected $table = 'c_penyelenggara';
    protected $primaryKey = 'id_penyelenggara';
    
    public function criteria()
    {
        return $this->belongsTo(CriteriaModel::class, 'id_criteria'); // sesuaikan nama model & foreign key
    }

    public function lomba()
    {
        return $this->hasMany(LombaModel::class, 'id_penyelenggara'); // sesuaikan nama model & foreign key
    }
}

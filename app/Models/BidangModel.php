<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangModel extends Model
{
    use HasFactory;

    protected $table = 'c_bidang';
    protected $primaryKey = 'id_bidang';
    
    public function criteria()
    {
        return $this->belongsTo(CriteriaModel::class, 'id_criteria'); // sesuaikan nama model & foreign key
    }
}

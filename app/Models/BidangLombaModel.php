<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangLombaModel extends Model
{
    use HasFactory;
    protected $table = 'bidang_lomba';
    protected $primaryKey = 'id_bidang_lomba';
    
    public function lomba(){
        return $this->belongsTo(LombaModel::class, 'id_lomba'); 
    }
    public function bidang(){
        return $this->belongsTo(bidangModel::class, 'id_bidang'); 
    }
}

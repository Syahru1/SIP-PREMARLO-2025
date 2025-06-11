<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LombaModel extends Model
{
    use HasFactory;

    protected $table = 'c_lomba';
    protected $primaryKey = 'id_lomba';
    protected $fillable = [
        'kode_lomba',
        'nama_lomba',
        'id_tingkat_kompetisi',
        'id_penyelenggara',
        'id_biaya_pendaftaran',
        'id_hadiah',
        'tanggal_mulai_pendaftaran',
        'tanggal_akhir_pendaftaran',
        'lokasi_lomba',
        'deskripsi',
        'link_pendaftaran',
        'status_lomba',
        'status_verifikasi',
        'gambar_lomba',
        'catatan',
    ];
    public function tingkatKompetisi()
    {
        return $this->belongsTo(TingkatKompetisiModel::class, 'id_tingkat_kompetisi'); // sesuaikan nama model & foreign key
    }
    public function Penyelenggara()
    {
        return $this->belongsTo(PenyelenggaraModel::class, 'id_penyelenggara'); // sesuaikan nama model & foreign key
    }

    public function biayaPendaftaran()
    {
        return $this->belongsTo(BiayaPendaftaranModel::class, 'id_biaya_pendaftaran'); // sesuaikan nama model & foreign key
    }

    public function hadiah()
    {
        return $this->belongsTo(HadiahModel::class, 'id_hadiah'); // sesuaikan nama model & foreign key
    }
    public function bidangLomba(){
        return $this->hasMany(BidangLombaModel::class, 'id_lomba');
    }    
    public function ViewSPKMatriksNilaiOptimasi(){
        return $this->hasMany(ViewSPKMatriksNilaiOptimasiModel::class, 'id_lomba');
    }    
}

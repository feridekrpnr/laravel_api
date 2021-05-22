<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oneri extends Model
{
    use HasFactory;
    protected $guarded=[];  //tabloların içini doldurmak için
    protected $table="oneriler";
    public $timestamps=false;

    public function onerilerim()
    {
        return $this->belongsToMany(Besin::class,'oneri_besin','oneri_id','besin_id');
    }

    public function ogunonerilerim()
    {
        return $this->belongsToMany(Ogun::class,'oneri_ogun','oneri_id','ogun_id');
    }

    public function kaloriönerilerim()
    {
        return $this->belongsToMany(KaloriHesaplama::class,'oneri_kalori_hesaplama','oneri_id','kalori_hesaplama_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaloriHesaplama extends Model
{
    use HasFactory;
    protected $guarded=[];  //tabloların içini doldurmak için
    protected $table="kalori_hesaplama";
    public $timestamps=false;

    public function onerilerim()
    {
        return $this->belongsToMany(Oneri::class,'oneri_kalori_hesaplama','kalori_hesaplama_id','oneri_id');
    }
}

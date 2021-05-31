<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuketilenBesinler extends Model
{
    use HasFactory;
    public $timestamps =  false;
    protected $table="tuketilen_besinler";
    protected $guarded=[];  //tabloların içini doldurmak için

    public function kaloritüketilen()
    {
        return $this->belongsToMany(KaloriHesaplama::class,'tuketilen_besinler_kalori_hesaplama','tuketilen_besin_id','kalori_hesaplama_id');
    }

    public function tuketilenler()
    {
        return $this->belongsToMany(Besin::class,'besinler_tuketilen_besinler','tuketilen_besin_id','besin_id');
    }
    public function ogundetuketilenler()
    {
        return $this->belongsToMany(Ogun::class,'ogunler_tuketilen_besinler','tuketilen_besin_id','ogun_id');
    }
    public function getdanısantuket()
    {
        return $this->hasOne(Danisan::class,'danisan_id','danisanlar');
    }
}

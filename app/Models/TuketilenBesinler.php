<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuketilenBesinler extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="tuketilen_besinler";
    protected $guarded=[];  //tabloların içini doldurmak için

    public function besinlerim()
    {
        return $this->belongsToMany(KaloriHesaplama::class,'tuketilen_besinler_kalori_hesaplama','tuketilen_besinler_id','kalori_hesaplama_id');
    }

    public function tuketilenler()
    {
        return $this->belongsToMany(Besin::class,'besinler_tuketilen_besinler','tuketilen_besinler_id','besin_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Besin extends Model
{
    use HasFactory; //veri üretmeyi sağlar
    protected $guarded=[];  //tabloların içini doldurmak için
    protected $table="besinler";
    public $timestamps=false;

    public function onerilerim()
    {
        return $this->belongsToMany(Oneri::class,'oneri_besin','besin_id','oneri_id');
    }

    public function besinlerim()
    {
        return $this->belongsToMany(TuketilenBesinler::class,'besinler_tuketilen_besinler','besin_id','tuketilen_besinler_id');
    }
}

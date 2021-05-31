<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Besin extends Model
{
    use HasFactory; //veri üretmeyi sağlar
    protected $guarded=[];  //tabloların içini doldurmak için
    protected $hidden=[]; //içerisine ne yazılırsa omu göstermez
    protected $table="besinler";
    public $timestamps =  false;

    public function onerilerim()
    {
        return $this->belongsToMany(Oneri::class,'oneri_besin','besin_id','oneri_id');
    }


}

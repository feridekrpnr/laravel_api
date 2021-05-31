<?php

namespace App\Models;
use App\Models\Kullanici;
use App\Models\Rol;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danisan extends Model
{
    use HasFactory;
    protected $guarded=[];  //tabloların içini doldurmak için
    protected $table="danisanlar";
    public $timestamps =  false;

    public function getKullanici()
    {
        return $this->hasOne(Kullanici::class,'kullanici_id','kullanicilar');
    }
    public function getRolDanisan()
    {
        return $this->hasMany(Rol::class,'roller');
    }
    public function gettuketdanısan()
    {
        return $this->belongsToMany(TuketilenBesinler::class,'tuketilen_besinler');
    }


}

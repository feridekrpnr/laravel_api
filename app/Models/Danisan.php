<?php

namespace App\Models;
use App\Models\Kullanici;
use App\Models\Rol;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Danisan extends Model
{
    use HasFactory, Notifiable;
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
    public function gettuketdanisan()
    {
        return $this->hasMany(TuketilenBesinler::class,'tuketilen_besinler');
    }
    public function eslesmediyetisyen()
    {
        return $this->belongsToMany(Diyetisyen::class,'eslesme_tablosu','danisan_id','diyetisyen_id');
    }

}

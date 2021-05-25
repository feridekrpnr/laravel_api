<?php

namespace App\Models;
use App\Models\Kullanici;
use App\Models\Randevu;
use App\Models\Rol;
use App\Models\Oneri;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diyetisyen extends Model
{
    use HasFactory;
    protected $guarded=[];  //tabloların içini doldurmak için
    protected $table="diyetisyenler";
    public $timestamps=false;

    public function getKullanici2()
    {
        return $this->hasOne(App\Model\Kullanici::class,'kullanici_id','kullanicilar');
    }
    public function getDiyetisyenRandevu()
    {
        return $this->hasMany(App\Model\Randevu::class,'randevular');
    }
    public function getRolDiyetisyen()
    {
        return $this->hasMany(App\Model\Rol::class,'roller');
    }
    public function getDiyetisyenOneri()
    {
        return $this->hasMany(App\Models\Oneri::class,'oneriler');
    }
}


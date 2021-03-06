<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kullanici extends Model
{

    use HasFactory;
    protected $guarded=[];  //tabloların içini doldurmak için
    protected $table="kullanicilar";
    public $timestamps =  false;

    public function getRol()
    {
        return $this->hasOne(Rol::class,'rol_id','roller');
    }
}

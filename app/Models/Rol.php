<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kullanici;
use App\Models\Diyetisyen;
class Rol extends Model
{
    //protected $fillable = ['name'];
    use HasFactory;
    public $timestamps =  false;
    protected $table="roller";
    protected $guarded=[];  //tabloların içini doldurmak için

    public function getRol2()
    {
        return $this->hasMany(Kullanici::class,'kullanicilar');
    }

    public function getRolDiyetisyen()
    {
        return $this->hasMany(Diyetisyen::class,'diyetisyen');
    }
}

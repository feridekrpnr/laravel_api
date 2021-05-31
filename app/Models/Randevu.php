<?php

namespace App\Models;

use App\Models\Diyetisyen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Randevu extends Model
{
    use HasFactory;
    protected $guarded=[];  //tabloların içini doldurmak için
    protected $table="randevular";
    public $timestamps =  false;

    public function getRandevuDiyetisyen()
    {
        return $this->hasOne(Diyetisyen::class,'diyetisyen_id','diyetisyenler');
    }

    public function cek($id){
        $a=Diyetisyen::where($id,$id)->get();
        return $a;
    }

}

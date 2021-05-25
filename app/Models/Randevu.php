<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Diyetisyen;

class Randevu extends Model
{
    use HasFactory;
    protected $guarded=[];  //tabloların içini doldurmak için
    protected $table="randevular";
    public $timestamps=false;

    public function getRandevuDiyetisyen()
    {
        return $this->hasOne(App\Model\Diyetisyen::class,'diyetisyen_id','diyetisyenler');
    }



}

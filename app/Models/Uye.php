<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uye extends Model
{
    protected $guarded=[];  //tabloların içini doldurmak için
    protected $table="kullanicilar";
    public $timestamps =  false;
}

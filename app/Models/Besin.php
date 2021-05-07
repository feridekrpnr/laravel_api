<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Besin extends Model
{
    use HasFactory; //veri üretmeyi sağlar
    protected $guarded=[];  //tabloların içini doldurmak için
    protected $table="besinler";
}

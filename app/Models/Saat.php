<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saat extends Model
{
    use HasFactory;
    protected $guarded=[];  //tabloların içini doldurmak için
    protected $table="saatler";
    public $timestamps =  false;
}
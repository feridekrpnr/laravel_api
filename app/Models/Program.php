<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $guarded=[];  //tabloların içini doldurmak için
    protected $table="program";
    public $timestamps = false;
}

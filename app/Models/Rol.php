<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //protected $fillable = ['name'];
    use HasFactory;
    public $timestamps = false;
    protected $table="roller";
    protected $guarded=[];  //tabloların içini doldurmak için

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diyetisyen extends Model
{
    public $timestamps = false;
    protected $table="diyetisyenler";
    use HasFactory;
}


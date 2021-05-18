<?php

namespace App\Models;
use App\Models\Oneri;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Ogun extends Model
{
    use HasFactory;
    protected $guarded=[];  //tabloların içini doldurmak için
    protected $table="ogunler";
    public $timestamps=false;
    
    public function onerilerim()
    {
        return $this->belongsToMany(Oneri::class,'oneri_ogun','ogun_id','oneri_id');
    }
    public function besinlerim()
    {
        return $this->belongsToMany(TuketilenBesinler::class,'ogunler_tuketilen_besinler','ogun_id','tuketilen_besinler_id');
    }
}

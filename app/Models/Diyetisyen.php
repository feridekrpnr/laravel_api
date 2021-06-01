<?php

namespace App\Models;
use App\Models\Kullanici;
use App\Models\Randevu;
use App\Models\Rol;
use App\Models\Oneri;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Diyetisyen extends Model
{
    use HasFactory, Notifiable;
    protected $guarded=[];  //tabloların içini doldurmak için
    protected $table="diyetisyenler";
    public $timestamps =  false;

    /*
     * bir daha aç
     * The attributes that are mass assignable.
     *
     * @var array

    protected $fillable = [
        'adi',
        'mail',
        'parola',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array

    protected $hidden = [
        'parola',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    */
    public function getKullanici2()
    {
        return $this->hasOne(Kullanici::class,'kullanici_id','kullanicilar');
    }
    public function getDiyetisyenRandevu()
    {
        return $this->hasMany(Randevu::class,'randevular');
    }
    public function getRolDiyetisyen()
    {
        return $this->hasMany(Rol::class,'roller');
    }
    public function getDiyetisyenOneri()
    {
        return $this->belongsto(Oneri::class,'oneriler');
    }
    public function eslesmedanisan()
    {
        return $this->belongsToMany(Danisan::class,'eslesme_tablosu','diyetisyen_id','danisan_id');
    }


}


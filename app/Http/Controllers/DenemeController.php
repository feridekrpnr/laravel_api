<?php

namespace App\Http\Controllers;
use App\Models\Diyetisyen;
use App\Models\Ogun;
use App\Models\Oneri;
use Illuminate\Http\Request;
use App\Models\Danisan;
use App\Models\Rol;
use App\Models\Randevu;
use App\Models\Kullanici;
use Database\Migrations\Kullanicilar;
use Database\Migrations\Randevular;

class DenemeController extends Controller
{
    protected $table="randevular";
   
    public function oneri()
    {
       //dd(Ogun::find(1)->onerilerim);
       return Oneri::find(1)->all();
    }
//Kullanıcı- danışan:
    public function getKullanici()
    {
        $kullanici=Danisan::find(1);
        print_r($kullanici);
        //return $kullanici->kullanıcı_id;
        //return Kullanici::find(1)->all();
    }


    //kullanıcı diyetisyen:
    public function getKullanici2()
    {
        $kullanici=Diyetisyen::all();
        print_r($kullanici);
       // echo $kullanici->aktif. '-Diyetisyen adı:' .$kullanici->getKullanici2->adi;
        //return $kullanici->kullanıcı_id;
        //return Kullanici::find(1)->all();
    }




    //Rol ve kullanıcı tablosu:
    public function getRol()
    {
        $kullanici=Kullanici::all();
        print_r($kullanici);
       // echo $kullanici->aktif. '-Diyetisyen adı:' .$kullanici->getKullanici2->adi;
        //return $kullanici->kullanıcı_id;
        //return Kullanici::find(1)->all();
    }
    public function getRol2()
    {
        $kullanici=Rol::all();
        print_r($kullanici);
        //echo $kullanici->kullanici_id. '-Kullanıcı id:' .$kullanici->getKullanici2->rol_adi;
        //return $kullanici->kullanıcı_id;
        //echo Kullanici::find(1)->all();
    }

    //diyetisyen-randevu diyetisyen id ye göre tüm randevuları getir
    public function getRandevuDiyetisyen()
    {
        //$kullanici=Diyetisyen::find(2);
        //print_r($kullanici);
        //echo $kullanici->kullanici_id. '-Kullanıcı id:' .$kullanici->getKullanici2->rol_adi;
        //return $kullanici->kullanıcı_id;
       // echo Randevu::all();
       foreach ($Diyetisyen as $getRandevular => $randevu) {
        echo $randevu->randevu_tarih. "<hr/>";
       }
           
       }
    }

    //id=1 olan randevu içeriği
    public function getDiyetisyenRandevu()
    {
        $kullanici=Randevu::find(1);
        print_r($kullanici);
        //echo $kullanici->kullanici_id. '-Kullanıcı id:' .$kullanici->getKullanici2->rol_adi;
        //return $kullanici->kullanıcı_id;
        //echo Kullanici::find(1)->all();
    }
    //Rolü diyetisyen olan kullanıcıları getir
    public function getRolDiyetisyen()
    {
        $kullanici=Rol::find(1);
        //$kullanici=Diyetisyen::all();
        //echo $kullanici->rol_id. '-Kullanıcı adı:' .$kullanici->getKullanici2->diyetisyen_adi;
        echo Diyetisyen::all(); //Rolü diyetisyen olanların tüm bilgileri
    }
    //Rolü danisan olan kullanıcıları getir
    public function getRolDanisan()
    {
        $kullanici=Rol::all();
        //print_r($kullanici);
        //echo $kullanici->kullanici_id. '-Kullanıcı id:' .$kullanici->getKullanici2->rol_adi;
        return $kullanici->kullanıcı_id;
       //echo Danisan::all(); //Tüm danısanlar ve tüm bilgileri
      //echo Danisan::find(4)->adi.  "<br />"; //danisan_id=4 olanın adi
    }
    //id si şu olan diyetisyenin öneri sayısı
    public function  getDiyetisyenOneri()
    {
       // $diyetisyen=Diyetisyen::find(1);
        $diyetisyen=Oneri::all();
        //print_r($kullanici);
        //echo $kullanici->kullanici_id. '-Kullanıcı id:' .$kullanici->getKullanici2->rol_adi;
        //return $kullanici->kullanıcı_id;
      //  echo Danisan::all();
      echo "Diyetisyen Sayısı: ".count($diyetisyen-> getOneriler);
    }
    public function  getOneriDiyetisyen()
    {
        $diyetisyen=Diyetisyen::find(1);
       // $diyetisyen=Diyetisyen::all();
        print_r($diyetisyen);
        //echo $kullanici->kullanici_id. '-Kullanıcı id:' .$kullanici->getKullanici2->rol_adi;
        //return $kullanici->kullanıcı_id;
        //echo "Diyetisyen Sayısı: ".count($diyetisyen-> getOneriler);
    }
}

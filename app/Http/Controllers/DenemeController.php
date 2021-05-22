<?php

namespace App\Http\Controllers;
use App\Models\Kullanici;
use App\Models\Ogun;
use App\Models\Oneri;
use Illuminate\Http\Request;

class DenemeController extends Controller
{
    public function oneri()
    {
       //dd(Ogun::find(1)->onerilerim);
       return Oneri::find(1)->all();
    }

    public function kullanici()
    {
        //$kullanici=Kullanici::find(1);
        //return $kullanici->kullanıcı_id;
        return Kullanici::find(1)->all();
    }
}

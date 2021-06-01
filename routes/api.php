<?php

use App\Models\Kullanici;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//C:\Users\ASUS\Downloads\laravel_api\routes\api.php


//FONKSİYON ROUTE


Route::get('/diyetisyenler/bul1', [\App\Http\Controllers\Api\DiyetisyenController::class, 'bul1']); //diyetisyenlerin altında ozel bir metot

Route::get('/diyetisyenler/bul2', [\App\Http\Controllers\Api\DiyetisyenController::class, 'bul2']); //diyetisyenlerin altında ozel bir metot

Route::get('/oneriler/report1', [\App\Http\Controllers\Api\OneriController::class, 'report1']); //diyetisyenlerin altında ozel bir metot

Route::get('/ogunler/cek2', [\App\Http\Controllers\Api\OgunController::class, 'cek2']); //diyetisyenlerin altında ozel bir metot

Route::get('/diyetisyenler/diyetisyen1', [\App\Http\Controllers\Api\DiyetisyenController::class, 'diyetisyen1']); //diyetisyenlerin altında ozel bir metot

Route::get('/oneriler/report2', [\App\Http\Controllers\Api\OneriController::class, 'report2']); //önerilerin altında ozel bir metot

Route::get('/oneriler/report3', [\App\Http\Controllers\Api\OneriController::class, 'report3']); //önerilerin altında ozel bir metot

Route::get('/danisanlar/getKullanici', [\App\Http\Controllers\DenemeController::class, 'getKullanici']); //önerilerin altında ozel bir metot

Route::get('/diyetisyenler/getKullanici2', [\App\Http\Controllers\DenemeController::class, 'getKullanici2']); //önerilerin altında ozel bir metot

Route::get('/oneriler/getdiyetisyenonerisi', [\App\Http\Controllers\Api\OneriController::class, 'getdiyetisyenonerisi']); //önerilerin altında ozel bir metot

Route::get('/tuketilen_besinler/getbestukbes', [\App\Http\Controllers\Api\TuketilenBesinlerController::class, 'getbestukbes']);

Route::get('/tuketilen_besinler/kaloritüketilen', [\App\Http\Controllers\Api\TuketilenBesinlerController::class, 'kaloritüketilen']);

Route::get('/tuketilen_besinler/oguntuketilen', [\App\Http\Controllers\Api\TuketilenBesinlerController::class, 'oguntuketilen']);

Route::get('/tuketilen_besinler/danistuketilen', [\App\Http\Controllers\Api\TuketilenBesinlerController::class, 'danistuketilen']);

Route::get('/danisanlar/eslemeDiyetisyen1', [\App\Http\Controllers\Api\DanisanController::class, 'eslemeDiyetisyen1']);

Route::get('/diyetisyenler/eslemeDanisanlarim', [\App\Http\Controllers\Api\DiyetisyenController::class, 'eslemeDanisanlarim']);

Route::get('/diyetisyenler/danisanlarim1', [\App\Http\Controllers\Api\DiyetisyenController::class, 'danisanlarim1']);


Route::get('roller',function(){
     return factory(Rol::class, 10)->make();
});
Route::get('kullanicilar',function(){
     return factory(Kullanici::class, 10)->make();
});


//

Route::apiResources([
     'besinler' => \App\Http\Controllers\Api\BesinController::class,
     'besinKategorileri' => \App\Http\Controllers\Api\BesinKategoriController::class,
     'danisanlar' => \App\Http\Controllers\Api\DanisanController::class,
     'diyetisyenler' => \App\Http\Controllers\Api\DiyetisyenController::class,
     'odemeler' => \App\Http\Controllers\Api\OdemeController::class,
     'ogunler' => \App\Http\Controllers\Api\OgunController::class,
     'oneriler' => \App\Http\Controllers\Api\OneriController::class,
     'randevular' => \App\Http\Controllers\Api\RandevuController::class,
     'ucretler' => \App\Http\Controllers\Api\UcretController::class,
     'roller' => \App\Http\Controllers\Api\RolController::class,
     'kullanicilar' => \App\Http\Controllers\Api\KullaniciController::class,
     'kaloriHesaplama' => \App\Http\Controllers\Api\KaloriHesaplamaController::class,
]);

     Route::get('/diyetisyenler', [\App\Http\Controllers\Api\DiyetisyenController::class, 'index']);
     Route::get('/danisanlar', [\App\Http\Controllers\Api\DanisanController::class, 'index']);
     Route::get('/besinkategorileri', [\App\Http\Controllers\Api\BesinKategoriController::class, 'index']);
     Route::get('/besinler', [\App\Http\Controllers\Api\BesinController::class, 'index']);
     Route::get('/kullanicilar', [\App\Http\Controllers\Api\KullaniciController::class, 'index']);
     Route::get('/odemeler', [\App\Http\Controllers\Api\OdemeController::class, 'index']);
     Route::get('/ogunler', [\App\Http\Controllers\Api\OgunController::class, 'index']);
     Route::get('/oneriler', [\App\Http\Controllers\Api\OneriController::class, 'index']);
     Route::get('/randevular', [\App\Http\Controllers\Api\RandevuController::class, 'index']);
     Route::get('/ucretler', [\App\Http\Controllers\Api\UcretController::class, 'index']);
     Route::get('/roller', [\App\Http\Controllers\Api\RolController::class, 'index']);
     Route::get('/kaloriHesaplama', [\App\Http\Controllers\Api\KaloriHesaplamaController::class, 'index']);

     Route::get('/diyetisyen/{id}', [\App\Http\Controllers\Api\DiyetisyenController::class, 'show']);
     Route::get('/danisan/{id}', [\App\Http\Controllers\Api\DanisanController::class, 'show']);
     Route::get('/besinkategori/{id}', [\App\Http\Controllers\Api\BesinKategoriController::class, 'show']);
     Route::get('/kullanici/{id}', [\App\Http\Controllers\Api\KullaniciController::class, 'show']);
     Route::get('/odeme/{id}', [\App\Http\Controllers\Api\OdemeController::class, 'show']);
     Route::get('/ogun/{id}', [\App\Http\Controllers\Api\OgunController::class, 'show']);
     Route::get('/oneri/{id}', [\App\Http\Controllers\Api\OneriController::class, 'show']);
     Route::get('/randevu/{id}', [\App\Http\Controllers\Api\RandevuController::class, 'show']);
     Route::get('/ucret/{id}', [\App\Http\Controllers\Api\UcretController::class, 'show']);
     Route::get('/besin/{id}', [\App\Http\Controllers\Api\BesinController::class, 'show']);
     Route::get('/rol/{id}', [\App\Http\Controllers\Api\RolController::class, 'show']);
     Route::get('/kaloriHesaplama/{id}', [\App\Http\Controllers\Api\KaloriHesaplamaController::class, 'show']);


      //POST METHODS//////////////////////////////////////////////////////////////////////////////////////////////////

    Route::post('/rol/{id}', [\App\Http\Controllers\Api\RolController::class, 'store']);
    Route::post('/diyetisyen', [\App\Http\Controllers\Api\DiyetisyenController::class, 'store']);
    Route::post('/kullanici/{id}', [\App\Http\Controllers\Api\KullaniciController::class, 'store']);
    Route::post('/besin/{id}', [\App\Http\Controllers\Api\BesinController::class, 'store']);
    Route::post('/danisan/{id}', [\App\Http\Controllers\Api\DanisanController::class, 'store']);
    Route::post('/odeme/{id}', [\App\Http\Controllers\Api\OdemeController::class, 'store']);
    Route::post('/ogun/{id}', [\App\Http\Controllers\Api\OgunController::class, 'store']);
    Route::post('/oneri/{id}', [\App\Http\Controllers\Api\OneriController::class, 'store']);
    Route::post('/randevu/{id}', [\App\Http\Controllers\Api\RandevuController::class, 'store']);
    Route::post('/ucret/{id}', [\App\Http\Controllers\Api\UcretController::class, 'store']);
    Route::post('/besinKategori/{id}', [\App\Http\Controllers\Api\BesinKategoriController::class, 'store']);
    Route::post('/kaloriHesaplama/{id}', [\App\Http\Controllers\Api\KaloriHesaplamaController::class, 'store']);

    //-------------------------------------------------------------------------------------------------------------//

  //PUT METHODS//////////////////////////////////////////////////////////////////////////////////////////////////

  Route::put('/rol/{rol}', [\App\Http\Controllers\Api\RolController::class, 'update']);
  Route::put('/diyetisyen/{diyetisyen}', [\App\Http\Controllers\Api\DiyetisyenController::class, 'update']);
  Route::put('/kullanici/{kullanici}', [\App\Http\Controllers\Api\KullaniciController::class, 'update']);
  Route::put('/besin/{besin}', [\App\Http\Controllers\Api\BesinController::class, 'update']);
  Route::put('/danisan/{danisan}', [\App\Http\Controllers\Api\DanisanController::class, 'update']);
  Route::put('/odeme/{odeme}', [\App\Http\Controllers\Api\OdemeController::class, 'update']);
  Route::put('/ogun/{ogun}', [\App\Http\Controllers\Api\OgunController::class, 'update']);
  Route::put('/oneri/{oneri}', [\App\Http\Controllers\Api\OneriController::class, 'update']);
  Route::put('/randevu/{randevu}', [\App\Http\Controllers\Api\RandevuController::class, 'update']);
  Route::put('/ucret/{ucret}', [\App\Http\Controllers\Api\UcretController::class, 'update']);
  Route::put('/besinKategori/{besinKategori}', [\App\Http\Controllers\Api\BesinKategoriController::class, 'update']);
  Route::put('/kaloriHesaplama/{kaloriHesaplama}', [\App\Http\Controllers\Api\KaloriHesaplamaController::class, 'update']);

 //DELETE METHODS//////////////////////////////////////////////////////////////////////////////////////////////////

 Route::delete('/rol/{rol}', [\App\Http\Controllers\Api\RolController::class, 'destroy']);
 Route::delete('/diyetisyen/{diyetisyen}', [\App\Http\Controllers\Api\DiyetisyenController::class, 'destroy']);
 Route::delete('/kullanici/{kullanici}', [\App\Http\Controllers\Api\KullaniciController::class, 'destroy']);
 Route::delete('/besin/{besin}', [\App\Http\Controllers\Api\BesinController::class, 'destroy']);
 Route::delete('/danisan/{danisan}', [\App\Http\Controllers\Api\DanisanController::class, 'destroy']);
 Route::delete('/odeme/{odeme}', [\App\Http\Controllers\Api\OdemeController::class, 'destroy']);
 Route::delete('/ogun/{ogun}', [\App\Http\Controllers\Api\OgunController::class, 'destroy']);
 Route::delete('/oneri/{oneri}', [\App\Http\Controllers\Api\OneriController::class, 'destroy']);
 Route::delete('/randevu/{randevu}', [\App\Http\Controllers\Api\RandevuController::class, 'destroy']);
 Route::delete('/ucret/{ucret}', [\App\Http\Controllers\Api\UcretController::class, 'destroy']);
 Route::delete('/besinKategori/{besinKategori}', [\App\Http\Controllers\Api\BesinKategoriController::class, 'destroy']);
 Route::delete('/kaloriHesaplama/{kaloriHesaplama}', [\App\Http\Controllers\Api\KaloriHesaplamaController::class, 'destroy']);






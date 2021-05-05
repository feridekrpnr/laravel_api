<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//C:\Users\ASUS\Downloads\laravel_api\routes\api.php


//FONKSİYON ROUTE


Route::get('/diyetisyenler/bul1', [\App\Http\Controllers\Api\DiyetisyenController::class, 'bul1']); //diyetisyenlerin altında ozel bir metot



//

Route::apiResources([
     'diyetisyenler' => 'Api\DiyetisyenController'
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

      //POST METHODS//////////////////////////////////////////////////////////////////////////////////////////////////

    Route::post('/roller', [\App\Http\Controllers\Api\RolController::class, 'store']);
    Route::post('/diyetisyenler', [\App\Http\Controllers\Api\DiyetisyenController::class, 'store']);

    //-------------------------------------------------------------------------------------------------------------//






  //PUT METHODS//////////////////////////////////////////////////////////////////////////////////////////////////

  Route::put('/rol/{rol}', [\App\Http\Controllers\Api\RolController::class, 'update']);


     
     
   
   

     /*


        BU ŞEYMA ERBAŞ'IN YORUM SATIRIDIR SAKIN SİLMEYİN

        BU YORUM SATIRINI GÖRÜYORSANIZ İŞLME BAŞARILI DEMEKTİR!


     */


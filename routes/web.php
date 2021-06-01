<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DiyetisyenController;
use App\Http\Controllers\Api\BesinController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return "Hello";
});


 Route::get('/secured', function () {
     return "authenticat :)";
 });
// Route::prefix('api')->group(function () {
//     Route::get('/diyetisyenler', [DiyetisyenController::class, 'index']);
//     Route::get('/diyetisyen/{id}', [DiyetisyenController::class, 'getDiyetisyen'])->name('get_diyetisyen');
//     Route::get('/danisanlar', [\App\Http\Controllers\Api\DanisanController::class, 'index']);
//     Route::get('/besinler', [\App\Http\Controllers\Api\BesinController::class, 'index']);
//     Route::get('/diyetisyen/{id}/{type?}',[DiyetisyenController::class,'show']);
//     Route::get('/diyetisyen/{id}', 'App\Http\Controllers\Api\DiyetisyenController@show');
// });
// Route::prefix('basics')->group(function () {
//     Route::get('/merhaba', function () {

//     });
//     Route::get('/merhaba-json', function () {
//         return ['message' => "MERHABA API"];
//     });
//     Route::get('/merhaba-json2', function () {
//         return response(['message' => "MERHABA API"], 200)
//             ->header('Contet-type', 'application/json');
//     });
//     Route::get('/merhaba-json3', function () {
//         return response()->json(['message' => "MERHABA API"]);

//     });


// });
Route::get('/oneri',[\App\Http\Controllers\DenemeController::class,'oneri']);
Route::get('/getKullanici',[\App\Http\Controllers\DenemeController::class,'getKullanici']);
Route::get('/kullanici',[\App\Http\Controllers\DenemeController::class,'kullanici']);
Route::get('/getKullanici2',[\App\Http\Controllers\DenemeController::class,'getKullanici2']);
Route::get('/getRol',[\App\Http\Controllers\DenemeController::class,'getRol']);
Route::get('/getRol2',[\App\Http\Controllers\DenemeController::class,'getRol2']);
Route::get('/getRandevuDiyetisyen',[\App\Http\Controllers\DenemeController::class,'getRandevuDiyetisyen']);
Route::get('/getDiyetisyenRandevu',[\App\Http\Controllers\DenemeController::class,'getDiyetisyenRandevu']);
Route::get('/getRolDiyetisyen',[\App\Http\Controllers\DenemeController::class,'getRolDiyetisyen']);
Route::get('/getRolDanisan',[\App\Http\Controllers\DenemeController::class,'getRolDanisan']);
Route::get('/ getDiyetisyenOneri',[\App\Http\Controllers\DenemeController::class,' getDiyetisyenOneri']);
Route::get('/ getOneriDiyetisyen',[\App\Http\Controllers\DenemeController::class,' getOneriDiyetisyen']);
Route::get('/ cek',[\App\Http\Controllers\Api\RandevuController::class,' cek']);
Route::get('/ getDanisanOneri',[\App\Http\Controllers\DenemeController::class,' getDanisanOneri']);
Route::get('/ eslesmedanisan',[\App\Http\Controllers\DenemeController::class,' eslesmedanisan']);
Route::get('/ eslesmediyetisyen',[\App\Http\Controllers\DenemeController::class,' eslesmediyetisyen']);

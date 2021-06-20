<?php

namespace App\Http\Controllers\Api\Danisan;

use App\Http\Controllers\Controller;
use App\Models\Danisan;
use App\Models\Diyetisyen;
use App\Models\Kullanici;
use App\Models\Saat;
use Illuminate\Http\Request;

class DanisanSaatController extends Controller
{
    public function list(Request $request)
    {
    
        $saatler = Saat::all();
        if($saatler->first()){
            $diyetisyen=Diyetisyen::find($saatler->diyetisyen_id);
                return response()->json($saatler, 200);
            }
        else {
            return response(['message'=> 'Saat bulunamadi'],404);
        }
    }
    public function getSaat(Request $request)
    {
        $diyetisyen=Diyetisyen::find($request->diyetisyen_id);
        $saat = Saat::where("id",$request->id)->where("diyetisyen_id",$diyetisyen->id)->first();
        if($saat){
                
                if($diyetisyen){
                    $saat->diyetisyen=$diyetisyen->adi;
                }
                
                return response()->json($saat, 200);
        }else{
            return response(['message'=> 'saat bulunamadi'],404);
        }
    }
   
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Diyetisyen;
use App\Models\Kullanici;
use App\Models\Saat;
use Illuminate\Http\Request;

class SaatController extends Controller
{
    public function list(Request $request)
    {
        $user = Kullanici::where("token", $request->token)->first();
        $diyetisyen = Diyetisyen::where("kullanici_id", $user->id)->first();
        $saatler = Saat::where("diyetisyen_id",$diyetisyen->id)->get();

        if($saatler->first()){
            foreach($saatler as $key => $saat){
                $diyetisyen=Diyetisyen::find($saat->diyetisyen_id);
                if($diyetisyen){
                    $saatler[$key]->diyetisyen=$diyetisyen->adi;
            }
                return response()->json($saatler, 200);
            }
        } else {
            return response(['message'=> 'Saat bulunamadi'],404);
        }
    }
    public function getSaat(Request $request)
    {
        $user = Kullanici::where("token", $request->token)->first();
        $diyetisyen = Diyetisyen::where("kullanici_id", $user->id)->first();
        $saat = Saat::find($request->id);
        if($saat){
                
                $diyetisyen=Diyetisyen::find($saat->diyetisyen_id);
              
                if($diyetisyen){
                    $saat->diyetisyen=$diyetisyen->adi;
                }
                
                return response()->json($saat, 200);
        }else{
            return response(['message'=> 'saat bulunamadi'],404);
        }
    }
    public function insert(Request $request)
    { 
        $user = Kullanici::where("token", $request->token)->first();
        $diyetisyen = Diyetisyen::where("kullanici_id", $user->id)->first();
        //veri tabanına kaydetme
       $saat = new Saat();
     
       $saat->name = $request->name;
       
      
      
       $saat->save();

            return response([
                'data' => $saat,
                'message'=> 'Saat oluşturuldu'
            ],201);
    }
}

<?php

namespace App\Http\Controllers\Api\Danisan;

use App\Http\Controllers\Controller;
use App\Models\Besin;
use App\Models\Danisan;
use App\Models\Diyetisyen;
use App\Models\Kullanici;
use App\Models\Ogun;
use App\Models\Program;
use Illuminate\Http\Request;
class DanisanProgramController extends Controller
{
    public function list(Request $request)
    {
        $user=Kullanici::where("token",$request->token)->first();
        $danisan = Danisan::where("kullanici_id",$user->id)->first();
        $programlar = Program::where("danisan_id",$danisan->id)->get();

        if($programlar->first()){
            foreach($programlar as $key => $program){
                $danisan=Danisan::find($program->danisan_id);
                $diyetisyen=Diyetisyen::find($program->diyetisyen_id);
                $ogun=Ogun::find($program->ogun_id);
                $besin=Besin::find($program->besin_id);
                if($danisan){
                    $programlar[$key]->danisan=$danisan->adi;
                }
                if($diyetisyen){
                    $programlar[$key]->diyetisyen=$diyetisyen->adi;
                }
                if($ogun){
                    $programlar[$key]->ogun=$ogun->ogun_adi;
                }
                if($besin){
                    $programlar[$key]->besin=$besin->besin_adi;
                }
                
        
            }
                return response()->json($programlar, 200);
        }else{
            return response(['message'=> 'Program bulunamadi'],404);
        }
    }
    
    public function getProgram(Request $request)
    {
        $user=Kullanici::where("token",$request->token)->first();
        $danisan = Danisan::where("kullanici_id",$user->id)->first();

        $program = Program::where("id",$request->id)->where("danisan_id",$danisan->id)->first();
        if($program){
                $danisan=Danisan::find($program->danisan_id);
                $diyetisyen=Diyetisyen::find($program->diyetisyen_id);
                $ogun=Ogun::find($program->ogun_id);
                $besin=Besin::find($program->besin_id);
                if($danisan){
                    $program->danisan=$danisan->adi;
                }
                if($diyetisyen){
                    $program->diyetisyen=$diyetisyen->adi;
                }
                if($ogun){
                    $program->ogun=$ogun->ogun_adi;
                }
                if($besin){
                    $program->besin=$besin->besin_adi;
                }
                return response()->json($program, 200);
        }else{
            return response(['message'=> 'Program bulunamadi'],404);
        }
    }
}

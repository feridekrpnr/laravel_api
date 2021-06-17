<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Besin;
use App\Models\Danisan;
use App\Models\Diyetisyen;
use App\Models\Ogun;
use App\Models\Program;
use Illuminate\Http\Request;

class DiyetisyenProgramController extends Controller
{
    public function list()
    {
        $programlar = Program::all();

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
        $program = Program::find($request->id);
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
    public function insert(Request $request)
    { 

        $besin=Besin::find($request->besin_id);

        //veri tabanına kaydetme
       $program = new Program();
       $program->mesaj = $request->mesaj	;
       $program->kalori = $besin->kalori;
       $program->diyetisyen_id = $request->diyetisyen_id;
       $program->danisan_id = $request->danisan_id;
       $program->besin_id = $request->besin_id;
       $program->ogun_id = $request->ogun_id;
       $program->save();

            return response([
                'data' => $program,
                'message'=> 'Program oluşturuldu'
            ],201);
    }




     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Odeme  $odeme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $besin=Besin::find($request->besin_id);
        $program = Program::find($request);
        $program->mesaj = $request->mesaj;
        $program->kalori = $besin->kalori;
        $program->diyetisyen_id = $request->diyetisyen_id;
        $program->danisan_id = $request->danisan_id;
        $program->besin_id = $request->besin_id;
        $program->ogun_id = $request->ogun_id;
        $program->save();

            return response([
                'data' => $program,
                'message'=> 'Program güncellendi'
            ],200);
    }

public function delete(Program $program,$id)
    {
        $program = Program::find($id);
        $program->delete();

        return response([
            'message'=> 'Program silindi'
             ],201);
    }
}
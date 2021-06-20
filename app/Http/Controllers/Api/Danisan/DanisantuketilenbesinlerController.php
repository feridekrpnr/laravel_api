<?php

namespace App\Http\Controllers\Api\Danisan;

use App\Http\Controllers\Controller;
use App\Http\Resources\BesinlerWithTüketilenBesinlerResource;
use App\Http\Resources\KaloriHesaplamaWithTüketilenBesinlerResource;
use App\Models\Besin;
use App\Models\Danisan;
use App\Models\KaloriHesaplama;
use App\Models\Kullanici;
use App\Models\Ogun;
use App\Models\TuketilenBesinler;
use Illuminate\Http\Request;

class DanisantuketilenbesinlerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(TuketilenBesinler::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token=$request->token;
        $user=Kullanici::where("token",$token)->first();
       
        $tuketilenBesin = new TuketilenBesinler();
        $tuketilenBesin->tarih = $request->tarih;
        $tuketilenBesin->kalori = $request->kalori;
        $tuketilenBesin->danisan_id = $user->id;
        $tuketilenBesin->ogun_id = $request->ogun_id;
        $tuketilenBesin->besin_id = $request->besin_id;
        $tuketilenBesin->save();

        return response([
            'data' => $tuketilenBesin,
            'message'=> '$tuketilenBesin oluşturuldu'
        ],201);
    }
    public function list(Request $request)
    {
        $user=Kullanici::where("token",$request->token)->first();
        $danisan = Danisan::where("kullanici_id",$user->id)->first();
        $tuketilenBesinler = TuketilenBesinler::where("danisan_id",$danisan->id)->get();

        if($tuketilenBesinler->first()){
            foreach($tuketilenBesinler as $key => $program){
                $danisan=Danisan::find($program->danisan_id);
                $ogun=Ogun::find($program->ogun_id);
                $besin=Besin::find($program->besin_id);
                if($danisan){
                    $tuketilenBesinler[$key]->danisan=$danisan->adi;
                }
                
                if($ogun){
                    $tuketilenBesinler[$key]->ogun=$ogun->ogun_adi;
                }
                if($besin){
                    $tuketilenBesinler[$key]->besin=$besin->besin_adi;
                }
                
        
            }
                return response()->json($tuketilenBesinler, 200);
        }else{
            return response(['message'=> 'Program bulunamadi'],404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TuketilenBesinler  $tuketilenBesinler
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tuketilenBesin = TuketilenBesinler::find($id);
        if($tuketilenBesin)
            return response()->json($tuketilenBesin, 200);
        else
            return response(['message'=> 'tuketilenBesin bulunamadi'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TuketilenBesinler  $tuketilenBesinler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TuketilenBesinler $tuketilenBesinler,$id)
    {
        $tuketilenBesin = TuketilenBesinler::find($id);
        $tuketilenBesin->ogun_adı = $request->ogun_adı;
        $tuketilenBesin->save();

        return response([
            'data' => $tuketilenBesin,
            'message'=> 'tuketilenBesin güncellendi'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TuketilenBesinler  $tuketilenBesinler
     * @return \Illuminate\Http\Response
     */
    public function destroy(TuketilenBesinler $tuketilenBesinler,$id)
    {
        $tuketilenBesin = Tuketilenbesinler::find($id);
        $tuketilenBesin->delete();

        return response([
            'message'=> '$tuketilenBesin silindi'
        ],201);
    }
    public function getbestukbes()
    {
        $tuketilen_besinler = TuketilenBesinler::paginate(2);
        return BesinlerWithTüketilenBesinlerResource::collection($tuketilen_besinler);
    }
    public function kaloritüketilen()
    {
        $tuketilen_besinler = TuketilenBesinler::paginate(2);
        return KaloriHesaplamaWithTüketilenBesinlerResource::collection($tuketilen_besinler);
    }
    public function oguntuketilen()
    {
        $tuketilen_ogun = TuketilenBesinler::paginate(2);
        return KaloriHesaplamaWithTüketilenBesinlerResource::collection($tuketilen_ogun);
    }
    public function danistuketilen()
    {
        $tuketilen_ogun = TuketilenBesinler::paginate(2);
        return KaloriHesaplamaWithTüketilenBesinlerResource::collection($tuketilen_ogun);
    }
}

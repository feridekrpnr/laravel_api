<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Danisan;
use App\Models\Diyetisyen;
use App\Models\Odeme;
use App\Models\Ucret;
use Illuminate\Http\Request;

class DanisanOdemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //   return response(Rol::paginate(10), 200);
        $odemeler=Odeme::all();
        foreach($odemeler as $key => $odeme){ 
            $odemeler[$key]->diyetisyen_adi=Diyetisyen::find($odeme->diyetisyen_id)->adi;
            $odemeler[$key]->danisan_adi=Danisan::find($odeme->danisan_id)->adi;
            $odemeler[$key]->ucret=Ucret::find($odeme->ucret_id)->ucret;
            $odemeler[$key]->seans=Ucret::find($odeme->ucret_id)->seans;
        }
        return response()->json($odemeler);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all(); //gelen tüm dataya erişim sağlar
        //veri tabanına kaydetme
       $odeme = new Odeme;
       $odeme->odeme_tarih	 = $request->odeme_tarih	;
       $odeme->oneri_aciklama = $request->oneri_aciklama;
       $odeme->diyetisyen_id = $request->diyetisyen_id;
       $odeme->danisan_id = $request->danisan_id;
       $odeme->ucret_id = $request->ucret_id;
       $odeme->save();

            return response([
                'data' => $odeme,
                'message'=> 'odeme oluşturuldu'
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Odeme  $odeme
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $odeme = Odeme::find($id);
        if($odeme)
            return response()->json($odeme, 200);
        else
            return response(['message'=> 'Ödeme bulunamadi'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Odeme  $odeme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Odeme $odeme,$id)
    {
        $odeme = Odeme::find($id);
        $odeme->odeme_tarih	 = $request->odeme_tarih	;
        $odeme->oneri_aciklama = $request->oneri_aciklama;
        $odeme->diyetisyen_id = $request->diyetisyen_id;
        $odeme->danisan_id = $request->danisan_id;
        $odeme->ucret_id = $request->ucret_id;
        $odeme->save();

            return response([
                'data' => $odeme,
                'message'=> 'odeme güncellendi'
            ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Odeme  $odeme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Odeme $odeme,$id)
    {
        $odeme = Odeme::find($id);
        $odeme->delete();

        return response([
            'message'=> 'Odeme silindi'
             ],201);
    }
}

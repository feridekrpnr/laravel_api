<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KaloriHesaplama;
use Illuminate\Http\Request;

class DanisanKaloriHesaplamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(KaloriHesaplama::all());
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
       $kaloriHesaplama = new KaloriHesaplama;
       $kaloriHesaplama->tuketilen_kalori = $request->tuketilen_kalori;
       $kaloriHesaplama->oneri_id = $request->oneri_id ;
       $kaloriHesaplama->tuketilen_besin_id = $request->tuketilen_besin_id;
       $kaloriHesaplama->save();

            return response([
                'data' => $kaloriHesaplama,
                'message'=> 'kaloriHesaplama oluşturuldu'
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KaloriHesaplama  $kaloriHesaplama
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kaloriHesaplama = KaloriHesaplama::find($id);
        if($kaloriHesaplama)
            return response()->json($kaloriHesaplama, 200);
        else
            return response(['message'=> 'KaloriHesaplama bulunamadi'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KaloriHesaplama  $kaloriHesaplama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KaloriHesaplama $kaloriHesaplama,$id)
    {
        $kaloriHesaplama = KaloriHesaplama::find($id);
        $kaloriHesaplama->tuketilen_kalori = $request->tuketilen_kalori;
        $kaloriHesaplama->oneri_id = $request->oneri_id ;
        $kaloriHesaplama->tuketilen_besin_id = $request->tuketilen_besin_id;
        $kaloriHesaplama->save();

             return response([
                 'data' => $kaloriHesaplama,
                 'message'=> 'kaloriHesaplama güncellendi'
             ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KaloriHesaplama  $kaloriHesaplama
     * @return \Illuminate\Http\Response
     */
    public function destroy(KaloriHesaplama $kaloriHesaplama,$id)
    {
        $kaloriHesaplama = KaloriHesaplama::find($id);
        $kaloriHesaplama->delete();

        return response([
            'message'=> 'KaloriHesaplama silindi'
             ],201);
    }
}

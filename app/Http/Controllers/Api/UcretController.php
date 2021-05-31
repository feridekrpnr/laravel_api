<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ucret;
use Illuminate\Http\Request;

class UcretController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //   return response(Rol::paginate(10), 200);
        return response()->json(Ucret::all());
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
       $ucret = new Ucret;
       $ucret->baslangıc_tarihi = $request->baslangıc_tarihi;
       $ucret->bitis_tarihi = $request->bitis_tarihi;
       $ucret->ucret = $request->ucret;
       $ucret->periyot = $request->periyot;
       $ucret->diyetisyen_id = $request->diyetisyen_id;
       $ucret->save();

            return response([
                'data' => $ucret,
                'message'=> 'ucret oluşturuldu'
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ucret  $ucret
     * @return \Illuminate\Http\JsonResponse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ucret = Ucret::find($id);
        if($ucret)
            return response()->json($ucret, 200);
        else
            return response(['message'=> 'Ücret bulunamadi'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ucret  $ucret
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ucret $ucret,$id)
    {
        $ucret = Ucret::find($id);
        $ucret->baslangıc_tarihi = $request->baslangıc_tarihi;
        $ucret->bitis_tarihi = $request->bitis_tarihi;
        $ucret->ucret = $request->ucret;
        $ucret->periyot = $request->periyot;
        $ucret->diyetisyen_id = $request->diyetisyen_id;
        $ucret->save();

             return response([
                 'data' => $ucret,
                 'message'=> 'ucret güncellendi'
             ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ucret  $ucret
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ucret $ucret,$id)
    {
        $ucret = Ucret::find($id);
        $ucret->delete();

        return response([
            'message'=> 'Ucret silindi'
             ],201);

    }
}

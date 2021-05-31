<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OneriWithDiyetisyenResource;
use App\Models\Oneri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\OneriResource;

class OneriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //   return response(Rol::paginate(10), 200);
        return response()->json(Oneri::all());
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
       $oneri = new Oneri;
       $oneri->ogun_adı = $request->ogun_adı;
       $oneri->save();

       return response([
        'data' => $oneri,
        'message'=> 'oneri oluşturuldu'
    ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oneri  $oneri
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oneri = Oneri::find($id);
        if($oneri)
            return response()->json($oneri, 200);
        else
            return response(['message'=> 'Öneri bulunamadi'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oneri  $oneri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oneri $oneri,$id)
    {
        $oneri = Oneri::find($id);
        $oneri->ogun_adı = $request->ogun_adı;
        $oneri->save();

       return response([
        'data' => $oneri,
        'message'=> 'oneri güncellendi'
    ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oneri  $oneri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oneri $oneri,$id)
    {
        $oneri = Oneri::find($id);
        $oneri->delete();

        return response([
            'message'=> 'Oneri silindi'
             ],201);

    }
    public function report1()
    {
        return DB::table('oneri_ogun as onog')
            ->selectRaw('on.oneri_aciklama, og.ogun_adı, COUNT(*) as total')
            ->join('oneriler as on', 'on.id', '=', 'onog.oneri_id')
            ->join('ogunler as og', 'og.id', '=', 'onog.ogun_id')
            ->groupBy('on.oneri_aciklama','og.ogun_adı')
            ->orderByRaw('COUNT(*) DESC')
            ->get();
    }



    //Dokuman:Sayfa 40
    public function report2()
    {
        $oneriler = Oneri::paginate(2);
        return OneriResource::collection($oneriler);
    }

    public function getdiyetisyenonerisi()
    {
        $oneriler = Oneri::paginate(2);
        return OneriWithDiyetisyenResource::collection($oneriler);
    }

}

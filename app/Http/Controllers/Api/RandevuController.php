<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Diyetisyen;
use App\Models\Danisan;
use App\Models\Kullanici;
use App\Models\Randevu;
use Illuminate\Http\Request;

class RandevuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //   return response(Rol::paginate(10), 200);
        $user=Kullanici::where("token",$request->token)->first();
        $diyetisyen = Diyetisyen::where("kullanici_id",$user->id)->first();
        $randevular=Randevu::where("diyetisyen_id",$diyetisyen->id)->get();
        foreach($randevular as $key => $randevu){
            $randevular[$key]->diyetisyen_adi=Diyetisyen::find($randevu->diyetisyen_id)->adi;
            $randevular[$key]->danisan_adi=Danisan::find($randevu->danisan_id)->adi;
        }
        return response()->json($randevular);
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
       $randevu = new Randevu;
       $randevu->tarih = $request->tarih;
       $randevu->goruldu = $request->goruldu;
       $randevu->danisan_id = $request->danisan_id;
       $randevu->diyetisyen_id = $request->diyetisyen_id;
       $randevu->saat_id = $request->saat_id;
       $randevu->save();

       return response([
        'data' => $randevu,
        'message'=> 'oneri oluşturuldu'
    ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Randevu  $randevu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $randevu = Randevu::find($id);
        if($randevu)
            return response()->json($randevu, 200);
        else
            return response(['message'=> 'Randevu bulunamadi'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Randevu  $randevu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Randevu $randevu,$id)
    {
        $randevu = Randevu::find($id);
        $randevu->tarih = $request->tarih;
        $randevu->goruldu = $request->goruldu;
        $randevu->danisan_id = $request->danisan_id;
        $randevu->diyetisyen_id = $request->diyetisyen_id;
        $randevu->saat_id = $request->saat_id;
        $randevu->save();

        return response([
         'data' => $randevu,
         'message'=> 'randevu güncellendi'
     ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Randevu  $randevu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Randevu $randevu,$id)
    {
        $randevu = Randevu::find($id);
        $randevu->delete();

        return response([
         'message'=> 'randevu silindi'
     ],201);
    }
    public function cek($id){
        $a=Diyetisyen::where($id,$id)->get();
        return $a;
    }
}

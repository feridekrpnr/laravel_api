<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kullanici;
use App\Models\Ogun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OgunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //   return response(Rol::paginate(10), 200);
        return response()->json(Ogun::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Kullanici::where("token",$request->token)->first();
        $danisan = Ogun::where("kullanici_id",$user->id)->first();
        $input = $request->all(); //gelen tüm dataya erişim sağlar
        //veri tabanına kaydetme
       $ogun = new Ogun;
       $ogun->ogun_adı = $request->ogun_adı;
       $ogun->save();

            return response([
                'data' => $ogun,
                'message'=> 'ogun oluşturuldu'
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ogun  $ogun
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ogun = Ogun::find($id);
        if($ogun)
            return response()->json($ogun, 200);
        else
            return response(['message'=> 'Oğün bulunamadi'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ogun  $ogun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ogun $ogun,$id)
    {
        $ogun = Ogun::find($id);
        $ogun->ogun_adı = $request->ogun_adı;
        $ogun->save();

             return response([
                 'data' => $ogun,
                 'message'=> 'ogun güncellendi'
             ],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ogun  $ogun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ogun $ogun,$id)
    {
        $ogun = Ogun::find($id);
        $ogun->delete();

        return response([
            'message'=> 'ogun silindi'
             ],201);
    }
    public function cek2()
    {
        return DB::table('oneri_ogun as onog')
            ->selectRaw('og.ogun_adı, COUNT(*) as total')
            ->join('ogunler as og', 'og.id', '=', 'onog.ogun_id')
            ->join('oneriler as on', 'on.id', '=', 'onog.oneri_id')
            ->groupBy('og.ogun_adı')
            ->orderByRaw('COUNT(*) DESC')
            ->get();
    }

}

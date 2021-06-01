<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kullanici;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class KullaniciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return response(Rol::paginate(10), 200);
        return response()->json(Kullanici::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $validator = Validator::make($request->all(), [
            'mail' => 'required|email|unique:danisanlar',
            'adi' =>  'required|string|max:50',
            'soyad' =>  'required|string|max:50',
            'parola' =>'required'
        ]);
        $input = $request->all(); //gelen tüm dataya erişim sağlar
        //veri tabanına kaydetme
       $kullanici = new Kullanici;
       $kullanici->kayit_tarihi = $request->kayit_tarihi;
       $kullanici->aktif = $request->aktif;
       $kullanici->rol_id = $request->rol_id;
       $kullanici->save();

            return response([
                'data' => $kullanici,
                'message'=> 'kullanıcı oluşturuldu'
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kullanici  $kullanici
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kullanici = Kullanici::find($id);
        if($kullanici)
            return response()->json($kullanici, 200);
        else
            return response(['message'=> 'Kullanıcı bulunamadi'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kullanici  $kullanici
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kullanici $kullanici,$id)
    {
        $kullanici = Kullanici::find($id);
        $kullanici->kayit_tarihi = $request->kayit_tarihi;
        $kullanici->aktif = $request->aktif;
        $kullanici->rol_id = $request->rol_id;
        $kullanici->save();

             return response([
                 'data' => $kullanici,
                 'message'=> 'kullanıcı güncellendi'
             ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kullanici  $kullanici
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kullanici $kullanici,$id)
    {
        $kullanici = Kullanici::find($id);
        $kullanici->delete();

        return response([
            'message'=> 'Kullanici silindi'
             ],201);
    }
   /* public function danisdiyet()
    {
        $kullanici = Kullanici::paginate(2);
        return BesinlerWithTüketilenBesinlerResource::collection($kullanici);
    }
    */
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BesinKategori;
use Illuminate\Http\Request;

class BesinKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //   return response(Rol::paginate(10), 200);
        return response()->json(BesinKategori::all());
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
       $besinKategori = new BesinKategori;
       $besinKategori->kategori_adi = $request->kategori_adi;
       $besinKategori->save();

            return response([
                'data' => $besinKategori,
                'message'=> 'besin Kategori oluşturuldu'
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BesinKategori  $besinKategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $besinKategori = BesinKategori::find($id);
        if($besinKategori)
            return response()->json($besinKategori, 200);
        else
            return response(['message'=> 'Besin Kategorisi bulunamadi'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BesinKategori  $besinKategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BesinKategori $besinKategori)
    {
        $dyt = BesinKategori::find($id);
        $besinKategori->kategori_adi = $request->kategori_adi;
        $besinKategori->save();
 
             return response([
                 'data' => $besinKategori,
                 'message'=> 'besin Kategori güncellendi'
             ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BesinKategori  $besinKategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(BesinKategori $besinKategori,$id)
    {
        $besinKategori = BesinKategori::find($id);
        $besinKategori->delete();

        return response([
            'message'=> 'BesinKategori silindi'
             ],201);
    }
}

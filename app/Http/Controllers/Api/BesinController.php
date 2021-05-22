<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Besin;
use Illuminate\Http\Request;

class BesinController extends Controller
{
    /**
     * Display a listing of the resource.
     * BEN BAŞARDIMM!!!!!!!!!!!!!!!!!!!!!!*****************
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //   return response(Rol::paginate(10), 200);
        return response()->json(Besin::all());

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
        $besin = new Besin;
        $besin->besin_adi = $request->besin_adi;
        $besin->besin_kalori = $request->besin_kalori;
        $besin->besin_birimi = $request->besin_birimi;
        $besin->besin_kategori_id = $request->besin_kategori_id;
        $besin->save();

        return response([
            'data' => $besin,
            'message'=> 'besin oluşturuldu'
        ],201);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Besin  $besin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $besin = Besin::find($id);
        if($besin)
            return response()->json($besin, 200);
        else
            return response(['message'=> 'Besin bulunamadi'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Besin  $besin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Besin $besin,$id)
    {
        //$input = $request->all();
        //$besin->update($input);
        $besin = Besin::find($id);
        $besin->besin_adi = $request->besin_adi;
        $besin->besin_kalori = $request->besin_kalori;
        $besin->besin_birimi = $request->besin_birimi;
        $besin->besin_kategori_id = $request->besin_kategori_id;
        $besin->save();

        return response([
            'data' => $besin,
            'message'=> 'besin güncellendi'
        ],200);
    }


/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Besin  $besin
 * @return \Illuminate\Http\Response
 */
public function destroy(Besin $besin,$id)
{
    $besin = Besin::find($id);
    $besin->delete();

    return response([
        'message'=> 'besin silindi'
    ],201);

}
}

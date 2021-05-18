<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Diyetisyen;
use Illuminate\Http\Request;

class DiyetisyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Diyetisyen[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Diyetisyen::all());
        // $data = Diyetisyen::all();
        // dd($value);
        // return Diyetisyen::all();
        //  return view('deneme',['data'=>$data]);
        // return response()->json($data);
        //   return response(Rol::paginate(10), 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all(); //gelen tüm dataya erişim sağlar
        //veri tabanına kaydetme
        $diyetisyen = new Diyetisyen;
        $diyetisyen->adi = $request->adi;
        $diyetisyen->soyad = $request->soyad;
        $diyetisyen->mail = $request->mail;
        $diyetisyen->parola = $request->parola;
        $diyetisyen->tc = $request->tc;
        $diyetisyen->telefon = $request->telefon;
        $diyetisyen->cinsiyet = $request->cinsiyet;
        $diyetisyen->yas = $request->yas;
        $diyetisyen->hakkimda = $request->hakkimda;
        $diyetisyen->puan = $request->puan;
        $diyetisyen->kullanici_id = $request->kullanici_id;
        $diyetisyen->save();

            return response([
                'data' => $diyetisyen,
                'message'=> 'diyetisyen oluşturuldu'
            ],201);
    }

    /**
     * Display the specified resource.
     *bi sal klavyeyş
     * @param \App\Models\Diyetisyen $diyetisyen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diyetisyen = Diyetisyen::find($id);
        if($diyetisyen)
            return response()->json($diyetisyen, 200);
        else
            return response(['message'=> 'Diyetisyen bulunamadi'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Diyetisyen $diyetisyen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diyetisyen $diyetisyen)
    {
        $diyetisyen = Diyetisyen::find($id);
        $diyetisyen->adi = $request->adi;
        $diyetisyen->soyad = $request->soyad;
        $diyetisyen->mail = $request->mail;
        $diyetisyen->parola = $request->parola;
        $diyetisyen->tc = $request->tc;
        $diyetisyen->telefon = $request->telefon;
        $diyetisyen->cinsiyet = $request->cinsiyet;
        $diyetisyen->yas = $request->yas;
        $diyetisyen->hakkimda = $request->hakkimda;
        $diyetisyen->puan = $request->puan;
        $diyetisyen->kullanici_id = $request->kullanici_id;
        $diyetisyen->save();

            return response([
                'data' => $diyetisyen,
                'message'=> 'diyetisyen güncellendi'
            ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Diyetisyen $diyetisyen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diyetisyen $diyetisyen,$id)
    {
        $diyetisyen = Diyetisyen::find($id);
        $diyetisyen->delete();

        return response([
            'message'=> 'Diyetisyen silindi'
             ],201);
        
    }
    public function  bul1() {
        return Diyetisyen::pluck('id'); //pluck metodu yalnızca bir kolonu almayı sağlar
    }

}

<?php

namespace App\Http\Controllers\Api\Danisan;


use App\Http\Controllers\Controller;
use App\Http\Resources\DiyetisyenWithDanisanEslesmeResource;
use App\Models\Danisan;
use App\Models\Diyetisyen;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class DanisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Danisan[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {

        $data = Danisan::all();
        // dd($value);
        // return Diyetisyen::all();
        //  return view('deneme',['data'=>$data]);
        //   return response(Rol::paginate(10), 200);
    return response()->json($data);

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
       $danisan = new Danisan;
       $danisan->adi = $request->adi;
       $danisan->soyad = $request->soyad;
       $danisan->mail = $request->mail;
       $danisan->parola = $request->parola;
       $danisan->tc = $request->tc;
       $danisan->telefon = $request->telefon;
       $danisan->cinsiyet = $request->cinsiyet;
       $danisan->yas = $request->yas;
       $danisan->danisan_boy = $request->danisan_boy;
       $danisan->danisan_kilo = $request->danisan_kilo;
       $danisan->kullanici_id = $request->kullanici_id;
       $danisan->save();

            return response([
                'data' => $danisan,
                'message'=> 'danisan oluşturuldu'
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Danisan $danisan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $danisan = Danisan::find($id);
        if($danisan)
            return response()->json($danisan, 200);
        else
            return response(['message'=> 'Danisan bulunamadi'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Danisan $danisan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Danisan $danisan,$id)
    {
        $danisan = Danisan::find($id);
        $danisan->adi = $request->adi;
        $danisan->soyad = $request->soyad;
        $danisan->mail = $request->mail;
        $danisan->parola = $request->parola;
        $danisan->tc = $request->tc;
        $danisan->telefon = $request->telefon;
        $danisan->cinsiyet = $request->cinsiyet;
        $danisan->yas = $request->yas;
        $danisan->danisan_boy = $request->danisan_boy;
        $danisan->danisan_kilo = $request->danisan_kilo;
        $danisan->kullanici_id = $request->kullanici_id;
        $danisan->save();

            return response([
                'data' => $danisan,
                'message'=> 'danisan güncellendi'
            ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Danisan $danisan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Danisan $danisan,$id)
    {
        $danisan = Danisan::find($id);
        $danisan->delete();

        return response([
            'message'=> ' Danışan silindi'
             ],201);
    }
    public function eslemeDiyetisyen1()
    {
        $diyetisyenKim = Danisan::paginate(2);
        return DiyetisyenWithDanisanEslesmeResource::collection($diyetisyenKim);
    }

}

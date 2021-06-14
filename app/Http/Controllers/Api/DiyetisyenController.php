<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\DanisanWithDiyetisyenEslesmeResource;
use App\Http\Resources\DiyetisyenWithDanisanEslesmeResource;
use App\Models\Diyetisyen;
use Cassandra\Type\Collection;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Http\Resources\DiyetisyenResource;
use App\Http\Resources\DiyetisyenCollection;
use App\Models\Kullanici;
use Illuminate\Support\Facades\DB;

/**
 * @property  collection
 */
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
    {/*
        $validator = Validator::make($request->all(), [
            'mail' => 'required|email|unique:diyetisyenler',
            'adi' =>  'required|string|max:50',
            'parola' =>'required'
    ]);
    */
        $input = $request->all(); //gelen tüm dataya erişim sağlar
        //veri tabanına kaydetme
        $diyetisyen = new Diyetisyen;
        $diyetisyen->adi = $request->adi;
        $diyetisyen->soyad = $request->soyad;
        $diyetisyen->tc = $request->tc;
        $diyetisyen->telefon = $request->telefon;
        $diyetisyen->cinsiyet = $request->cinsiyet;
        $diyetisyen->yas = $request->yas;
        $diyetisyen->hakkimda = $request->hakkimda;
        $diyetisyen->kategori = $request->kategori;
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
    public function update(Request $request)
    {
        $user=Kullanici::where("token",$request->token)->first();
        $diyetisyen = Diyetisyen::where("kullanici_id",$user->id)->first();
        $diyetisyen->adi = $request->adi;
        $diyetisyen->soyad = $request->soyad;
        $diyetisyen->tc = $request->tc;
        $diyetisyen->telefon = $request->telefon;
        $diyetisyen->cinsiyet = $request->cinsiyet;
        $diyetisyen->yas = $request->yas;
        $diyetisyen->hakkimda = $request->hakkimda;
        $diyetisyen->kategori = $request->kategori;
        $diyetisyen->puan = $request->puan;
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
       // return Diyetisyen::pluck('id'); //pluck metodu yalnızca bir kolonu almayı sağlar
        //return Diyetisyen::pluck('id','adi');
      //return Diyetisyen::select('id','adi')->orderBy('created_at', 'desc')->take(10)->get();
        return Diyetisyen::selectRow('id as diyetisyen_id','adi as diyetisyen_adi')
            ->orderBy('created_at', 'desc')->take(2)->get();

    }
    public function  bul2() {
         $diyetisyenler = Diyetisyen::orderBy('id','desc')->take(2)->get();
         $mapped = $diyetisyenler->map(function ($diyetisyen){
             return[
                 '_id' => $diyetisyen['id'],
                 '_adi' => $diyetisyen['adi'],
                 'puan' => $diyetisyen['puan']*1.05

             ];

         });

    }
    public function  diyetisyen1() {

       // $diyetisyen2= Diyetisyen::find(2);
        //return new DiyetisyenResource($diyetisyen2);

        // birden fazla kayıt getirmek istediğimizde:
        $diyetisyenler= Diyetisyen::all();
       // return DiyetisyenResource::collection($diyetisyenler);

        //ek kolon tanımlamak için:
        return new DiyetisyenCollection($diyetisyenler);

       //ek kolon için ayrı dosya oluşturmadan:

      /*return DiyetisyenResource::collection($diyetisyenler)->additional([
        'meta'=>[
            'total_diyetisyenler'=>$this->collection->count(),
            'diyetisyen' => 'value'
        ]

      ]);
*/

    }
    public function eslemeDanisanlarim()
    {
        $danisanlarim = Diyetisyen::paginate(2);
        return DanisanWithDiyetisyenEslesmeResource::collection($danisanlarim);
    }

    public function danisanlarim1()
    {
        return DB::table('eslesme_tablosu as estab')
            ->selectRaw('di.adi, da.adi,di.soyad,da.soyad,COUNT(*) as total')
            ->join('diyetisyenler as di', 'di.id', '=', 'estab.diyetisyen_id')
            ->join('danisanlar as da', 'da.id', '=', 'estab.danisan_id')
            ->groupBy('di.adi','da.adi','di.soyad','da.soyad' )
            ->orderByRaw('COUNT(*) DESC')
            ->get();
    }
}

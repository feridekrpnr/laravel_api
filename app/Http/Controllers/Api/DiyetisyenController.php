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

        $data = Diyetisyen::all();
        // dd($value);
        // return Diyetisyen::all();
        //  return view('deneme',['data'=>$data]);
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
       $rol = new Diyetisyen;
       $rol->hakkimda = $request->hakkimda;
       $rol->puan = $request->puan;
       $rol->save();

            return response([
                'data' => $rol,
                'message'=> 'Rol oluşturuldu'
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
        $dyt = Diyetisyen::find($id);
        if($dyt)
            return response()->json($dyt, 200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Diyetisyen $diyetisyen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diyetisyen $diyetisyen)
    {
        //
    }
    public function  bul1() {
        return Diyetisyen::pluck('id'); //pluck metodu yalnızca bir kolonu almayı sağlar
    }

}

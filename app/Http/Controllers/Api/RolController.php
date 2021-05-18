<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json(Rol::all());
        //return response(Rol::paginate(10), 200); //sayfalandırma
       
        /* $offset  = $request->offset ? $request->query('offset') : 0; //kaçıncı kayıttan başlayacağını
            $limit  = $request->limit ? $request->quey('limit') : 10; //kaç tane kayıt alınacağını       
            
            $qb = Rol::query();
            if($request->has('q'))
                $qb->where('name','like','%' . $request->query('q') . '%');

            if($request->has('sortBy'))
                $qb->orderby($request->query('sortBy'), $request->query('sort', 'DESC'));

            $data = $qb->offset($offset)->limit($limit)->get();

            return response($data,200);
        */
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
       $rol = new Rol;
       $rol->rol_adi = $request->ad;
       $rol->save();

            return response([
                'data' => $rol,
                'message'=> 'Rol oluşturuldu'
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol = Rol::find($id);
        if($rol)
            return response()->json($rol, 200);
        else
            return response(['message'=> 'Rol bulunamadi'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rol $rol,$id)
    {
        $rol = Rol::find($id);
        $rol->rol_adi = $request->ad;
        $rol->save();

             return response([
                 'data' => $rol,
                 'message'=> 'Rol GÜNCELLENDİ'
             ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol,$id)
    {
        $rol = Rol::find($id);
        $rol->delete();

        return response([
            'message'=> 'Rol silindi'
             ],201);
        
    }
}

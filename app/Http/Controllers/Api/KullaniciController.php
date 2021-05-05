<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kullanici;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kullanici  $kullanici
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dyt = Kullanici::find($id);
        if($dyt)
            return response()->json($dyt, 200);
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
    public function update(Request $request, Kullanici $kullanici)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kullanici  $kullanici
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kullanici $kullanici)
    {
        //
    }
}

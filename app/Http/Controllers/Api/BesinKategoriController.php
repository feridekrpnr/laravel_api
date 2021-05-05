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
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BesinKategori  $besinKategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dyt = BesinKategori::find($id);
        if($dyt)
            return response()->json($dyt, 200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BesinKategori  $besinKategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(BesinKategori $besinKategori)
    {
        //
    }
}

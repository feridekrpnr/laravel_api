<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Odeme;
use Illuminate\Http\Request;

class OdemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Odeme::all());
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
     * @param  \App\Models\Odeme  $odeme
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dyt = Odeme::find($id);
        if($dyt)
            return response()->json($dyt, 200);
        else
            return response(['message'=> 'Ödeme bulunamadi'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Odeme  $odeme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Odeme $odeme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Odeme  $odeme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Odeme $odeme)
    {
        //
    }
}

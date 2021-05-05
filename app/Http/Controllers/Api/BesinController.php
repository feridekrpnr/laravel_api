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
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Besin  $besin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dyt = Besin::find($id);
        if($dyt)
            return response()->json($dyt, 200);
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
    public function update(Request $request, Besin $besin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Besin  $besin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Besin $besin)
    {
        //
    }
}

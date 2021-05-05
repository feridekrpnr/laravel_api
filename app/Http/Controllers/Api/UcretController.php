<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ucret;
use Illuminate\Http\Request;

class UcretController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Ucret::all());
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
     * @param  \App\Models\Ucret  $ucret
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dyt = Ucret::find($id);
        if($dyt)
            return response()->json($dyt, 200);
        else
            return response(['message'=> 'Ücret bulunamadi'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ucret  $ucret
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ucret $ucret)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ucret  $ucret
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ucret $ucret)
    {
        //
    }
}

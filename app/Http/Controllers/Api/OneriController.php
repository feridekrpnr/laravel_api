<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Oneri;
use Illuminate\Http\Request;

class OneriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Oneri::all());
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
     * @param  \App\Models\Oneri  $oneri
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dyt = Oneri::find($id);
        if($dyt)
            return response()->json($dyt, 200);
        else
            return response(['message'=> 'Öneri bulunamadi'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oneri  $oneri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oneri $oneri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oneri  $oneri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oneri $oneri)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Danisan;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Danisan $danisan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dns = Danisan::find($id);
        if($dns)
            return response()->json($dns, 200);
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
    public function update(Request $request, Danisan $danisan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Danisan $danisan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Danisan $danisan)
    {
        //
    }


}

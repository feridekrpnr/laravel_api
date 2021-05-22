<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller

{ /*
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //   return response(Rol::paginate(10), 200);
        return response()->json(Category::all());
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
        $Category = new Category;
        $Category->category_adı = $request->category_adı;
        $Category->save();

        return response([
            'data' => $Category,
            'message'=> 'Category oluşturuldu'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Category = Category::find($id);
        if($Category)
            return response()->json($Category, 200);
        else
            return response(['message'=> 'Category bulunamadi'],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $Category,$id)
    {
        $Category = Category::find($id);
        $Category->category_adı = $request->category_adı;
        $Category->save();

        return response([
            'data' => $Category,
            'message'=> 'Category güncellendi'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category,$id)
    {
        $Category = Category::find($id);
        $Category->delete();

        return response([
            'message'=> 'Category silindi'
        ],201);

    }

}


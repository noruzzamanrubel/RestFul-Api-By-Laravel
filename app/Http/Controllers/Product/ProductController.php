<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return response()->json( [
            'message' => 'All Products Show Here',
            'data'    => $product,
        ] );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Product $product
     * @return \Illuminate\Http\Response
     */
    public function show( Product $product )
    {
        return response()->json( [
            'message' => 'Single Product Show Here',
            'data'    => $product,
        ] );
    }
}

<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Category $category )
    {
        $products = $category->product;
        return response()->json( [
            'message' => 'Category with Product list here',
            'data'    => $products,
        ] );
    }

}

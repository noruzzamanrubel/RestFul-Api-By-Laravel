<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategorySellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Category $category )
    {
        $seller = $category->product()
            ->whereHas( 'seller' )
            ->with( 'seller' )
            ->get()
            ->pluck( 'seller' );

        return response()->json( [
            'message' => 'Category with Seller list here',
            'data'    => $seller,
        ] );
    }

}

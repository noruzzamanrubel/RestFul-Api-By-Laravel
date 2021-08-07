<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Product $product )
    {
        $seller = $product->seller;
        return response()->json( [
            'message' => 'Product with Seller list here',
            'data'    => $seller,
        ] );
    }

}

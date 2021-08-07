<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Seller;

class SellerProductColtroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Seller $seller )
    {
        $products = $seller->product;
        return response()->json( [
            'message' => 'seller with product list Here',
            'data'    => $products,
        ], 200 );
    }
}

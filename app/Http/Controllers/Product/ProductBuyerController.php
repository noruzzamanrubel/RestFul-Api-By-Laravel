<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductBuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Product $product )
    {
        $buyers = $product->transactions()
            ->with( 'buyer' )
            ->get()
            ->pluck( 'buyer' );
        return response()->json( [
            'message' => 'Product with Buyers list here',
            'data'    => $buyers,
        ] );
    }

}

<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Buyer;

class BuyerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Buyer $buyer )
    {
        $products = $buyer->transactions()->with('product')->get()->pluck('product');
        return response()->json( [
            'message' => 'single Buyers with all product list Here',
            'data'    => $products,
        ], 200 );
    }
}

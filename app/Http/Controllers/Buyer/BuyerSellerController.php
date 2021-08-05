<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Buyer;

class BuyerSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Buyer $buyer )
    {
        $sellers = $buyer->transactions()->with( 'product.seller' )->get()->pluck('product.seller')->unique('id')->values();
        return response()->json( [
            'message' => 'single Buyers with Seller list Here',
            'data'    => $sellers,
        ], 200 );
    }

}

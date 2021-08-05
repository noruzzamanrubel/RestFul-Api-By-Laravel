<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;

class SellerBuyerColtroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Seller $seller )
    {
        $buyers = $seller
            ->products()
            ->whereHas( 'transactions' )
            ->with( 'transactions.buyer' )
            ->get()
            ->pluck( 'transactions' )
            ->collapse()
            ->pluck( 'buyer' )
            ->unique( 'id' )
            ->values();

        return response()->json( [
            'message' => 'single seller with buyer list Here',
            'data'    => $buyers,
        ], 200 );
    }

}

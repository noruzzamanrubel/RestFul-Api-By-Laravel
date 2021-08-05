<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;

class SellerTransactionColtroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Seller $seller )
    {
        $transaction = $seller
            ->product()
            ->whereHas( 'transactions' )
            ->with( 'transactions' )
            ->get()
            ->pluck( 'transactions' )
            ->collapse()
            ->unique( 'id' )
            ->values();

        return response()->json( [
            'message' => 'single seller with buyer list Here',
            'data'    => $transaction,
        ], 200 );
    }
}

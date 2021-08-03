<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Buyer;

class BuyerController extends Controller
{

    /**
     * Display a listing of the resource.

     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers = Buyer::has( 'transactions' )->get();
        return response()->json( [
            'message' => 'All Buyers list Here',
            'data'    => $buyers,
        ], 200 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $buyer = Buyer::has( 'transactions' )->findOrfail( $id );
        return response()->json( [
            'message' => 'A single buyer list here',
            'data'    => $buyer,
        ], 200 );
    }
}

<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::has( 'products' )->get();
        return response()->json( [
            'message' => 'All Sellers list Here',
            'data'    => $sellers,
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
        $seller = Seller::has( 'products' )->findOrfail( $id );
        return response()->json( [
            'message' => 'A single buyer list here',
            'data'    => $seller,
        ], 200 );
    }

}

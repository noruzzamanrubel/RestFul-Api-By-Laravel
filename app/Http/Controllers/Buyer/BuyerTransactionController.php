<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Buyer;

class BuyerTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Buyer $buyer )
    {
        $transactions = $buyer->transactions;
        return response()->json( [
            'message' => 'single Buyers transaction list Here',
            'data'    => $transactions,
        ], 200 );
    }
}

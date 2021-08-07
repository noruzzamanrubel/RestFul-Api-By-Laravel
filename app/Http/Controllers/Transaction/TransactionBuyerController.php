<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionBuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Transaction $transaction )
    {
        $buyer = $transaction->buyer;
        return response()->json( [
            'message' => 'transaction buyers list Here',
            'data'    => $buyer,
        ], 200 );
    }

}

<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Transaction $transaction )
    {
        $seller = $transaction->product->seller;
        return response()->json( [
            'message' => 'transaction seller list Here',
            'data'    => $seller,
        ], 200 );
    }

}

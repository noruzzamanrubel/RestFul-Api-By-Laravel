<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Transaction $transaction )
    {
        $product = $transaction->product;
        return response()->json( [
            'message' => 'transaction product list Here',
            'data'    => $product,
        ], 200 );
    }
}

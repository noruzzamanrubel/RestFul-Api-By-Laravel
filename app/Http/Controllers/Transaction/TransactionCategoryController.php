<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Transaction $transaction )
    {
        $categories = $transaction
            ->product
            ->with( 'category' )
            ->get()
            ->pluck( 'category' )
            ->unique( 'id' )
            ->values();
        return response()->json( [
            'message' => 'transaction category list Here',
            'data'    => $categories,
        ], 200 );
    }
}

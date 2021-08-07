<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryTransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Category $category )
    {
        $transactions = $category->product()
            ->whereHas( 'transactions' )
            ->with( 'transactions' )
            ->get()
            ->pluck( 'transactions' );

        return response()->json( [
            'message' => 'Category with Transactions list here',
            'data'    => $transactions,
        ] );
    }
}

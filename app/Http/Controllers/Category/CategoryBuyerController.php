<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryBuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Category $category )
    {
        $buyer = $category->product()
            ->whereHas( 'transactions' )
            ->with( 'transactions.buyer' )
            ->get()
            ->pluck( 'transactions' )
            ->collapse()
            ->pluck( 'buyer' );

        return response()->json( [
            'message' => 'Category with Buyer list here',
            'data'    => $buyer,
        ] );
    }

}

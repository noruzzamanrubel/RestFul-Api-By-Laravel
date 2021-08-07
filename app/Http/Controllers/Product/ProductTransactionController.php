<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Product $product )
    {
        $transaction = $product->transactions;
        return response()->json( [
            'message' => 'Product with Buyers list here',
            'data'    => $transaction,
        ] );
    }

}

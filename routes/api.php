<?php

use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Buyer\BuyerProductController;
use App\Http\Controllers\Buyer\BuyerSellerController;
use App\Http\Controllers\Buyer\BuyerTransactionController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Seller\SellerBuyerColtroller;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Seller\SellerProductColtroller;
use App\Http\Controllers\Seller\SellerTransactionColtroller;
use App\Http\Controllers\Transaction\TransactionCategoryController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\Transaction\TransactionSellerController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

/**
 * Buyers
 */

Route::resource( 'buyers', BuyerController::class )->only( ['index', 'show'] );
Route::resource( 'buyers.transactions', BuyerTransactionController::class )->only( ['index'] );
Route::resource( 'buyers.products', BuyerProductController::class )->only( ['index'] );
Route::resource( 'buyers.sellers', BuyerSellerController::class )->only( ['index'] );

/**
 * Categorys
 */

Route::resource( 'categories', CategoryController::class )->except( ['create', 'edit'] );

/**
 * Products
 */

Route::resource( 'products', ProductController::class )->only( ['index', 'show'] );

/**
 * Sellers
 */

Route::resource( 'sellers', SellerController::class )->only( ['index', 'show'] );
Route::resource( 'sellers.buyers', SellerBuyerColtroller::class )->only( ['index'] );
Route::resource( 'sellers.transactions', SellerTransactionColtroller::class )->only( ['index'] );
Route::resource( 'sellers.products', SellerProductColtroller::class )->only( ['index'] );

/**
 * Transactions
 */

Route::resource( 'transactions', TransactionController::class )->only( ['index', 'show'] );
Route::resource( 'transactions.sellers', TransactionSellerController::class )->only( ['index'] );
Route::resource( 'transactions.categories', TransactionCategoryController::class )->only( ['index'] );

/**
 * Categorys
 */

Route::resource( 'users', UserController::class )->except( ['create', 'edit'] );

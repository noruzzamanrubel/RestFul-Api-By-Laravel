<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Buyer\BuyerProductController;
use App\Http\Controllers\Buyer\BuyerSellerController;
use App\Http\Controllers\Buyer\BuyerTransactionController;
use App\Http\Controllers\Category\CategoryBuyerController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Category\CategoryProductController;
use App\Http\Controllers\Category\CategorySellerController;
use App\Http\Controllers\Category\CategoryTransactionsController;
use App\Http\Controllers\Product\ProductBuyerController;
use App\Http\Controllers\Product\ProductCategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\ProductSellerController;
use App\Http\Controllers\Product\ProductTransactionController;
use App\Http\Controllers\Seller\SellerBuyerColtroller;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Seller\SellerProductColtroller;
use App\Http\Controllers\Seller\SellerTransactionColtroller;
use App\Http\Controllers\Transaction\TransactionBuyerController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\Transaction\TransactionProductController;
use App\Http\Controllers\Transaction\TransactionSellerController;
use App\Http\Controllers\User\UserController;
use App\Jobs\SendTestJob;
use App\Models\User;
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

Route::group( [
    'middleware' => 'api',
    'prefix'     => 'auth',

], function ( $router ) {
    Route::post( '/login', [AuthController::class, 'login'] );
    Route::post( '/register', [AuthController::class, 'register'] );
    Route::post( '/logout', [AuthController::class, 'logout'] );
    Route::post( '/refresh', [AuthController::class, 'refresh'] );
    Route::get( '/user-profile', [AuthController::class, 'userProfile'] );
    Route::DELETE( '/delete/{id}', [AuthController::class, 'delete'] );
} );

Route::get( '/mail', function () {

    // dispatch( function () {
    //     Mail::to( 'r@gmail.com' )->send( new SendMarkdownMail() );
    // } )->delay( now()->addSeconds( 5 ) );

    // dispatch( new SendTestJob() )->delay( now()->addSeconds( 5 ) );

    $user = User::inRandomOrder()->first();

    SendTestJob::dispatch( $user )->delay( now()->addSeconds( 5 ) );

    echo $user->name;
} );

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
Route::resource( 'categories.products', CategoryProductController::class )->only( ['index'] );
Route::resource( 'categories.transactions', CategoryTransactionsController::class )->only( ['index'] );
Route::resource( 'categories.sellers', CategorySellerController::class )->only( ['index'] );
Route::resource( 'categories.buyers', CategoryBuyerController::class )->only( ['index'] );

/**
 * Products
 */

Route::resource( 'products', ProductController::class )->only( ['index', 'show'] );
Route::resource( 'products.buyers', ProductBuyerController::class )->only( ['index'] );
Route::resource( 'products.sellers', ProductSellerController::class )->only( ['index'] );
Route::resource( 'products.transactions', ProductTransactionController::class )->only( ['index'] );
Route::resource( 'products.categories', ProductCategoryController::class )->except( ['create', 'edit', 'store', 'show'] );

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
Route::resource( 'transactions.products', TransactionProductController::class )->only( ['index'] );
Route::resource( 'transactions.buyers', TransactionBuyerController::class )->only( ['index'] );

/**
 * Categorys
 */

Route::resource( 'users', UserController::class )->except( ['create', 'edit'] );

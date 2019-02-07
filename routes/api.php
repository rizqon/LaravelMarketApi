<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:api'])->group(function() {

    // Get User Product
    Route::middleware('role:customer|merchant')->get('store/{merchant}', 'Api\ProductApiController@byMerchant');

    // Get Product Detail
    Route::middleware('role:customer|merchant')->get('product/{product}', 'Api\ProductApiController@show');

    // Create Product
    Route::middleware('role:merchant')->post('product/create',  'Api\ProductApiController@create');

    // Update Product
    Route::middleware('role:merchant')->put('product/{product}/update', 'Api\ProductApiController@update');

    // Delete Product
    Route::middleware('role:merchant')->delete('product/{product}', 'Api\ProductApiController@delete');

    // Get Cart Item;
    Route::middleware('role:customer')->get('cart', 'Api\CartApiController@index');

    // Add To Cart Item;
    Route::middleware('role:customer')->post('cart/add', 'Api\CartApiController@create');

    // Update quantity an item inside Cart
    Route::middleware('role:customer')->put('cart/{cart}/update', 'Api\CartApiController@update');

    // Delete Item Inside Cart
    Route::middleware('role:customer')->delete('cart/{cart}', 'Api\CartApiController@delete');

    // Checkout
    Route::middleware('role:customer')->post('checkout', 'Api\OrderApiController@create');

    // Merchant Check Order
    Route::middleware('role:merchant')->get('orders', 'Api\OrderApiController@lists');

    // Customer Check History
    Route::middleware('role:customer')->get('history', 'Api\OrderApiController@history');

});
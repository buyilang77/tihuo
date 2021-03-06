<?php

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

use App\Http\Controllers\Frontend\CouponsController;
use App\Http\Controllers\Frontend\InformationController;
use App\Http\Controllers\Frontend\OrdersController;

Route::get('coupons/{coupon}', [CouponsController::class, 'show']);
Route::post('orders', [OrdersController::class, 'store']);
Route::get('merchant/information/{coupon}', [InformationController::class, 'merchant']);

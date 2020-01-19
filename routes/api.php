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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
    Route::post('edituser', 'API\UserController@edituser');
    Route::get('getallcoupon', 'API\UserController@couponlist');
    Route::post('getcoupon', 'API\UserController@coupon');
    Route::get('banners', 'API\UserController@banner');
    Route::get('url', 'API\UserController@shopurl');
});
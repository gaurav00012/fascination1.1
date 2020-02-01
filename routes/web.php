<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin', function () {
    return view('admin_template');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('admin/dashboard','Admin\DashboardController@index');
	Route::get('admin/create-shopkeeper','Admin\ShopkeeperController@create')->middleware('is_admin');
	Route::get('admin/get-shopkeeper','Admin\ShopkeeperController@getallshopkeeper')->middleware('is_admin');
	Route::post('admin/create-shopkeeper','Admin\ShopkeeperController@store')->middleware('is_admin');

	Route::get('admin/get-coupon','Admin\PromocodeController@getallCoupon');

	Route::get('admin/create-coupon','Admin\PromocodeController@create');
	Route::post('admin/create-coupon','Admin\PromocodeController@store');
	Route::get('admin/delete-coupon/{id}','Admin\PromocodeController@destroy');
	Route::post('admin/editshopkeeper/{id}','Admin\ShopkeeperController@update');
	Route::get('admin/deleteshopkeeper/{id}','Admin\ShopkeeperController@destroy');
	Route::get('admin/manage-banner','Admin\BannerController@index');
	Route::get('admin/get-banner','Admin\BannerController@getallbanner');
	Route::post('admin/create-banner','Admin\BannerController@store');
	Route::get('admin/delete-banner/{id}','Admin\BannerController@destroy');
    
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

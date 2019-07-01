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

// Auth::routes();

Route::group(['prefix' => Config::get('constants.admin.prefix')], function () {
    Route::get('/offer', 'OfferController@listOffers');
	Route::resource('/category', 'CategoriesController');
    Auth::routes();
});

Route::resource('object', 'ObjectsController');
Route::resource('offer', 'OfferController');

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

Route::group(['prefix' => 'admin_123456'], function () {
    Route::get('/offer', 'OfferController@listOffers');
    Auth::routes();
});
Route::resource('category', 'CategoriesController');
Route::resource('object', 'ObjectsController');
Route::resource('offer', 'OfferController');

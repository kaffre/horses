<?php
use Illuminate\Support\Facades\Redis;
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

route::get('/', function(){
	Redis::set('key1', '23');
print_r(Redis::get('key1'));
});

Route::group(['prefix' => Config::get('constants.admin.prefix')], function () {
    Route::get('/offer', 'OfferController@listOffers');
    Route::get('/objects', 'ObjectsController@listObjects');
	Route::resource('/category', 'CategoriesController');
    Auth::routes();
});
Route::group(['prefix' => 'api/v1'], function () {
	Route::post('/localization', 'ApiController@getCoordinate');
});
Route::get('/category/{id}/offers', 'CategoriesController@listRelatedOffers');
Route::get('/search', 'SearchController@getResults');
Route::resource('object', 'ObjectsController');
Route::resource('offer', 'OfferController');

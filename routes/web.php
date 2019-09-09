<?php

use App\Mix;
use App\Http\Resources\MixCollection;

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

Route::get('admin/image/upload', 'ImageController@upload')->middleware('auth');
Route::post('admin/image/upload', 'ImageController@create')->middleware('auth');

Route::get('/', 'MixController@index');
Route::get('mix/{slug}', 'MixController@show');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::get('image/{id}', 'ImageController@get');
Route::get('shop', 'ProductsController@index');

Route::get('/{any}', 'PagesController@show')->where('any', '.*');

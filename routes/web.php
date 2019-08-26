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

Route::get('/', 'MixController@index');

Route::get('mix/{slug}', 'MixController@show');

Auth::routes();

//Route::get('api/mix/{id}', 'MixController@get');

Route::get('api/mix/{slug}', 'IrcController@getMixBySlug');
Route::get('api/mix/search/{term}', 'IrcController@searchMixes');
Route::get('api/mix/find/{term}', 'IrcController@findMix');
Route::get('api/user/{username}', 'IrcController@getUser');
Route::get('api/flavour/{slug}', 'IrcController@getFlavour');
Route::get('api/comments/{slug}', 'IrcController@getComments');

Route::get('temp/pixel', 'SvgController@create');

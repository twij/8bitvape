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

Route::get('temp/pixel', 'SvgController@create');

Route::get('/{any}', 'PagesController@show')->where('any', '.*');

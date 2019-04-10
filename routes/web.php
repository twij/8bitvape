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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('api/mix/{id}', 'MixController@get');

Route::get('api/mix/{slug}', 'MixController@getBySlug');

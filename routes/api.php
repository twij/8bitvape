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

Route::get('mix/{slug}', 'ApiController@getMixBySlug');
Route::get('mix/search/{term}', 'ApiController@searchMixes');
Route::get('mix/find/{term}', 'ApiController@findMix');
Route::get('user/{username}', 'ApiController@getUser');
Route::get('user/find/{term}', 'ApiController@findUser');
Route::get('flavour/{slug}', 'ApiController@getFlavour');
Route::get('comments/{slug}', 'ApiController@getComments');

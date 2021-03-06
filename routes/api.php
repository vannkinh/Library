<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::apiResource('user','UserController');
Route::apiResource('article','ArticleController');
// Route::get('article', 'ArticleController@index');
// Route::get('article/{article}', 'ArticleController@show');
// Route::post('article/{article}', 'ArticleController@store');
// Route::put('article/{id}', 'ArticleController@update');
// Route::delete('article', 'ArticleController@destroy');

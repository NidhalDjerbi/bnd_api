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
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@authenticate');



Route::group(['middleware' => ['jwt.verify']], function() {

    Route::get('user', 'AuthController@getAuthenticatedUser');

    Route::get('produit', 'ProductController@index');
    Route::get('produit/{id}', 'ProductController@show');
    Route::post('produit', 'ProductController@store');
    Route::put('produit/{id}', 'ProductController@update');
    Route::delete('produit/{id}', 'ProductController@delete');
});
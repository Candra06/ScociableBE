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

Route::post('login', 'API\UserController@login');
Route::post('signup', 'API\UserController@signup');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('update-profil', 'API\UserController@update');
    Route::post('signout', 'API\UserController@logout');
    Route::get('artikel', 'API\ArtikelController@index');
    Route::get('artikel/{id}', 'API\ArtikelController@detail');
});

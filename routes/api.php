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
    Route::prefix('membership')->group(function () {
        Route::post('store', 'API\MembershipController@store');
    });
    Route::prefix('forum')->group(function () {
        Route::post('post', 'API\ForumController@store');
        Route::get('all', 'API\ForumController@index');
        Route::get('detail/{id}', 'API\ForumController@show');
        Route::post('reply/{id}', 'API\ForumController@reply');
        Route::get('like/{id}', 'API\ForumController@likes');
        Route::get('unlike/{id}', 'API\ForumController@unlikes');
        Route::get('likeReply/{id}', 'API\ForumController@likesReply');
        Route::get('unlikeReply/{id}', 'API\ForumController@unlikesReply');
    });

    Route::prefix('challenge')->group(function () {
        Route::get('show', 'API\ChallengeController@showListChallenge');
        Route::get('detail/{id}', 'API\ChallengeController@detailChallenge');
        Route::get('insert', 'API\ChallengeController@useChallenge');
        Route::get('finish/{id}', 'API\ChallengeController@update');
    });

    Route::prefix('diagnosa')->group(function () {
        Route::get('show', 'API\DiagnosaController@show');
        Route::post('diagnosaUser', 'API\DiagnosaController@diagnosaUser');
    });
});

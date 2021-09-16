<?php

use Illuminate\Support\Facades\Route;

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
    return view('dashboard.index');
});

Route::get('/artikel', function () {
    return view('dashboard.artikel.index');
});

Route::get('/challenge', function () {
    return view('dashboard.challenge.index');
});

Route::get('/membership', function () {
    return view('dashboard.membership.index');
});


Route::get('/login', function(){
    return view('auth.login');
});

Route::get('/register', function(){
    return view('auth.register');
});


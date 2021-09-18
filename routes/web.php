<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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




Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);


Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

    Route::get('/artikel', [ArtikelController::class, 'index']);
    Route::get('/artikel/tambah', [ArtikelController::class, 'tambah']);
    Route::get('/challenge', function () {
        return view('dashboard.challenge.index');
    });
    Route::get('/membership', function () {
        return view('dashboard.membership.index');
    });
});



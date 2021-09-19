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
    // dashboard
    Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

    // artikel
    Route::prefix('artikel')->name('artikel')->group(function () {
        Route::get('/', [ArtikelController::class, 'index']);
        Route::get('tambah', [ArtikelController::class, 'tambah']);
        Route::post('tambah', [ArtikelController::class, 'store']);
    });

    // challenge
    Route::prefix('challenge')->name('challenge')->group(function() {
        Route::get('/', function () {
            return view('dashboard.challenge.index');
        });
    });

    // membership
    Route::prefix('membership')->name('membership')->group(function() {
        Route::get('/', function () {
            return view('dashboard.membership.index');
        });
    });

    
});



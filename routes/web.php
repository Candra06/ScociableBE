<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MembershipController;
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
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user', [DashboardController::class, 'user'])->name('dashboard');
    Route::post('/user/update', [DashboardController::class, 'update'])->name('dashboard');

    // artikel
    Route::prefix('artikel')->name('artikel')->group(function () {
        Route::get('/', [ArtikelController::class, 'index']);
        Route::get('/show/{id}', [ArtikelController::class, 'show']);
        Route::get('edit/{id}', [ArtikelController::class, 'edit']);
        Route::get('tambah', [ArtikelController::class, 'tambah']);
        Route::post('/fetch', [ArtikelController::class, 'fetch']);
        Route::post('update', [ArtikelController::class, 'update']);
        Route::post('tambah', [ArtikelController::class, 'store']);
        Route::delete('/{id}', [ArtikelController::class, 'delete']);
    });

    // challenge
    Route::prefix('challenge')->name('challenge')->group(function() {
        Route::get('/{id}', [ChallengeController::class, 'index'] );
        
    });

    // membership
    Route::prefix('membership')->name('membership')->group(function() {
        Route::get('/', [MembershipController::class, 'index']);
        Route::post('/fetch', [MembershipController::class, 'fetch']);
        Route::post('/update', [MembershipController::class, 'update']);

    });

    
});



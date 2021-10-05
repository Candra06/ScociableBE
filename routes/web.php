<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Question\Question;

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
    Route::prefix('/')->name('dashboard')->group(function(){
        Route::get('/', [DashboardController::class, 'index']);
        Route::get('/profile', [DashboardController::class, 'profile']);
        Route::get('/user/tambah', [DashboardController::class, 'tambah']);
        Route::get('/user/list', [DashboardController::class, 'list']);
        Route::post('/user/store', [DashboardController::class, 'store']);
        Route::post('/user/update', [DashboardController::class, 'update']);
    });

    // artikel
    Route::prefix('artikel')->name('artikel')->group(function () {
        Route::get('/', [ArtikelController::class, 'index']);
        Route::get('/list', [ArtikelController::class, 'list']);
        Route::get('/show/{id}', [ArtikelController::class, 'show']);
        Route::get('edit/{id}', [ArtikelController::class, 'edit']);
        Route::get('tambah', [ArtikelController::class, 'tambah']);
        Route::post('update', [ArtikelController::class, 'update']);
        Route::post('tambah', [ArtikelController::class, 'store']);
        Route::delete('/{id}', [ArtikelController::class, 'delete']);
    });

    // challenge
    Route::prefix('challenge')->name('challenge')->group(function() {
        Route::get('/', [ChallengeController::class, 'index'] );
        Route::get('/create', [ChallengeController::class, 'create'] );
        Route::get('/show/{id}', [ChallengeController::class, 'show'] );
        Route::get('/edit/{id}', [ChallengeController::class, 'edit'] );
        Route::post('/store', [ChallengeController::class, 'store'] );
        Route::post('/update', [ChallengeController::class, 'update'] );
        Route::delete('/{id}', [ChallengeController::class, 'destroy']);

    });

    // membership
    Route::prefix('membership')->name('membership')->group(function() {
        Route::get('/', [MembershipController::class, 'index']);
        Route::post('/update', [MembershipController::class, 'update']);
    });

    Route::resource('question', 'QuestionController');


});



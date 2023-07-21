<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\SleepController;
use \App\Http\Controllers\ErrorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pgsql', function () {
    return view('pgsql', ['users' => App\Models\User::all()]);
});

Route::controller(SleepController::class)->group(function () {
    Route::get('/sleep', 'sleep');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/redis', 'redisGetUsers');
});

Route::controller(ErrorController::class)->group(function () {
    Route::get('/error', 'errorTest');
});

<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'pages.index');

Route::middleware('guest')->prefix('auth')->as('auth.')->namespace('App\Http\Controllers')->group(function () {
    Route::get('/register', 'RegisterController@show')->name('register.show');
    Route::post('/register', 'RegisterController@register')->name('register.perform');

    Route::get('/login', 'LoginController@show')->name('login.show');
    Route::post('/login', 'LoginController@login')->name('login.perform');
});

Route::middleware('auth')->group(function () {
   Route::post('/auth/logout', [LoginController::class, 'logout'])->name('auth.logout');
});

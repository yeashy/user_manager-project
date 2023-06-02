<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AppealController;
use App\Http\Controllers\CRUD\AnswerCrudController;
use App\Http\Controllers\CRUD\AppealCrudController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::middleware('guest')->prefix('auth')->as('auth.')->group(function () {
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
});

Route::middleware('auth')->group(function () {
   Route::post('/auth/logout', [LoginController::class, 'logout'])->name('auth.logout');
});

Route::middleware(['hasPermission:write_an_appeals', 'auth'])->prefix('appeals')->as('appeals.')->group(function () {
   Route::get('/', [AppealController::class, 'list'])->name('list');
   Route::get('/create', [AppealController::class, 'new'])->name('new');

   Route::get('/{id}', [AppealCrudController::class, 'read'])->name('read');
   Route::post('/create', [AppealCrudController::class, 'create'])->name('create');
   Route::put('/{id}', [AppealCrudController::class, 'update'])->name('update');
   Route::delete('/{id}', [AppealCrudController::class, 'delete'])->name('delete');
});


Route::middleware(['hasPermission:answer_to_appeals', 'auth'])->prefix('client-appeals')->as('answer.')->group(function () {
    Route::get('/', [AnswerController::class, 'listAppeals'])->name('list');

    Route::get('/{appealId}', [AnswerCrudController::class, 'read'])->name('read');
    Route::post('/{appealId}', [AnswerCrudController::class, 'create'])->name('create');
});

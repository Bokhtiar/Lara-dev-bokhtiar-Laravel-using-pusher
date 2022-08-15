<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/card/show/{id}', [App\Http\Controllers\CardController::class, 'show']);
Route::get('/leaderboard', [App\Http\Controllers\CardController::class, 'leaderboard']);

Route::get('/blog/create', [App\Http\Controllers\BlogController::class, 'create']);
Route::post('/blog/store', [App\Http\Controllers\BlogController::class, 'store']);
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index']);
Route::post('/blog/comment/{id}', [App\Http\Controllers\CommentController::class, 'store']);
Route::get('/blog/commnet/list', [App\Http\Controllers\CommentController::class, 'index']);


Route::get('/todo/create', [App\Http\Controllers\TodoController::class, 'create']);
Route::post('/todo/store', [App\Http\Controllers\TodoController::class, 'store']);
Route::get('/todo', [App\Http\Controllers\TodoController::class, 'index']);

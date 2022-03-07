<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::group(['middleware' => ['validateToken']], function() {
	Route::get('/logout', [UserController::class, 'logout']);
	Route::get('/users', [UserController::class, 'index']);
	Route::get('/user/{id}', [UserController::class, 'show']);
	Route::delete('/user', [UserController::class, 'delete']);
	Route::put('/user', [UserController::class, 'update']);

	Route::post('/post', [PostController::class, 'store']);
	Route::get('/posts', [PostController::class, 'index']);
	Route::get('/post/{id}', [PostController::class, 'show']);
	Route::put('/post/{id}', [PostController::class, 'update']);
	Route::delete('/post/{id}', [PostController::class, 'delete']);
});

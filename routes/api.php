<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FileController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('auth')->group(function() {
    Route::post('/register', [RegisterController::class, 'create']);
    Route::post('/login', [LoginController::class, 'login']);
});

Route::get('/user', [LoginController::class, 'usersData']);

// Route::('/items' );

Route::post('/uploadFile', [FileController::class, 'upload']);

Route::get('/users', function(Request $request) {
    return JWT::decode($request->Bearer, new Key(config('jwt.secret'), 'HS256'));
});

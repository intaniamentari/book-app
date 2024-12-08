<?php

use App\Http\Controllers\API\Auth\JWTAuthController;
use App\Http\Controllers\API\BookAPIController;
use App\Http\Controllers\API\CategoryAPIController;
use App\Http\Controllers\API\WriterAPIController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Support\Facades\Route;

Route::post('register', [JWTAuthController::class, 'register']);
Route::post('login', [JWTAuthController::class, 'login']);

Route::middleware([JwtMiddleware::class])->group(function () {
    Route::get('user', [JWTAuthController::class, 'getUser']);
    Route::post('logout', [JWTAuthController::class, 'logout']);

    Route::get('book', [BookAPIController::class, 'index']);
    Route::get('book/{id}', [BookAPIController::class, 'show']);
    Route::post('book', [BookAPIController::class, 'create']);
    Route::put('book/{id}', [BookAPIController::class, 'update']);
    Route::delete('book/{id}', [BookAPIController::class, 'destroy']);

    Route::get('category', [CategoryAPIController::class, 'index']);
    Route::get('category/{id}', [CategoryAPIController::class, 'show']);
    Route::post('category', [CategoryAPIController::class, 'create']);
    Route::put('category/{id}', [CategoryAPIController::class, 'update']);
    Route::delete('category/{id}', [CategoryAPIController::class, 'destroy']);

    Route::get('writer', [WriterAPIController::class, 'index']);
    Route::get('writer/{id}', [WriterAPIController::class, 'show']);
    Route::post('writer', [WriterAPIController::class, 'create']);
    Route::put('writer/{id}', [WriterAPIController::class, 'update']);
    Route::delete('writer/{id}', [WriterAPIController::class, 'destroy']);

});

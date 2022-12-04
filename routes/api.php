<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthenticationController;

Route::middleware(['auth:sanctum'])->group(function () {
    // Logout
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    // data user
    Route::get('/me', [AuthenticationController::class, 'me']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::patch('/posts/{id}', [PostController::class, 'update'])->middleware('pemilik-postingan');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware('pemilik-postingan');
});

Route::get('/posts', [PostController::class, 'index']);
// detail
Route::get('/posts/{id}', [PostController::class, 'show']);
// Login
Route::post('/login', [AuthenticationController::class, 'login']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookApiController;
use App\Http\Controllers\UserApiController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication routes
Route::post('/register', [UserApiController::class, 'register']);
Route::post('/login', [UserApiController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [UserApiController::class, 'logout']);

// 🛑 Protect books API with auth:sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('books', BookApiController::class);

    // Restore a soft-deleted book
    Route::post('books/{id}/restore', [BookApiController::class, 'restore']);

    // Permanently delete a book
    Route::delete('books/{id}/force-delete', [BookApiController::class, 'forceDelete']);
});


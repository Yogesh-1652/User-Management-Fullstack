<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// User Management API
// Get all users
Route::get('/users', [UserController::class, 'index']);

// Get a single user
Route::get('/users/{id}', [UserController::class, 'show']);

// Create a new user
Route::post('/users', [UserController::class, 'store']);

// Update a user
Route::put('/users/{id}', [UserController::class, 'update']);
Route::patch('/users/{id}', [UserController::class, 'update']);

// Delete a user
Route::delete('/users/{id}', [UserController::class, 'destroy']);


<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::post('login', [AuthController::class, 'login']);
Route::get('courses', [ApiController::class, 'courses']);
Route::get('course/{slug}', [ApiController::class, 'courseSingle']);

// Secure/protected Routes
Route::middleware('auth:api')->group(function () {
    Route::get('lessons', [ApiController::class, 'lessons']);
});

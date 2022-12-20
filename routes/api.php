<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('courses', [CourseController::class, 'index']);
Route::post('login', [AuthController::class, 'login']);
Route::get('course/{slug}', [CourseController::class, 'courseSingle']);

// Protected Route
Route::middleware('auth:sanctum')->group(function () {
    Route::post('course/{slug}/enroll', [CourseController::class, 'courseEnroll']);
});


// Secure/protected Routes
Route::middleware('auth:api')->group(function () {
    Route::get('lessons', [ApiController::class, 'lessons']);
});

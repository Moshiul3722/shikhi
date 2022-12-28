<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('courses', [CourseController::class, 'index']);
Route::post('login', [AuthController::class, 'login']);
Route::get('course/{slug}', [CourseController::class, 'courseSingle']);
Route::get('course/{slug}/lesson/{lesson}', [CourseController::class, 'courseLesson']);

// Protected Route
Route::middleware('auth:sanctum')->group(function () {
    // Enroll
    Route::post('/enroll', [CourseController::class, 'courseEnroll']);
    // Wishlist
    Route::post('/wishlist', [CourseController::class, 'courseWishlist']);
    // Review
    Route::post('/review', [CourseController::class, 'courseReview']);
    // Lesson Status
    Route::post('markAsComplete', [CourseController::class, 'lessonMarkAsComplete']);
    // My Profile
    Route::get('/me', [UserController::class, 'myProfile']);

});

// Secure/protected Routes
Route::middleware('auth:api')->group(function () {
    Route::get('lessons', [ApiController::class, 'lessons']);
});

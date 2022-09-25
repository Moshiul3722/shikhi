<?php

use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\UserManagementController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    // User Management
    Route::get('user-management', [UserManagementController::class, 'index'])->name('user.management.index');
    Route::get('add-user', [UserManagementController::class, 'createUser'])->name('user.create');
    Route::post('user/store', [UserManagementController::class, 'storeUser'])->name('user.store');
    Route::get('user/edit/{user}', [UserManagementController::class, 'editUser'])->name('user.edit');
    Route::put('user/update/{user}', [UserManagementController::class, 'updateUser'])->name('user.update');
    Route::delete('user/delete/{user}', [UserManagementController::class, 'destroyUser'])->name('user.delete');

    Route::get('user-role', [UserManagementController::class, 'roleIndex'])->name('user.role.index');
    // Route::post('user-role/store', [UserManagementController::class, 'roleStore'])->name('role.store');
    Route::match(['post', 'put'], 'user-role/store', [UserManagementController::class, 'roleStore'])->name('role.store');


    // Category Management
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::match(['post', 'put'], 'category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::delete('category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
});


require __DIR__ . '/auth.php';

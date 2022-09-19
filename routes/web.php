<?php

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
    // Route::get('user-management', [UserManagementController::class, 'index'])->name('user.management.index');
    Route::get('user-role', [UserManagementController::class, 'roleIndex'])->name('user.role.index');
    Route::post('user-role/store', [UserManagementController::class, 'roleStore'])->name('role.store');
});


require __DIR__ . '/auth.php';

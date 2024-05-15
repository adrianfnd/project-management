<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Auth Route
Route::get('/', [AuthController::class, 'redirect']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.action');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Main Route
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'dashboard']) -> name('dashboard');
});

//Dashboard
Route::get('/dashboard_ftth', [DashboardController::class,'dashboard_ftth']) -> name('dashboard_ftth');
Route::get('/filter', function () {
    return view('filter');
});
Route::get('/dashboard_homepass', [DashboardController::class,'dashboard_homepass']) -> name('dashboard_homepass');



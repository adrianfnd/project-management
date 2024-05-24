<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardProject;
use App\Http\Controllers\DashboardFtth;
use App\Http\Controllers\DashboardHomepass;
use App\Http\Controllers\DashboardOltBrand;
use App\Http\Controllers\DashboardDailyActivity;
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
    // Dashboard Project
    Route::get('/dashboard_project', [DashboardProject::class,'dashboard']) -> name('dashboard_project');
    Route::get('/project/create', [DashboardProject::class, 'create'])->name('project.create');
    Route::post('/project/store', [DashboardProject::class, 'store'])->name('project.store');
    Route::get('/project/edit/{id}', [DashboardProject::class, 'edit'])->name('project.edit');
    Route::post('/project/update/{id}', [DashboardProject::class, 'update'])->name('project.update');
    Route::get('/project/view/{id}', [DashboardProject::class, 'view'])->name('project.view');
    Route::get('/project/delete/{id}', [DashboardProject::class, 'delete'])->name('project.delete');

    // Dashboard FTTH
    Route::get('/dashboard_ftth', [DashboardFtth::class,'dashboard']) -> name('dashboard_ftth');

    // Dashboard Homepass
    Route::get('/dashboard_homepass', [DashboardHomepass::class,'dashboard']) -> name('dashboard_homepass');

    // Dashboard OLT Brand
    Route::get('/dashboard_olt', [DashboardOltBrand::class,'dashboard']) -> name('dashboard_olt');

    // Dashboard Daily Activity
    Route::get('/dashboard_daily', [DashboardDailyActivity::class,'dashboard']) -> name('dashboard_daily');
});

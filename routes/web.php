<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\superadmin\StaffController;
use App\Http\Controllers\superadmin\TechnicianController;

use App\Http\Controllers\staff\DashboardProject;
use App\Http\Controllers\staff\DashboardFtth;
use App\Http\Controllers\staff\DashboardHomepass;
use App\Http\Controllers\staff\DashboardOltBrand;
use App\Http\Controllers\staff\DashboardDailyActivity;

use App\Http\Controllers\maintenance\DashboardTechnician;

use App\Http\Controllers\technician\ProjectController;


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

Route::middleware(['auth', 'role:Superadmin'])->prefix('superadmin')->group(function () {
   // Staff
   Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
   Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
   Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
   Route::get('/staff/{id}/edit', [StaffController::class, 'edit'])->name('staff.edit');
   Route::put('/staff/{id}', [StaffController::class, 'update'])->name('staff.update');
   Route::delete('/staff/{id}', [StaffController::class, 'destroy'])->name('staff.destroy');

   // Technician
   Route::get('/technician', [TechnicianController::class, 'index'])->name('technician.index');
   Route::get('/technician/create', [TechnicianController::class, 'create'])->name('technician.create');
   Route::post('/technician', [TechnicianController::class, 'store'])->name('technician.store');
   Route::get('/technician/{id}/edit', [TechnicianController::class, 'edit'])->name('technician.edit');
   Route::put('/technician/{id}', [TechnicianController::class, 'update'])->name('technician.update');
   Route::delete('/technician/{id}', [TechnicianController::class, 'destroy'])->name('technician.destroy');
});

Route::middleware(['auth', 'role:Staff'])->prefix('staff')->group(function () {
   // Dashboard Project
   Route::get('/dashboard_project', [DashboardProject::class,'dashboard']) -> name('dashboard_project');
   Route::get('/project/create', [DashboardProject::class, 'create'])->name('project.create');
   Route::post('/project', [DashboardProject::class, 'store'])->name('project.store');
   Route::get('project/view-{project}', [DashboardProject::class, 'view'])->name('project.view');
   Route::get('/project/edit-{project}', [DashboardProject::class, 'edit'])->name('project.edit');
   Route::put('/project-{project}', [DashboardProject::class, 'update'])->name('project.update');
   Route::delete('/project-{project}', [DashboardProject::class, 'destroy'])->name('project.destroy');

   // Dashboard FTTH
   Route::get('/dashboard_ftth', [DashboardFtth::class,'dashboard']) -> name('dashboard_ftth');

   // Dashboard Homepass
   Route::get('/dashboard_homepass', [DashboardHomepass::class,'dashboard']) -> name('dashboard_homepass');

   // Dashboard OLT Brand
   Route::get('/dashboard_olt', [DashboardOltBrand::class,'dashboard']) -> name('dashboard_olt');

   // Dashboard Daily Activity
   Route::get('/dashboard_daily', [DashboardDailyActivity::class,'dashboard']) -> name('dashboard_daily');
});

Route::middleware(['auth', 'role:Maintenance'])->prefix('maintenance')->group(function () {
   // Dashboard Project
   Route::get('/dashboard_project', [DashboardProject::class,'dashboard']) -> name('dashboard_project');
   Route::get('/project/create', [DashboardProject::class, 'create'])->name('project.create');
   Route::post('/project', [DashboardProject::class, 'store'])->name('project.store');
   Route::get('project/view-{project}', [DashboardProject::class, 'view'])->name('project.view');
   Route::get('/project/edit-{project}', [DashboardProject::class, 'edit'])->name('project.edit');
   Route::put('/project-{project}', [DashboardProject::class, 'update'])->name('project.update');
   Route::delete('/project-{project}', [DashboardProject::class, 'destroy'])->name('project.destroy');
});

Route::middleware(['auth', 'role:Technician'])->prefix('technician')->group(function () {
   Route::get('/project', [ProjectController::class,'index']) -> name('technician.project.index');
   Route::post('/project/start-{id}', [ProjectController::class, 'startProject'])->name('technician.project.start');
   Route::get('/project/view-{id}', [ProjectController::class, 'view'])->name('technician.project.view');
});
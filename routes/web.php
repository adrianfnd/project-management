<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\superadmin\StaffController;
use App\Http\Controllers\superadmin\TechnicianController;

use App\Http\Controllers\staff\StaffPengajuanController;

use App\Http\Controllers\maintenance\MaintenancePengajuanController;
use App\Http\Controllers\maintenance\MaintenancePemasanganController;

use App\Http\Controllers\technician\TechnicianPengajuanController;
use App\Http\Controllers\technician\TechnicianPemasangController;


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
   Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
   Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
   Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
   Route::get('/staff/{id}/edit', [StaffController::class, 'edit'])->name('staff.edit');
   Route::put('/staff/{id}', [StaffController::class, 'update'])->name('staff.update');
   Route::delete('/staff/{id}', [StaffController::class, 'destroy'])->name('staff.destroy');

   Route::get('/technician', [TechnicianController::class, 'index'])->name('technician.index');
   Route::get('/technician/create', [TechnicianController::class, 'create'])->name('technician.create');
   Route::post('/technician', [TechnicianController::class, 'store'])->name('technician.store');
   Route::get('/technician/{id}/edit', [TechnicianController::class, 'edit'])->name('technician.edit');
   Route::put('/technician/{id}', [TechnicianController::class, 'update'])->name('technician.update');
   Route::delete('/technician/{id}', [TechnicianController::class, 'destroy'])->name('technician.destroy');
});

Route::middleware(['auth', 'role:Staff'])->prefix('staff')->group(function () {
   Route::get('/pengajuan', [StaffPengajuanController::class,'index']) -> name('staff.pengajuan.index');
   Route::get('/pengajuan/create', [StaffPengajuanController::class, 'create'])->name('staff.pengajuan.create');
   Route::post('/pengajuan', [StaffPengajuanController::class, 'store'])->name('staff.pengajuan.store');
   Route::get('pengajuan/view-{project}', [StaffPengajuanController::class, 'view'])->name('staff.pengajuan.view');

   // Route::get('/pengajuan/edit-{project}', [StaffPengajuanController::class, 'edit'])->name('staff.pengajuan.edit');
   // Route::put('/pengajuan-{project}', [StaffPengajuanController::class, 'update'])->name('staff.pengajuan.update');
   // Route::delete('/pengajuan-{project}', [StaffPengajuanController::class, 'destroy'])->name('staff.pengajuan.destroy');
});

Route::middleware(['auth', 'role:Maintenance'])->prefix('maintenance')->group(function () {
   Route::get('/pengajuan', [MaintenancePengajuanController::class,'index']) -> name('maintenance.pengajuan.index');
   Route::get('/pengajuan/create-{project}', [MaintenancePengajuanController::class, 'create'])->name('maintenance.pengajuan.create');
   Route::post('/pengajuan/store-{project}', [MaintenancePengajuanController::class, 'store'])->name('maintenance.pengajuan.store');
   Route::post('/pengajuan', [MaintenancePengajuanController::class, 'store'])->name('maintenance.pengajuan.store');
   Route::get('pengajuan/view-{project}', [MaintenancePengajuanController::class, 'view'])->name('maintenance.pengajuan.view');
   Route::get('pengajuan/pdf-{id}', [MaintenancePengajuanController::class, 'showPdf'])->name('maintenance.spengajuan.pdf');

   Route::get('/pemasangan', [MaintenancePemasanganController::class, 'index'])->name('maintenance.pemasangan.index');
   Route::post('/pemasangan/{project}/approve', [MaintenancePemasanganController::class, 'approve'])->name('maintenance.pemasangan.approve');
   Route::post('/pemasangan/{project}/decline', [MaintenancePemasanganController::class, 'decline'])->name('maintenance.pemasangan.decline');
});


Route::middleware(['auth', 'role:Technician'])->prefix('technician')->group(function () {
   Route::get('/pengajuan', [TechnicianPengajuanController::class,'index']) -> name('technician.pengajuan.index');
   Route::get('/pengajuan/create', [TechnicianPengajuanController::class, 'create'])->name('technician.engajuan.create');
   Route::post('/pengajuan', [TechnicianPengajuanController::class, 'store'])->name('technician.pengajuan.store');
   Route::get('pengajuan/view-{project}', [TechnicianPengajuanController::class, 'view'])->name('technician.pengajuan.view');
   Route::post('/project/{project}/add-to-selected', [TechnicianPengajuanController::class, 'addToSelectedProjects'])->name('technician.project.add-to-selected');

   Route::get('/pemasangan', [TechnicianPemasangController::class,'index']) -> name('technician.pemasangan.index');
   Route::post('/pemasangan/start-{id}', [TechnicianPemasangController::class, 'startProject'])->name('technician.pemasangan.start');
   Route::get('/pemasangan/view-{id}', [TechnicianPemasangController::class, 'view'])->name('technician.pemasangan.view');
});
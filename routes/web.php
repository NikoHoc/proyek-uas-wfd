<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PenghuniController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('authentication.login');
});

Route::get('/authentication/login', [AuthenticationController::class, 'login_form'])->name('authentication.login');
Route::post('/authentication/login', [AuthenticationController::class, 'authenticate']);
Route::get('/authentication/register', [AuthenticationController::class, 'register_form'])->name('authentication.register');
Route::post('/authentication/register', [AuthenticationController::class, 'add_user']);
Route::get('/authentication/logout', [AuthenticationController::class, 'logout'])->name('authentication.logout');
Route::post('/authentication/logout', [AuthenticationController::class, 'logout'])->name('authentication.logout');


// Route::get('/admin/index', [AdminController::class, 'index']);
// Route::get('/pemilik_kos/index', [PemilikController::class, 'index']);
// Route::get('/penghuni/index', [PenghuniController::class, 'index']);

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/manage_users', [AdminController::class, 'manage_users'])->name('admin.manage_users');
    Route::get('/admin/manage_kos', [AdminController::class, 'manage_kos'])->name('admin.manage_kos');
    Route::get('/admin/form', [AdminController::class, 'form'])->name('admin.form');
});

Route::middleware(['role:pemilik'])->group(function () {
    Route::get('/pemilik_kos/index', [PemilikController::class, 'index'])->name('pemilik.index');
});

Route::middleware(['role:penghuni'])->group(function () {
    Route::get('/penghuni/index', [PenghuniController::class, 'index'])->name('penghuni.index');
});
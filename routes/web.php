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


Route::get('/admin/index', [AdminController::class, 'index'])->middleware('auth.role:admin')->name('admin.index');
Route::get('/pemilik_kos/index', [PemilikController::class, 'index'])->middleware('auth.role:pemilik_kos')->name('pemilik_kos.index');
Route::get('/penghuni/index', [PenghuniController::class, 'index'])->middleware('auth.role:penghuni')->name('penghuni.index');


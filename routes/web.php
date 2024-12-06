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
    Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manage-users');
    Route::get('/admin/form-pemilik', [AdminController::class, 'formPemilik'])->name('admin.form-pemilik');
    Route::get('/admin/form-penghuni', [AdminController::class, 'formPenghuni'])->name('admin.form-penghuni');
});

Route::middleware(['role:pemilik'])->group(function () {
    Route::get('/pemilik_kos/index', [PemilikController::class, 'showKos'])->name('pemilik.index');
    Route::get('/pemilik_kos/request', [PemilikController::class, 'indexRequest'])->name('pemilik.request.index');
    Route::get('/pemilik_kos/laporan', [PemilikController::class, 'indexLaporan'])->name('pemilik.laporan.index');
    Route::get('/pemilik_kos/laporan/addKamar', [PemilikController::class, 'addKamar'])->name('pemilik.laporan.kamar.index');
});

Route::middleware(['role:penghuni'])->group(function () {
    Route::get('/penghuni/index', [PenghuniController::class, 'showAllKos'])->name('penghuni.index');
    Route::get('/penghuni/kos/index', [PenghuniController::class, 'showAllKamar'])->name('penghuni.kos.index');
    Route::get('/penghuni/pemesanan/index', [PenghuniController::class, 'showPemesanan'])->name('penghuni.pemesanan.index');
});

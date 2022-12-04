<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

// Login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');
Route::get('/actionLogout', [LoginController::class, 'actionLogout'])->name('actionLogout');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/actionRegister', [RegisterController::class, 'actionRegister'])->name('actionRegister');

Route::middleware('auth')->group(function () {
  // Dashboard
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
  Route::get('/search', [DashboardController::class, 'search'])->name('dashboard.search');

  // Departemen
  Route::get('/departemen', [DepartemenController::class, 'index'])->name('departemen.index');
  Route::get('/departemen/search', [DepartemenController::class, 'search'])->name('departemen.search');
  Route::get('/departemen/add', [DepartemenController::class, 'create'])->name('departemen.add');
  Route::post('/departemen/store', [DepartemenController::class, 'store'])->name('departemen.store');
  Route::get('/departemen/edit/{id}', [DepartemenController::class, 'edit'])->name('departemen.edit');
  Route::post('/departemen/update/{id}', [DepartemenController::class, 'update'])->name('departemen.update');
  Route::post('/departemen/soft-delete/{id}', [DepartemenController::class, 'softDelete'])->name('departemen.softDelete');
  Route::get('/departemen/recycle', [DepartemenController::class, 'recycle'])->name('departemen.recycle');
  Route::post('/departemen/restore/{id}', [DepartemenController::class, 'restore'])->name('departemen.restore');
  Route::post('/departemen/delete/{id}', [DepartemenController::class, 'delete'])->name('departemen.delete');

  // Pekerjaan
  Route::get('/pekerjaan', [PekerjaanController::class, 'index'])->name('pekerjaan.index');
  Route::get('/pekerjaan/search', [PekerjaanController::class, 'search'])->name('pekerjaan.search');
  Route::get('/pekerjaan/add', [PekerjaanController::class, 'create'])->name('pekerjaan.add');
  Route::post('/pekerjaan/store', [PekerjaanController::class, 'store'])->name('pekerjaan.store');
  Route::get('/pekerjaan/edit/{id}', [PekerjaanController::class, 'edit'])->name('pekerjaan.edit');
  Route::post('/pekerjaan/update/{id}', [PekerjaanController::class, 'update'])->name('pekerjaan.update');
  Route::post('/pekerjaan/soft-delete/{id}', [PekerjaanController::class, 'softDelete'])->name('pekerjaan.softDelete');
  Route::get('/pekerjaan/recycle', [PekerjaanController::class, 'recycle'])->name('pekerjaan.recycle');
  Route::post('/pekerjaan/restore/{id}', [PekerjaanController::class, 'restore'])->name('pekerjaan.restore');
  Route::post('/pekerjaan/delete/{id}', [PekerjaanController::class, 'delete'])->name('pekerjaan.delete');

  // Karyawan
  Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
  Route::get('/karyawan/search', [KaryawanController::class, 'search'])->name('karyawan.search');
  Route::get('/karyawan/add', [KaryawanController::class, 'create'])->name('karyawan.add');
  Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
  Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
  Route::post('/karyawan/update/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
  Route::post('/karyawan/soft-delete/{id}', [KaryawanController::class, 'softDelete'])->name('karyawan.softDelete');
  Route::get('/karyawan/recycle', [KaryawanController::class, 'recycle'])->name('karyawan.recycle');
  Route::post('/karyawan/restore/{id}', [KaryawanController::class, 'restore'])->name('karyawan.restore');
  Route::post('/karyawan/delete/{id}', [KaryawanController::class, 'delete'])->name('karyawan.delete');

  // Pelamar
  Route::get('/pelamar', [PelamarController::class, 'index'])->name('pelamar.index');
  Route::get('/pelamar/search', [PelamarController::class, 'search'])->name('pelamar.search');
  Route::get('/pelamar/add', [PelamarController::class, 'create'])->name('pelamar.add');
  Route::post('/pelamar/store', [PelamarController::class, 'store'])->name('pelamar.store');
  Route::get('/pelamar/edit/{id}', [PelamarController::class, 'edit'])->name('pelamar.edit');
  Route::post('/pelamar/update/{id}', [PelamarController::class, 'update'])->name('pelamar.update');
  Route::post('/pelamar/soft-delete/{id}', [PelamarController::class, 'softDelete'])->name('pelamar.softDelete');
  Route::get('/pelamar/recycle', [PelamarController::class, 'recycle'])->name('pelamar.recycle');
  Route::post('/pelamar/restore/{id}', [PelamarController::class, 'restore'])->name('pelamar.restore');
  Route::post('/pelamar/delete/{id}', [PelamarController::class, 'delete'])->name('pelamar.delete');
});

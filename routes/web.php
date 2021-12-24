<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RayonAdminController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\RegisterStudentController;
use App\Http\Controllers\RombelAdminController;
use App\Http\Controllers\RombelController;
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
})->name('home');


// Authentication
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth:admins,students');

// Admin
Route::resource('/dashboard/admin/rombel', RombelAdminController::class)->middleware('auth:admins');
Route::resource('/dashboard/admin/rayon', RayonAdminController::class)->middleware('auth:admins');
Route::resource('/dashboard/admin/register-siswa', RegisterStudentController::class)->middleware('auth:admins');
Route::resource('/dashboard/admin/register-admin', RegisterAdminController::class)->middleware('auth:admins');

// Students
Route::get('/dashboard/rombel', [RombelController::class, 'index']);
Route::get('/dashboard/rayon', [RayonController::class, 'index']);
Route::get('/dashboard/absen/tidak-hadir', [AbsenController::class, 'indexTidakHadir']);
Route::get('/absen-kepulangan', [AbsenController::class, 'storeAbsenKepulangan']);
Route::post('/absen-hadir', [AbsenController::class, 'storeAbsenHadir']);
Route::post('/dashboard/absen/tidak-hadir', [AbsenController::class, 'addTidakHadir']);
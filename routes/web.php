<?php

use App\Http\Controllers\AbsenAdminController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
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

Route::middleware('auth:admins,students')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Profile
    Route::get('/dashboard/profile', [ProfileController::class, 'index']);
    Route::post('/dashboard/profile', [ProfileController::class, 'storePhoto']);
    Route::post('/dashboard/profile-update', [ProfileController::class, 'updatePhoto']);
    Route::post('/dashboard/profile-delete', [ProfileController::class, 'deletePhoto']);
});

Route::middleware('auth:admins')->group(function () {
    // Admin
    Route::resource('/dashboard/admin/rombel', RombelAdminController::class);
    Route::resource('/dashboard/admin/rayon', RayonAdminController::class);
    Route::resource('/dashboard/admin/register-siswa', RegisterStudentController::class);
    Route::resource('/dashboard/admin/register-admin', RegisterAdminController::class);
});


Route::middleware('auth:students')->group(function () {
    // Students
    Route::get('/dashboard/rombel', [RombelController::class, 'index']);
    Route::get('/dashboard/rayon', [RayonController::class, 'index']);
    Route::get('/dashboard/absen/tidak-hadir', [AbsenController::class, 'indexTidakHadir']);
    Route::get('/absen-kepulangan', [AbsenController::class, 'storeAbsenKepulangan']);
    Route::post('/absen-hadir', [AbsenController::class, 'storeAbsenHadir']);
    Route::post('/dashboard/absen/tidak-hadir', [AbsenController::class, 'addTidakHadir']);
});
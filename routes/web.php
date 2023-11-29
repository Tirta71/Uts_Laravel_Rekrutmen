<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\ProsesRekrutmenController;
use App\Http\Controllers\StatusRekrutmenController;
use App\Http\Controllers\UserController;

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

// 10121195
// Tirta Samara



Route::get('/', function () {
    return view('Layout.main');
});

Route::get('/pelamar', [PelamarController::class, 'tampilDataPelamar'])->name('tampilDataPelamar');
Route::get('/edit-pelamar/{id}', [PelamarController::class, 'edit'])->name('editPelamar');
Route::put('/update-pelamar/{id}', [PelamarController::class, 'update'])->name('updatePelamar');
Route::get('/hapus-pelamar/{id}', [PelamarController::class, 'hapus'])->name('hapusPelamar');





Route::get('/tambah-pelamar', [PelamarController::class, 'tampilFormTambah']);
Route::post('/tambah-pelamar', [PelamarController::class, 'prosesFormTambah'])->name('tambah-pelamar');

Route::get('/live-search', [PelamarController::class, 'liveSearch'])->name('live-search');

Route::get('/proses-rekrutmen', [ProsesRekrutmenController::class, 'index'])->name('proses_rekrutmen.index');





// Registration Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Dashboard Route
Route::get('/admin', [DashboardController::class, 'index'])->name('admin')->middleware('auth'); // tambahkan middleware auth

Route::group(['middleware' => 'auth'], function () {
    Route::get('/lowongan', [ProsesRekrutmenController::class, 'tampilDataRekrut'])->name('tampilDataRekrut');
    
    Route::get('/tambahLowongan', [ProsesRekrutmenController::class, 'formTambahLowongan'])->name('formTambahLowongan');
    Route::post('/tambahLowongan', [ProsesRekrutmenController::class, 'tambahLowongan'])->name('tambahLowongan');
    
    Route::get('/editLowongan/{id}', [ProsesRekrutmenController::class, 'formEditLowongan'])->name('formEditLowongan');
    Route::put('/updateLowongan/{id}', [ProsesRekrutmenController::class, 'updateLowongan'])->name('updateLowongan');
    Route::delete('/deleteLowongan/{id}', [ProsesRekrutmenController::class, 'deleteLowongan'])->name('deleteLowongan');
    
    Route::get('/tampilDataStatus', [StatusRekrutmenController::class, 'tampilDataStatus'])->name('tampilDataStatus');
    Route::get('/formTambahStatus', [StatusRekrutmenController::class, 'formTambahStatus'])->name('formTambahStatus');
    Route::post('/tambahStatus', [StatusRekrutmenController::class, 'tambahStatus'])->name('tambahStatus');
    Route::get('/hapus-status/{id}', [StatusRekrutmenController::class, 'deleteStatusRekrutmen'])->name('deleteStatusRekrutmen');
    Route::delete('/hapus-status/{id}', [StatusRekrutmenController::class, 'deleteStatusRekrutmen'])->name('deleteStatusRekrutmen');
});


// User

Route::get('/users', [UserController::class, 'index'])->name('admin.users');
Route::get('/tambahUser', [UserController::class, 'formTambahUser'])->name('formTambahUser');
Route::post('/tambahUser', [UserController::class, 'tambahUser'])->name('tambahUser');
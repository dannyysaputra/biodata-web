<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisternController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [BiodataController::class, 'index']);
    Route::get('/input-dashboard', [BiodataController::class, 'inputDashboard']);
    Route::post('/simpanBiodata', [BiodataController::class, 'simpanBiodata']);
    
    Route::get('/delete/{id}', [BiodataController::class, 'hapusBiodata'])->name('hapusBiodata');
    Route::get('/ubah/{id}', [BiodataController::class, 'ubahBiodata'])->name('ubahBiodata');
    Route::post('/update', [BiodataController::class, 'updateBiodata'])->name('updateBiodata');
    
    Route::get('/logout', [LoginController::class, 'LogOut']);
    
    Route::post('/search', [BiodataController::class, 'cariBiodata'])->name('cariBiodata');

    Route::get('/table-user', [RegisternController::class, 'tableUser']);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisternController::class, 'register']);
    Route::post('/registerUser', [RegisternController::class, 'registerUser']);
    
    Route::get('/', [LoginController::class, 'halamanLogin']);
    Route::any('/postLogin', [LoginController::class, 'Login']);    
});

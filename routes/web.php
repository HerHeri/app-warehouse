<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\BarangController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');

Route::middleware(['myauth'])->group(function () {
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::prefix('users')->name('users')->group(function(){
        Route::get('/', [UserController::class, 'index']);
        Route::get('/credit', [UserController::class, 'credit'])->name('.credit');
        Route::post('/store', [UserController::class, 'store'])->name('.store');
        Route::any('/delete', [UserController::class, 'delete'])->name('.delete');
    });

    Route::prefix('stock-barang')->name('stock-barang')->group(function(){
        Route::get('/', [BarangController::class, 'index']);
        Route::get('/credit', [BarangController::class, 'credit'])->name('.credit');
        Route::post('/store', [BarangController::class, 'store'])->name('.store');
        Route::any('/delete', [BarangController::class, 'delete'])->name('.delete');
    });

    Route::get('logout', [AuthController::class, 'logout']);
});
Route::get('/', function () {
    return redirect('/login');
});

<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\BarangController;
use App\Http\Controllers\Frontend\FormbarangController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\RoleController;
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
    });

    Route::prefix('stock-barang')->name('stock-barang')->group(function(){
        Route::get('/', [BarangController::class, 'index']);
    });

    Route::prefix('form-masuk')->name('form-masuk')->group(function(){
        Route::get('/', [FormbarangController::class, 'formMasuk']);
    });

    Route::prefix('form-keluar')->name('form-keluar')->group(function(){
        Route::get('/', [FormbarangController::class, 'formKeluar']);
    });

    Route::get('logout', [AuthController::class, 'logout']);
});
Route::get('/', function () {
    return redirect('/login');
});

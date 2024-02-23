<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BarangController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('action-login', [AuthController::class, 'actionLogin'])->name('action-login');
Route::post('action-register', [AuthController::class, 'actionRegister'])->name('action-register');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('me', function(Request $request){
        $user = $request->user();
        return [
            'nama' => $user->name,
            'role' => $user->role->role_name,
            'email' => $user->email
        ];
    });
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::prefix('users')->name('users')->group(function(){
        Route::get('/', [UserController::class, 'index']);
        Route::post('/store', [UserController::class, 'store'])->name('.store');
        Route::get('/credit/{id}', [UserController::class, 'credit'])->name('.credit');
        Route::any('/delete/{id}', [UserController::class, 'delete'])->name('.delete');
    });

    Route::prefix('stock-barang')->name('stock-barang')->group(function(){
        Route::get('/', [BarangController::class, 'index']);
        Route::post('/store', [BarangController::class, 'store'])->name('.store');
        Route::get('/credit/{id}', [BarangController::class, 'credit'])->name('.credit');
        Route::any('/delete/{id}', [BarangController::class, 'delete'])->name('.delete');
    });

    Route::get('logout', [AuthController::class, 'actionLogout']);
});

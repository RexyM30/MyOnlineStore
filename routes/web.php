<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesananSayaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\WishlistController;
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
    return redirect('Login');
});
// route
Route::prefix('Login')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login.index');
    Route::post('login_proccess', [LoginController::class, 'login_proccess']);
});
Route::prefix('Register')->group(function () {
    Route::get('/', [LoginController::class, 'register']);
    Route::post('insert', [LoginController::class, 'insertregister']);
});

Route::group(['middleware' => ['ceklogin']], function () {
    // route
    Route::prefix('Home')->group(function () {
        Route::get('/', [HomeController::class, 'home']);
        Route::post('view', [HomeController::class, 'detail']);
    });

    Route::prefix('Cart')->group(function () {
        Route::get('/', [WishlistController::class, 'index']);
        Route::post('insertcart', [WishlistController::class, 'insertcart']);
        Route::post('UpdateCart', [WishlistController::class, 'UpdateCart']);
        Route::post('Order', [WishlistController::class, 'Order']);
    });

    Route::prefix('PesananSaya')->group(function () {
        Route::get('/', [PesananSayaController::class, 'index']);
    });

    Route::prefix('Profile')->group(function () {
        Route::get('/', [ProfilController::class, 'index']);
    });
});

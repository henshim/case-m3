<?php

use App\Http\Controllers\LoginController;
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


Route::prefix('login')->group(function () {
    Route::get('login', [LoginController::class, 'goToLogin'])->name('login.goToLogin');

    Route::get('register', [LoginController::class, 'goToRegister'])->name('login.goToRegister');

    Route::post('login', [LoginController::class, 'login'])->name('login.login');

    Route::post('register', [LoginController::class, 'register'])->name('login.register');

    Route::get('logout', [LoginController::class, 'logout'])->name('login.logout');
});

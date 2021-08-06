<?php

use App\Http\Controllers\FoodController;
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

Route::get('/', [LoginController::class, 'goToLogin'])->name('login.goToLogin');


Route::prefix('/admin')->group(function (){
    Route::prefix('/food')->group(function(){
        Route::get('/',[FoodController::class,'index'])->name('admin.food.list');
        Route::get('/add',[FoodController::class,'create'])->name('admin.food.create');
        Route::post('/add',[FoodController::class,'store'])->name('admin.food.store');
        Route::get('/update/{id}',[FoodController::class,'update'])->name('admin.food.update');
        Route::post('/update/{id}',[FoodController::class,'edit'])->name('admin.food.edit');
        Route::get('/detail/{id}',[FoodController::class,'show'])->name('admin.food.show');
        Route::get('/delete/{id}',[FoodController::class,'destroy'])->name('admin.food.delete');
    });
});

Route::get('admin',function (){return view('');});

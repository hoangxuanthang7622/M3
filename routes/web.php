<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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



// Route::prefix('/')->middleware(['auth', 'preventBackHistory'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('handdle-logout', [UserController::class, 'logout'])->name('logout');

    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    // Route::get('autocomplete', ProductController::class)->name('autocomplete');

    Route::resource('user', UserController::class);
    Route::resource('layout', UserController::class);

// });
Route::post('handdle-register', [UserController::class, 'register'])->name('handdle-register');
Route::get('/register', [UserController::class, 'viewRegister'])->name('viewRegister');
Route::get('/login', [UserController::class, 'viewLogin'])->name('login');




// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('handdle-login', [UserController::class, 'login'])->name('handdle-login');

Route::resource('order', OderController::class);
Route::get('/thangshop', [ShopController::class,'index']);

<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;

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

Route::inertia('/','Home')->name('home');
Route::inertia('/register','Auth/Register')->name('register');
Route::post('/register',[AuthController::class, 'store'])->name('register.store');
Route::inertia('/login','Auth/Login')->name('login');
Route::post('/login',[AuthController::class, 'login'])->name('login.store');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
// Route::inertia('/','Home')->name('home');
// Route::inertia('/about','About')->name('about');

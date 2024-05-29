<?php

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

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('process', [AuthController::class, 'store'])->name('store');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('do-login', [AuthController::class, 'authenticate']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('reload-captcha', [AuthController::class, 'reload']);
Route::get('forgot', [AuthController::class, 'forgotPassword'])->name('forgot');
Route::post('forgot-password', [AuthController::class, 'submitForgotPassword'])->name('forgot-password');
Route::get('reset-password/{token}', [AuthController::class, 'resetPassword'])->name('reset.password.get');
Route::post('reset-password',[AuthController::class, 'submitResetPassword'])->name('reset.password.post');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

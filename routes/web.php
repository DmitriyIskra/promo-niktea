<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/auth/login', [App\Http\Controllers\Auth\LoginController::class, 'action'])->name('auth.login');
Route::post('/auth/register', [App\Http\Controllers\Auth\RegisterController::class, 'action'])->name('auth.register');
Route::get('/auth/checker', [App\Http\Controllers\Auth\AuthChecker::class, 'action'])->name('auth.checker');





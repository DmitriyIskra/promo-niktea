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
})->name('main');
Route::get('/account', function () {
    return view('account');
})->name('account');
Route::get('/winners', function () {
    return view('winners');
})->name('winners');
Route::get('/rules', function () {
    return view('rules');
})->name('rules');




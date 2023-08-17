<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;


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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/auth/login', [App\Http\Controllers\Auth\LoginController::class, 'action'])->name('auth.login');
Route::post('/auth/register', [App\Http\Controllers\Auth\RegisterController::class, 'action'])->name('auth.register');
Route::get('/auth/checker', [App\Http\Controllers\Auth\AuthChecker::class, 'action'])->name('auth.checker');

Route::get('/account/info', [App\Http\Controllers\Account\Account::class, 'action'])->name('account.info');
Route::get('/admin', [App\Http\Controllers\Admin\Admin::class, 'action'])->name('admin.index');


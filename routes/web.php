<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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


Route::resource('meetings', \App\Http\Controllers\MeetingController::class);
Route::resource('transactions', \App\Http\Controllers\TransactionController::class);


/***
 * Tutaj zaczynam faktyczne routingi
 */


Auth::routes();

Route::view('/offert', 'offert');
Route::view('/credits', 'credits');
Route::view('/loans', 'loans');
Route::view('/contact', 'contact');
Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index'])->name('index');

Route::view('/phone','top-up_phone')->name('phone');
Route::get('/change', [\App\Http\Controllers\WelcomeController::class, 'change'])->name('changeLang');

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'getDashboard'])->name('dashboard');

Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);

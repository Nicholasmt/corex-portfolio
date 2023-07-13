<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('resume', [App\Http\Controllers\HomeController::class, 'resume'])->name('resume');
Route::get('services', [App\Http\Controllers\HomeController::class, 'services'])->name('services');
Route::get('portfolio', [App\Http\Controllers\HomeController::class, 'portfolio'])->name('portfolio');
Route::get('contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');

Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

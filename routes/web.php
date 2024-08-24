<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class,'home'])->name('index');
Route::get('about', [HomeController::class,'about'])->name('about');
Route::get('resume', [HomeController::class,'resume'])->name('resume');
Route::get('services', [HomeController::class,'services'])->name('services');
Route::get('portfolio', [HomeController::class,'portfolio'])->name('portfolio');
Route::get('contact', [HomeController::class,'contact'])->name('contact');

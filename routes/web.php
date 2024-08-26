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
Route::get('projects', [HomeController::class,'projects'])->name('projects');
Route::get('hire-me', [HomeController::class,'contact_me'])->name('hire-me');
Route::get('blog', [HomeController::class,'blog'])->name('blog');
Route::get('download-resume', [HomeController::class,'download_resume'])->name('download-resume');

<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'homepage'])->name('homepage');

Route::post('/send', [PageController::class, 'send'])->name('send');
Route::get('/contatti', [PageController::class, 'contact'])->name('contact');

Route::get('/dashboard', [ArticleController::class, 'index'])->name('dashboard')->middleware('auth');

Route::resource('article', ArticleController::class);
Route::resource('categories', CategoryController::class);

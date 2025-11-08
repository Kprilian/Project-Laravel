<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\CourseController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/writers', [WriterController::class, 'index'])->name('writers.index');
Route::get('/writers/{id}', [WriterController::class, 'show'])->name('writers.show');

// Popular route must be declared before resource if using slug param
Route::get('/courses/popular', [CourseController::class, 'popular'])->name('courses.popular');

Route::resource('courses', CourseController::class)->parameters(['courses'=>'slug']);

// Static about
Route::view('/about','about')->name('about');

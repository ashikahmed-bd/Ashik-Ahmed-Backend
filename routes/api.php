<?php

use App\Http\Controllers\BkashController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;


Route::get('plans', [PlanController::class, 'getPlans']);
Route::get('projects', [ProjectController::class, 'getProjects']);
Route::get('project/{slug}', [ProjectController::class, 'getProject']);
Route::get('posts', [PostController::class, 'getPosts']);
Route::get('article/{slug}', [PostController::class, 'getPostBySlug']);
Route::get('posts/latest', [PostController::class, 'getLatest']);
Route::get('reviews', [ReviewController::class, 'getReviews']);
Route::get('categories', [CategoryController::class, 'getCategories']);


Route::post('license/verify', [LicenseController::class, 'verify']);


Route::prefix('bkash')->group(function (){
    Route::post('create', [BkashController::class, 'create']);
    Route::post('execute', [BkashController::class, 'execute']);
});


Route::prefix('license')->group(function (){
    Route::get('/all', [LicenseController::class, 'index'])->name('license.all');
    Route::get('/create', [LicenseController::class, 'create'])->name('license.create');
    Route::post('/store', [LicenseController::class, 'store'])->name('license.store');
    Route::get('{id}/edit', [LicenseController::class, 'edit'])->name('license.edit');
    Route::put('{id}/update', [LicenseController::class, 'update'])->name('license.update');
    Route::delete('{id}/delete', [LicenseController::class, 'destroy'])->name('license.delete');
});

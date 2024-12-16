<?php

use App\Http\Controllers\BkashController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
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




Route::get('reset', [PlanController::class, 'reset']);

Route::get('license/verify', [LicenseController::class, 'verify']);


Route::prefix('bkash')->group(function (){
    Route::post('create', [BkashController::class, 'create']);
    Route::post('execute', [BkashController::class, 'execute']);
});


Route::prefix('admin')->middleware(['auth:sanctum'])->group(function (){

    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::get('licenses', [LicenseController::class, 'index']);
    Route::post('license/store', [LicenseController::class, 'store']);

    Route::prefix('project')->group(function (){
        Route::get('all', [ProjectController::class, 'index']);
        Route::post('store', [ProjectController::class, 'store']);
        Route::get('{project}/show', [ProjectController::class, 'show']);
        Route::put('{project}/update', [ProjectController::class, 'update']);
        Route::delete('{project}/delete', [ProjectController::class, 'destroy']);
    });

    Route::prefix('skill')->group(function (){
        Route::get('all', [SkillController::class, 'index']);
        Route::post('store', [SkillController::class, 'store']);
        Route::get('{skill}/show', [SkillController::class, 'show']);
        Route::put('{skill}/update', [SkillController::class, 'update']);
        Route::delete('{skill}/delete', [SkillController::class, 'destroy']);
    });


    Route::prefix('review')->group(function (){
        Route::get('all', [ReviewController::class, 'index']);
        Route::post('store', [ReviewController::class, 'store']);
        Route::get('{review}/show', [ReviewController::class, 'show']);
        Route::put('{review}/update', [ReviewController::class, 'update']);
        Route::delete('{review}/delete', [ReviewController::class, 'destroy']);
    });

    Route::prefix('post')->group(function (){
        Route::get('all', [PostController::class, 'index']);
        Route::post('store', [PostController::class, 'store']);
        Route::get('{post}/show', [PostController::class, 'show']);
        Route::put('{post}/update', [PostController::class, 'update']);
        Route::delete('{post}/delete', [PostController::class, 'destroy']);
    });


});

Route::get('callback', [BkashController::class, 'callback'])->name('callback');

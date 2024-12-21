<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('authenticate');

Route::middleware(['auth'])->group(function (){

    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::prefix('post')->group(function (){
        Route::get('/all', [PostController::class, 'index'])->name('post.all');
        Route::get('/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/store', [PostController::class, 'store'])->name('post.store');
        Route::get('{id}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::put('{id}/update', [PostController::class, 'update'])->name('post.update');
        Route::delete('{id}/delete', [PostController::class, 'destroy'])->name('post.delete');
    });

    Route::prefix('license')->group(function (){
        Route::get('/all', [LicenseController::class, 'index'])->name('license.all');
        Route::get('/create', [LicenseController::class, 'create'])->name('license.create');
        Route::post('/store', [LicenseController::class, 'store'])->name('license.store');
        Route::get('{id}/edit', [LicenseController::class, 'edit'])->name('license.edit');
        Route::put('{id}/update', [LicenseController::class, 'update'])->name('license.update');
        Route::delete('{id}/delete', [LicenseController::class, 'destroy'])->name('license.delete');
        Route::get('{id}/download', [LicenseController::class, 'download'])->name('license.download');
    });

    Route::prefix('project')->group(function (){
        Route::get('all', [ProjectController::class, 'index'])->name('project.all');
        Route::get('create', [ProjectController::class, 'create'])->name('project.create');
        Route::post('store', [ProjectController::class, 'store'])->name('project.store');
        Route::get('{project}/show', [ProjectController::class, 'show'])->name('project.edit');
        Route::put('{project}/update', [ProjectController::class, 'update'])->name('project.update');
        Route::delete('{project}/delete', [ProjectController::class, 'destroy'])->name('project.delete');
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


    Route::prefix('settings')->group(function (){
        Route::get('general', [SettingsController::class, 'general'])->name('settings.general');
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

});


Route::get('reset', [SettingsController::class, 'reset'])->name('reset');

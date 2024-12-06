<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BkashController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function (){
    Route::post('login', [AuthController::class, 'login']);
});


Route::get('plans', [PlanController::class, 'getPlans']);
Route::get('projects', [ProjectController::class, 'getProjects']);
Route::get('project/{slug}', [ProjectController::class, 'getProject']);
Route::get('reset', [PlanController::class, 'reset']);

Route::get('license/verify', [LicenseController::class, 'verify']);


Route::prefix('bkash')->group(function (){
    Route::post('create', [BkashController::class, 'create']);
    Route::post('execute', [BkashController::class, 'execute']);
});


Route::middleware(['auth:sanctum'])->group(function (){

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


    Route::prefix('testimonial')->group(function (){
        Route::get('all', [TestimonialController::class, 'index']);
        Route::post('store', [TestimonialController::class, 'store']);
        Route::get('{testimonial}/show', [TestimonialController::class, 'show']);
        Route::put('{testimonial}/update', [TestimonialController::class, 'update']);
        Route::delete('{testimonial}/delete', [TestimonialController::class, 'destroy']);
    });

    Route::prefix('blog')->group(function (){
        Route::get('all', [BlogController::class, 'index']);
        Route::post('store', [BlogController::class, 'store']);
        Route::get('{blog}/show', [BlogController::class, 'show']);
        Route::put('{blog}/update', [BlogController::class, 'update']);
        Route::delete('{blog}/delete', [BlogController::class, 'destroy']);
    });


});

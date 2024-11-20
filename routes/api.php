<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BkashController;
use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function (){
    Route::post('login', [AuthController::class, 'login']);
});


Route::get('plans', [PlanController::class, 'getPlans']);


Route::prefix('bkash')->group(function (){
    Route::post('create', [BkashController::class, 'create']);
    Route::post('execute', [BkashController::class, 'execute']);
});

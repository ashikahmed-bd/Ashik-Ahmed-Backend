<?php

use App\Http\Controllers\BkashController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('reset', [SettingsController::class, 'reset'])->name('reset');
Route::get('callback', [BkashController::class, 'callback'])->name('callback');

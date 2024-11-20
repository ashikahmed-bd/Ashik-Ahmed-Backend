<?php

use App\Http\Controllers\BkashController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('callback', [BkashController::class, 'callback'])->name('callback');

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SettingsController extends Controller
{
    public function reset()
    {
        Artisan::call('db:seed');

        return response()->json([
            'success' => true,
            'message' => 'Reset successfully',
            'data' => null,
        ]);

    }
}
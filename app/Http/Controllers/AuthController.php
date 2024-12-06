<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::query()->where('email', $request->input('email'))->firstOrFail();

        return response()->json([
            'success' => true,
            'message' => trans('auth.success'),
            'data' => [
                'token' => $user->createToken($request->userAgent(), [$user->role], now()->addWeek())->plainTextToken,
                'token_type' => 'Bearer',
                'user' => $user,
            ],

        ], Response::HTTP_OK);
    }


}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Utils\Token;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(AuthRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $user = Auth::user();
            return response()->json([
                'token' => $user->createToken(Token::WEB)->plainTextToken,
                'user' => $user->with('roles')->find($user->id),
                'success' => true
            ]);
        }

        return response()->json([
            'errors' => [
                'password' => ['Invalid password.'],
                'message' => 'Invalid credentials'
            ]
        ], 422);
    }

    public function logout(User $user)
    {
       return $user->tokens()->delete();
    }
}

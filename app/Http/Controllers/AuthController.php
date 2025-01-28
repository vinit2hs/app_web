<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        if ($user = Sentinel::authenticate($credentials)) {
            Activation::create($user);
            return response()->json(['user' => $user], 200);
        } else {
            return response()->json(['error' => 'Usuário e/ou senha inválida'], 401);
        }
    }

    public function logout()
    {
        Sentinel::logout();

        return response()->json(['message' => 'Logged out'], 200);
    }
}

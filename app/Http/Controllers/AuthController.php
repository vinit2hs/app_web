<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

class AuthController extends Controller
{

    public function logar(Request $request)
    {
        $credentials = [
            'document'    => '11111111111111',
            'password' => '!hot@root-tester@user!',
        ];

        $user = User::query()->where('document', $credentials['document'])->first();
        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado!'], 401);
        }

        $credentials['email'] = $user->email;

        $activation = Activation::create($user);
        $userSentinel = Sentinel::findById($user->id);
        if (!Activation::complete($userSentinel, $activation->code))
        {
            return response()->json(['message' => 'Não foi possivel ativar usuario'], 401);
        }

        if ($user = Sentinel::authenticate($credentials)) {
            return response()->json(['user' => $user], 200);
        } else {
            return response()->json(['error' => 'Usuário e/ou senha inválida'], 401);
        }
    }

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

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{

    public function index(){
        return view('pages.login.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'E-mail é obrigatório',
            'email.email' => 'E-mail inválido',
            'password.required' => 'Senha é obrigatória',
            'password.min' => 'Senha deve ter pelo menos 6 caracteres'
        ]);

        $user = User::query()->where('email', $credentials['email'])->first();
        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado!', 'status' => false], 401);
        }

        $userSentinel = Sentinel::findById($user->id);

        if ($user = Sentinel::authenticate($credentials)) {

            if (!Activation::completed($userSentinel)) {
                $activation = Activation::create($userSentinel);
                if (!Activation::complete($userSentinel, $activation->code)) {
                    return response()->json(['message' => 'Não foi possivel ativar usuario', 'status' => false], 401);
                }
            }

            return response()->json(['user' => $user, 'status' => true], 200);
        } else {
            return response()->json(['error' => 'Usuário e/ou senha inválida', 'status' => false], 401);
        }
    }

    public function logout(Request $request)
    {
        Sentinel::logout();

        return response()->json(['message' => 'Logged out'], 200);
    }
}

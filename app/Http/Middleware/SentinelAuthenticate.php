<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class SentinelAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Sentinel::check();
        if(!$user){
            if($request->ajax()){
                return response()->json(['message' => 'Sua sessão expirou, faça login novamente!'], 401);
            }else {
                return redirect()->route('login.page');
            }
        }

        // Você também pode compartilhar dados dinâmicos, como informações do usuário logado
        View::composer('*', function ($view) use($user) {
            $view->with('user', [
                'email' => $user->email,
                'name' => $user->name
            ]);
        });

        return $next($request);
    }
}

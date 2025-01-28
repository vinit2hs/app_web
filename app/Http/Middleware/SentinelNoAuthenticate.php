<?php

namespace App\Http\Middleware;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SentinelNoAuthenticate
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
            View::composer('*', function ($view) use($user) {
                $view->with('user', []);
            });
            return $next($request);
        }

        if($request->ajax()){
            return response()->json(['message' => 'Acesso negado'], 401);
        }else {
            return redirect()->route('dashboard');
        }
    }
}

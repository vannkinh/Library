<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class AuthBasic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // onceBasic is HTTP Basic Athentication without setting a user identifier cookie in the seesion.
        if(Auth::onceBasic()){
            return response()->json(['message' => 'Auth failed'],401);
        }else{
            return $next($request);
        }
    }
}

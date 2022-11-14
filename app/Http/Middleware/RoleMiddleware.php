<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{

    public function handle(Request $request, Closure $next,...$rolenames)
    {
        if(Auth::check()){
            foreach ($rolenames as $r){
                if (Auth::user()->role->role == $r){
                    return $next($request);
                }
            }
        }
        else{
            return  redirect()->route('login.form');
        }
        return response()->view('errors.np');
    }
}

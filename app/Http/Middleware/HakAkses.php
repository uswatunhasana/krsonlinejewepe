<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Hakakses
{
    public function handle($request, Closure $next,$permision)
    {
        $permision = explode('|',$permision);
        $role = Auth::user()->role;
        if(check($permision,$role)){
            return $next($request);
        }
        return redirect('/');
    }
}

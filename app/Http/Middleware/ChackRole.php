<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class ChackRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){

            if(Auth::user()->role == 2){
                return redirect(route('editor'));
            }elseif(Auth::user()->role == 3){
                return redirect(route('customer'));
            }

        }
       

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class TestMiddleware
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
        if(!Auth::check()){

            return redirect('/login');
        }else
        {
            $employee = Auth::User();
            if(($employee->name != "abc"))
            {
                Auth::logout();
                return redirect('/login');
            }
        }
        
        $employee = Auth::User();
        // dd($employee);
        return $next($request);
    }
}

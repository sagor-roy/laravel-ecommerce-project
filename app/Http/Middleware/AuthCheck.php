<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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
        if(!session()->has('LoggedCustomer')){
            session()->flash('type','danger');
            session()->flash('message','You must logged in');
            return redirect('user/login');
        }
        return $next($request);
    }
}

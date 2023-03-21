<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //admin role ==1
        if(Auth::check()){

            if(Auth::client()->role == '1'){
                return $next($request);

            }else
            return redirect('/home')->with('message','Access Denited as you are not Admin!');
{


}
        }else{
            return redirect('/login')->with('message','Login to the website info');

        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MultiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        if(auth()->user()->type !== 1){
            return $next($request);
        }
        //dd($userType);
        
        return response()->json(['You do not have permission to access this page.']);
        /* return response()->view('errors.check-permission'); */
    }
}

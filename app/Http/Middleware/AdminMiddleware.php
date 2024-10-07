<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }*/
	
	public function handle($request, Closure $next)
	{
		if(auth()->check() && auth()->user()->hasRole('Admin')) {
			return $next($request);
		}	
		return redirect()->back()->with(['error'=>'Sorry! You don\'t have permission to access / on this server.']);
		//abort(401,'please dont do!!!'); 
	}
}

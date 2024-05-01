<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next)
    {
      if(Auth::check() && Auth::user()->getRoleNames()->count() > 0){
        return $next($request);
      } else {
        return redirect('/');
      }
    }
}

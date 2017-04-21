<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsAdministrator
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
      if (session('status') === 'administrator' || Auth::user()) {
        return $next($request);
      }

      return redirect()->route('login.pages');
    }
}

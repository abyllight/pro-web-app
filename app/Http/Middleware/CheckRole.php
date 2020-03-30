<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;

class CheckRole
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
        if (!$request->user()->is_admin){
            return redirect('tickets');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class LoginMiddleware
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
        # Pendente a autorização por grupo de acesso
        if(!Session::has('usuario'))
            return redirect()->route('login');

        return $next($request);
    }
}

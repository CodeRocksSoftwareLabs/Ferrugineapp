<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Log;

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
        Log::registrar($request->getRequestUri(), $request->getMethod(), $request->all());

        # Pendente a autorização por grupo de acesso
        if(!Session::has('usuario'))
            return redirect()->route('login');

        return $next($request);
    }
}

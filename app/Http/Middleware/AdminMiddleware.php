<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AdminMiddleware
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
        if(!Session::get('usuario')->fl_admin)
            return redirect()->route('dashboard');

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use LogService;

class ApiAuthMiddleware
{
    const BASIC_USERNAME = "ferrugine.com.br";
    const BASIC_PASSWORD = "b32d88d2-b5ed-4bc7-a6b8-c74d60063155";

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->isNotCorrectCredentials($request->getUser(), $request->getPassword())) {
            return response(json_encode(["erros" => "1", "mensagem" => "Não autorizado!"]), 401);
        }

        LogService::registrar($request->getRequestUri(), $request->getMethod(), $request->all());

        return $next($request);
    }

    private function isCorrectCredentials($username, $pass) {
        return ($username == self::BASIC_USERNAME) && ($pass == self::BASIC_PASSWORD);
    }

    private function isNotCorrectCredentials($username, $pass) {
        return ! $this->isCorrectCredentials($username, $pass);
    }
}

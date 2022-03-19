<?php

namespace App\Services;
use App\Log;
use Session;


class LogService
{
    public static function registrar($route, $http_code, $params)
    {
        $log = new Log();
        $log->usuario_id = Session::has('usuario') ? Session::get('usuario')->id : 2;
        $log->ds_log = json_encode([
            'rota' => $route,
            'http_code' => $http_code,
            'parametros' => json_encode($params)
        ]);

        $log->save();
    }
}

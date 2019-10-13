<?php

namespace App\Helpers;

use Request;

class MenuHelper
{
    public static function marcaModulo($routeNameArray)
    {
        $path = explode('/', Request::path());

        foreach ($routeNameArray as $routeName)
        {
            if(in_array($routeName, $path)) {
                return 'app-nav__item--active';
            }
        }
    }
}

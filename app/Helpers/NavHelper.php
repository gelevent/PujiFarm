<?php
// app/Helpers/NavHelper.php
namespace App\Helpers;

class NavHelper
{
    public static function isActiveRoute($routes)
    {
        if (!is_array($routes)) {
            $routes = [$routes];
        }
        
        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return 'active';
            }
        }
        return '';
    }
}
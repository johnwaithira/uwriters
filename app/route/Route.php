<?php

namespace User\Uwriters\app\route;
use User\Uwriters\app\core\Application;

class Route
{
    /*
* @param $path
* @param $callback
* @return void
*/
    public static function get($path, $callback)
    {
        return Application::$app->router->get($path, $callback);
    }

    /**
     * @param $path
     * @param $callback
     * @return void
     */
    public static function post($path, $callback)
    {
        return Application::$app->router->post($path, $callback);
    }
}
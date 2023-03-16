<?php

namespace User\Uwriters\app\Http\Exception;

use User\Uwriters\app\core\Application;
use User\Uwriters\app\core\Controller;

class Handler extends Controller
{
    public function _404()
    {
        Application::$app->router->resources('layouts.head');
        Application::$app->router->resources('layouts.nav');
        Application::$app->router->response->setResposeCode(404);
        return $this->view('errors.404', ['url' => "[". $_SERVER['REQUEST_METHOD']."] : ".$_SERVER['REQUEST_URI']]);

    }
}
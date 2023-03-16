<?php

namespace User\Uwriters\app\core;
use User\Uwriters\app\core\Application;
class Controller
{
    public string $layout = "layouts.app";

    /**
     * @param $layout
     * @return $this
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
        return $this;
    }

    /**
     * @param $view
     * @param $params
     * @return array|bool|string
     */
    public function view($view, $params = [])
    {
        return Application::$app->router->view($view, $params);
    }

    /**
     * @return void
     */
    public function redirect($path)
    {
        return Application::$app->router->redirect($path);
    }

}
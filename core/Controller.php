<?php

namespace app\core;

class Controller
{
    public string $layout = 'main';
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function view($view, $params = null)
    {
        return Application::$app->router->renderView($view, $params);
    }
}
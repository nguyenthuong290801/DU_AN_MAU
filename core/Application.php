<?php

namespace app\core;

class Application
{
    public Debug $debug;
    public static Application $app;
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public Database $db;
    public Migration $m;

    public function __construct($rootPath, array $config)
    {
        $this->db = new Database($config['db']);
        self::$app = $this;
        self::$ROOT_DIR = $rootPath;
        $this->request =  new Request();
        $this->response =  new Response();
        $this->m = new Migration();
        $this->router = new Router($this->request, $this->response);
    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function run()
    {
        echo $this->router->resolve();
    }
    
}

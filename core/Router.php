<?php

namespace app\core;

use app\middleware\AuthMiddleware;

class Router
{
    public Request $request;
    public Response $response;
    public $path = [];
    public $callback = [];
    protected array $routes = [];
    protected array $routeGroups = [];


    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * Định nghĩa một nhóm router.
     *
     * @param array $attributes
     * @param \Closure $callback
     * @return void
     */
    public function group(array $attributes, \Closure $callback)
    {
        $this->routeGroups[] = $attributes;

        if ($this->routeGroups) {
            // Thêm tiền tố nhóm router vào đường dẫn
            $prefix = $this->processGroupAttributes($attributes);

            $this->callback[] = null;
            $callback($this);

            // Thêm tiền tố vào đường dẫn
            foreach ($this->path as $key => $value) {
                unset($this->path[$key]);
                $this->path[] = $prefix . $value;
            }
        } 

        
    }

    /**
     * Xử lý các thuộc tính của nhóm router.
     *
     * @param array $attributes
     * @return string
     */
    protected function processGroupAttributes(array $attributes)
    {
        // Xử lý các thuộc tính của nhóm router
        // Ví dụ: middleware, namespace, prefix, ...

        // Trả về chuỗi tiền tố
        return isset($attributes['prefix']) ? rtrim($attributes['prefix'], '/') : '';
    }

    /**
     * router->get('/url', [new NameController(), index])
     *
     * @param  mixed $path
     * @param  mixed $callback
     * @return void
     */
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
        $this->path[] = $path;
        $this->callback[] = $callback;
    }

    /**
     * router->post('/url', [new NameController(), index])
     *
     * @param  mixed $path
     * @param  mixed $callback
     * @return void
     */
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
        $this->path[] = $path;
        $this->callback[] = $callback;
    }

    /**
     * check: {id}, {slug},... => return true
     *
     * @param  mixed $string
     * @return bool
     */
    function isVariable($string)
    {
        $startChar = '{';
        $endChar = '}';
        $startCharLength = strlen($startChar);
        $endCharLength = strlen($endChar);

        if (substr($string, 0, $startCharLength) === $startChar && substr($string, -$endCharLength) === $endChar) {

            return true;
        }
    }

    /**
     * resolve: handle path and method => return renderView
     *
     * @return view
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $hasVar = true;

        foreach ($this->path as $url) {
            if ($url == $path) {
                $path = $url;
                $hasVar = false;
                break;
            }
        }

        if ($hasVar) {
            $id =  $this->parseUrl($path);
            if (is_numeric($id)) {
                $path = str_replace($id, '{id}', $path);
            } else {
                $arrUrl = explode('/', $path);
                $lastElement = array_pop($arrUrl);
                $path = str_replace($lastElement, '{slug}', $path);
            }
        }

        $method = $this->request->method();

        if ($this->routeGroups) {
            $firstPath = $this->routeGroups['0']['prefix'];
            $handlePath = str_replace($firstPath, '', $path);
            $callback = $this->routes[$method][$handlePath] ?? false;
        } else {
            $callback = $this->routes[$method][$path] ?? false;
        }


        if (is_string($callback)) {

            return $this->renderView($callback);
        }

        if ($callback === false) {
            $this->response->setStatusCode(404);
            $pageError = "_404";

            return $this->renderOnlyView("$pageError");
        }

        if (is_array($callback)) {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }

        return call_user_func($callback, $this->request);
    }

    /**
     * parseUrl
     *
     * @param  mixed $url
     * @return void
     */
    function parseUrl($url)
    {
        $parsedUrl = parse_url($url);
        $path = $parsedUrl['path'];
        preg_match('/\/(\d+)/', $path, $matches);
        $number = isset($matches[1]) ? $matches[1] : null;

        return $number;
    }


    /**
     * renderView: search for {{content}} and replace it with renderOnlyView
     *
     * @param  mixed $view
     * @param  mixed $params
     * @return void
     */
    public function renderView($view, $params = null)
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        if (file_exists('../views/' . $view . '.php')) {

            return str_replace('{{content}}', $viewContent, $layoutContent);
        } else {
            ob_start();
            include_once Application::$ROOT_DIR . "/views/layouts/error.php";
            $layoutContent = ob_get_clean();
            $layoutContent = str_replace('{{content}}', $viewContent, $layoutContent);
            return $layoutContent;
        }
    }

    /**
     * layoutContent: main, admin, auth, error,...
     *
     * @return array|string
     */
    protected function layoutContent()
    {
        $latout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$latout.php";

        return ob_get_clean();
    }

    /**
     * renderOnlyView: home, shop, contact,...
     *
     * @param  mixed $view
     * @param  mixed $params
     * @return array|string
     */
    protected function renderOnlyView($view, $params = null)
    {

        if ($params != null) {
            foreach ($params as $key => $value) {
                $$key = $value;
            }
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";

        return ob_get_clean();
    }
}

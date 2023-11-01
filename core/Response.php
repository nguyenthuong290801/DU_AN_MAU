<?php

namespace app\core;

class Response
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    public static function redirect($url)
    {
        header("Location: " . $url);
        exit;
    }

    public static function redirectCurrentPage() {
        $url = $_SERVER['REQUEST_URI'];
        header("Location: " . $url);
        exit;
    }
}

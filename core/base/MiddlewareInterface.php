<?php

namespace app\core\base;

use app\core\Request;

interface MiddlewareInterface {
    public function handle(Request $request, $next);
}


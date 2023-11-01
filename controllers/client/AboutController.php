<?php

namespace app\controllers\client;

use app\core\Controller;
use app\core\Request;

class AboutController extends Controller
{
    public function index()
    {
        return $this->view('client/pages/about', [

        ]);
    }
}
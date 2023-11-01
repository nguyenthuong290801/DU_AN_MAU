<?php

namespace app\controllers\client;

use app\core\Controller;
use app\core\Request;
use app\core\ModelFactory;

class HomeController extends Controller
{
    public function index()
    {
        // $products = ModelFactory::all('Product');

        return $this->view('client/pages/home', [
            // 'products' => $products
        ]);
    }
}

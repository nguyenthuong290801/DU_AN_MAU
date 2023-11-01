<?php

namespace app\controllers\admin;

use app\core\Controller;
use app\core\Request;
use app\core\ModelFactory;

class OrderController extends Controller
{
    public function index()
    {

        $this->setLayout('admin');
        
        return $this->view('admin/pages/order/index', [

        ]);
    }
}